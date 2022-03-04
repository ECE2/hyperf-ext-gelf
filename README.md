
## Hyperf 日志扩展

安装

```shell
composer require ece2/hyperf-log-ext
```

初始化, 仅仅用在刚刚创建的 hyperf 项目, 不然会覆盖项目代码

```shell
php bin/hyperf.php vendor:publish ece2/hyperf-log-ext -f
```

### 使用方法

```PHP
use Ece2\HyperfLogExt\Log;

...

Log::info('xxx');
```
