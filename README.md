# Laravel with ElasticSearch Implementation

This package is simple initializer of elasticsearch with laravel 

## Installation

You can install the package via composer:

```bash
composer require ahmedofali/laravel-el-log
```

## Usage

``` dotenv
ELK_HOST_LOCAL=http://yourlocalurl:9200
ELK_INDEX_LOCAL=elastic_local
ELK_TYPE_LOCAL=_doc

ELK_HOST_LIVE=http://yourliveurl:9200
ELK_INDEX_LIVE=elastic_live
ELK_TYPE_LIVE=_doc
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

## Credits

- [ahmedofali](https://github.com/ahmedofali)
