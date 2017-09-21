
## Install (Laravel)

Via Composer

``` bash
$ composer require jeylabs/aws-rekognition-sdk
```

Add the following to the providers array in config/app.php:

``` php
Jeylabs\AwsRekognition\ServiceProvider::class,
```

Publish the config file
``` bash
$ php artisan vendor:publish
```
