## Hyperf Graylog 日志扩展

安装

```shell
composer require ece2/gelf-ext -W --ignore-platform-reqs
```

初始化, 仅仅用在刚刚创建的 hyperf 项目, 不然会覆盖项目代码

```shell
php bin/hyperf.php vendor:publish ece2/gelf-ext -f
```

.env 配置内容

```
GRAYLOG_HOST=127.0.0.1
GRAYLOG_PORT=12201
GRAYLOG_TRANSPORT_TYPE=udp
GRAYLOG_LOG_LEVEL=debug
GRAYLOG_PATH=
```
