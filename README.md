# Laravel with ElasticSearch Implementation

This package is simple initializer of elasticsearch with laravel 

## Installation

You can install the package via composer:

```bash
composer require ahmedofali/laravel-el-log
```

## Usage

``` dotenv
ELK_HOST_LOCAL=http://asalahnew_elasticsearch_1:9200
ELK_INDEX_LOCAL=laravel_local
ELK_TYPE_LOCAL=_doc

ELK_HOST_LIVE=http://asalahnew_elasticsearch_1:9200
ELK_INDEX_LIVE=elastic_local
ELK_TYPE_LIVE=_doc
```

Add this to merge this with logging.php config file 
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
