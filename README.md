# yii2-google-authenticator

[![Total Downloads](https://img.shields.io/packagist/dt/nextvikas/yii2-google-authenticator.svg?logo=github&logoColor=white&style=flat-square)](https://packagist.org/packages/nextvikas/yii2-google-authenticator)
[![GitHub tag](https://img.shields.io/badge/license-BSD%203--Clause-brightgreen.svg)]()
[![GitHub tag](https://img.shields.io/badge/composer-yii2--extension-orange.svg)]()

**yii2-google-authenticator** is an extension for the **Yii2** **PHP framework** that provides two-factor authentication (2FA) using **Google Authenticator**. With the help of this package, developers can easily integrate 2FA in their **Yii2 applications**, which enhances security. Users have to enter a time-based one-time password (TOTP) while logging in from the Google Authenticator app. This extension generates a QR code which users can scan from their Google Authenticator app and also validates the authentication code during the login process. This protects the account from unauthorized access.

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


You can then access Next Authenticator through the following URL:
```
http://localhost/path/to/index.php?r=authenticator/default/scan
```
or if you have enabled pretty URLs, you may use the following URL:
```
http://localhost/path/to/index.php/authenticator/default/scan
```

