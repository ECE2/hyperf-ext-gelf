<?php

declare(strict_types=1);

/**
 * This file is part of log-ext.
 */
namespace Ece2\LogExt;

use Monolog\Formatter\GelfMessageFormatter;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
            ],
            'commands' => [
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'publish' => [
                [
                    'id' => 'logger.php',
                    'description' => 'replace logger config',
                    'source' => __DIR__ . '/../publish/logger.php',
                    'destination' => BASE_PATH . '/config/autoload/logger.php',
                ],
            ]
        ];
    }
}
