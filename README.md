# laravel-jpush

<p align="center">⛵<code>laravel-jpush</code> is a surpaimb/jpush laravel package.</p>



Requirements
------------
 - PHP >= 7.0.0
 - Laravel >= 5.0.0
 - Fileinfo PHP Extension

Installation
------------

> This package requires PHP 7+ and Laravel 5

First, install laravel 5.*, and make sure that the database connection settings are correct.

```
composer require surpaimb/laravel-jpush
```

Then run these commands to publish assets and config：

```
php artisan vendor:publish --provider="Surpaimb\JPush\JPushServiceProvider"
```
After run command you can find config file in `config/jpush.php`, in this file you can change the install directory,db connection or table names.


Configurations
------------
The file `config/jpush.php` contains an array of configurations, you can find the default configurations in there.

You can find appkey/secretKey, from https://www.jiguang.cn/ 


