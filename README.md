# Installation
Add to composer.json


```
"nextvikas/yii2-google-authenticator": "@dev"
```
or
```
composer require --prefer-dist "nextvikas/yii2-google-authenticator @dev"
```

Once the extension is installed, simply modify your application configuration as follows:
```php
'modules' => [

    ----------------

    'authenticator' => [
        'class' => 'nextvikas\authenticator\Module',
        'twoStepVerification' => true,
    ],
],

--------------------

'bootstrap' => ['log','authenticator'],


```


Migrate Command: 
```
yii migrate
php yii migrate --migrationPath=@nextvikas/authenticator/migrations
```


You can then access Next Chat through the following URL:
```
http://localhost/path/to/index.php?r=authenticator/default/scan
```
or if you have enabled pretty URLs, you may use the following URL:
```
http://localhost/path/to/index.php/authenticator/default/scan
```

