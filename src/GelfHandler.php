<?php

declare(strict_types=1);

/**
 * This file is part of log-ext.
 */
namespace Ece2\LogExt;

use Gelf\Publisher;
use Gelf\Transport\AbstractTransport;
use Gelf\Transport\HttpTransport;
use Gelf\Transport\IgnoreErrorTransportWrapper;
use Gelf\Transport\TcpTransport;
use Monolog\Handler\GelfHandler as MonologGelfHandler;
use Monolog\Logger;

class GelfHandler extends MonologGelfHandler
{
    public function __construct($config, $level = Logger::DEBUG, bool $bubble = true)
    {
        $transport = new IgnoreErrorTransportWrapper(
            $this->getTransport(
                $config['transport'] ?? 'udp',
                $config['host'] ?? '127.0.0.1',
                (int) ($config['port'] ?? 12201),
                $config['path'] ?? null
            )
        );

        parent::__construct(new Publisher($transport), $level, $bubble);
    }

    protected function getTransport(string $transport, string $host, int $port, ?string $path = null): AbstractTransport
    {
        switch (strtolower($transport)) {
            case 'tcp':
                return new TcpTransport($host, $port);
            case 'http':
                return new HttpTransport($host, $port, $path ?? HttpTransport::DEFAULT_PATH);
            default:
                return new GelfUdpTransport($host, $port);
        }
    }
}
