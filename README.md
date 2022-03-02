
## Hyperf 日志扩展

安装

```shell
composer require ece2/hyperf-common
```

初始化

```shell
php bin/hyperf.php vendor:publish ece2/hyperf-common -f
```

### 1. Graylog
    config/autoload/logger.php 参考

```PHP
return [
    'default' => [
        'handler' => [
            'class' => \Ece2\HyperfLogExt\GelfHandler::class,
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
            'class' => \Monolog\Formatter\GelfMessageFormatter::class,
            'constructor' => [
                'systemName' => env('APP_NAME'),
                'extraPrefix' => null,
                'contextPrefix' => '',
                'maxLength' => null,
            ],
        ],
    ],
    // 本地文件输出, 可作为降级输出方案
    'stream' => [
        'handler' => [
            'class' => Monolog\Handler\RotatingFileHandler::class,
            'constructor' => [
                'filename' => BASE_PATH . '/runtime/logs/hyperf.log',
                'level' => Monolog\Logger::DEBUG,
            ],
        ],
        'formatter' => [
            'class' => Monolog\Formatter\LineFormatter::class,
            'constructor' => [
                'format' => null,
                'dateFormat' => null,
                'allowInlineLineBreaks' => true,
            ],
        ],
    ],
];
```

### 使用方法

```PHP
use Ece2\HyperfLogExt\Log;

...

Log::info('xxx');
```
