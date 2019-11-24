# Laravel with ElasticSearch Implementation

This package is simple initializer of elasticsearch with laravel 

## Installation

You can install the package via composer:

```bash
composer require ahmedofali/laravel-elk-log
```

## Usage

Run the below command to get installation tips. 

``` bash
php artisan elk:installTips
```

Merge this with logging.php config file 
```php

return [

    'channels' => [
        'elastic' => [
            'driver' => 'monolog',
            'handler' => ElasticsearchHandler::class,
            'level' => 'debug',
            'formatter' => ElasticsearchFormatter::class
        ],
    ],

];

```

After you publish config file you will find new config file called elk.php add your environment configuration and you are ready to go with elasticsearch.   

## Credits

- [ahmedofali](https://github.com/ahmedofali)
