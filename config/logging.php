<?php

use Monolog\Handler\ElasticsearchHandler ;
use Monolog\Formatter\ElasticsearchFormatter ;

return [
    'default' => env('LOG_CHANNEL', 'elastic'),

    'channels' => [
        'elastic' => [
            [ 'driver', 'monolog' ],
            [ 'handler', ElasticsearchHandler::class ],
            [ 'level',  'debug' ],
            [ 'formatter',  ElasticsearchFormatter::class ]
        ],
    ],
];
