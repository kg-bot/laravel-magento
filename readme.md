# Laravel Magento App wrapper

<p align="center"> 
<a href="https://packagist.org/packages/kg-bot/laravel-magento"><img src="https://img.shields.io/packagist/dt/kg-bot/laravel-magento.svg?style=flat-square" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/kg-bot/laravel-magento"><img src="https://img.shields.io/packagist/v/kg-bot/laravel-magento.svg?style=flat-square" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/kg-bot/laravel-magento"><img src="https://img.shields.io/packagist/l/kg-bot/laravel-magento.svg?style=flat-square" alt="License"></a>
</p>

## Installation

1. Require using composer

``` bash
composer require kg-bot/laravel-magento
```

In Laravel 5.5, and above, the package will auto-register the service provider. In Laravel 5.4 you must install this service provider.

2. Add the MagentoServiceProvider to your `config/app.php` providers array.

``` php
<?php 
'providers' => [
    // ...
    \KgBot\Magento\MagentoServiceProvider::class,
    // ...
]
```

3. Copy the package config to your local config with the publish command: 

``` bash
php artisan vendor:publish --provider="KgBot\Magento\MagentoServiceProvider"
```