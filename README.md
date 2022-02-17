
## Hyperf 日志扩展

### 1. Graylog
    config/autoload/logger.php 参考

```PHP
return [
    'default' => [
        'handler' => [
            'class' => \Ece2\HyperfLogExt\GelfHandler::class,
            'constructor' => [
                'config' => [
                    'transport' => config('hyperf-log-ext.graylog_host', 'dup'),
                    'host' => config('hyperf-log-ext.graylog_host', '127.0.0.1'),
                    'port' => config('hyperf-log-ext.graylog_port', 12201),
                    'path' => config('hyperf-log-ext.graylog_path'),
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
