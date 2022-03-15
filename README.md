## Hyperf 日志扩展

本项目和使用项目平级放置

安装

```shell
composer require ece2/log-ext
```

在 composer.json 加上

```
"repositories": {
    "ece2/log-ext": {
        "type": "path",
        "url": "../log-ext"
    }
}
```

初始化, 仅仅用在刚刚创建的 hyperf 项目, 不然会覆盖项目代码

```shell
php bin/hyperf.php vendor:publish ece2/log-ext -f
```

### 使用方法

```PHP
use Ece2\LogExt\Log;

...

Log::info('xxx');
```
