<?php

declare(strict_types=1);

/**
 * This file is part of hyperf-log-ext.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace Ece2\HyperfLogExt;

use Gelf\MessageInterface as Message;
use Gelf\Transport\UdpTransport;
use Hyperf\Utils\Coroutine;

class GelfUdpTransport extends UdpTransport
{
    /**
     * @return int|void
     */
    public function send(Message $message)
    {
        Coroutine::create(function () use ($message) {
            $rawMessage = $this->getMessageEncoder()->encode($message);

            if ($this->chunkSize && strlen($rawMessage) > $this->chunkSize) {
                $this->sendMessageInChunks($rawMessage);
            }

            $this->socketClient->write($rawMessage);
        });
    }
}
