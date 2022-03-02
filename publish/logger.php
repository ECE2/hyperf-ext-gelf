<?php

declare(strict_types=1);

use Ece2\HyperfLogExt\GelfHandler;
use Monolog\Formatter\GelfMessageFormatter;

return [
    'default' => [
        'handler' => [
            'class' => GelfHandler::class,
            'constructor' => [
                'config' => [
                    'transport' => env('GRAYLOG_TRANSPORT_TYPE', 'udp'),
                    'host' => env('GRAYLOG_HOST', '127.0.0.1'),
                    'port' => env('GRAYLOG_PORT', 12201),
                    'path' => env('GRAYLOG_PATH'),
                ],
                'level' => env('GRAYLOG_LOG_LEVEL', 'debug'),
                'bubble' => true,
            ],
        ],
        'formatter' => [
            'class' => GelfMessageFormatter::class,
            'constructor' => [
                'systemName' => env('APP_NAME'),
                'extraPrefix' => null,
                'contextPrefix' => '',
                'maxLength' => null,
            ],
        ],
    ]
];
