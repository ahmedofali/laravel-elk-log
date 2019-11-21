<?php

namespace Elklog;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Monolog\Formatter\ElasticsearchFormatter;

class ElkServiceProvider extends LaravelServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom( __DIR__.'/../config/log.php', 'logging' );

        $this->app->singleton(Client::class, function ($app) {
            $url = $this->getHost();

            return ClientBuilder::create()->setHosts([$url])->build();
        });

        $this->app->singleton('elkClient', function ($app) {
            $url = $this->getHost();

            return ClientBuilder::create()->setHosts([$url])->build();
        });

        $this->app->bind(ElasticsearchFormatter::class, function ($app) {
            return new ElasticsearchFormatter( $this->getIndexName(), $this->getIndexType() );
        });

    }

    /**
     * check if live environment
     *
     * @return bool
     */
    public function isLiveEnvironment()
    {
        return ! App::environment(['local', 'staging']);
    }

    /**
     * get index type
     *
     * @return string
     */
    public function getIndexType(): string
    {
        if( ! $this->isLiveEnvironment() )
        {
            return env('ELK_TYPE_LOCAL', '_doc');
        }
        else
        {
            return env('ELK_TYPE_LIVE', '_doc');
        }
    }

    /**
     * get index name
     *
     * @return string
     */
    public function getIndexName(): string
    {
        if( ! $this->isLiveEnvironment() )
        {
            return env('ELK_INDEX_LOCAL', 'elastic_local');
        }
        else
        {
            return env('ELK_INDEX_LIVE', 'elastic_local');
        }
    }

    /**
     * get index host
     *
     * @return string
     */
    public function getHost(): string
    {
        if( ! $this->isLiveEnvironment() )
        {
            return env('ELK_HOST_LOCAL', 'http://localhost:9200');
        }
        else
        {
            return env('ELK_HOST_LIVE', 'http://localhost:9200');
        }
    }
}
