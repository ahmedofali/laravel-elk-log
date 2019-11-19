<?php

namespace Ahmedofali\LaravelElkLog;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Monolog\Formatter\ElasticsearchFormatter;

class ElkServiceProvider extends ServiceProvider
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
        dd( 'aj' );
        $this->mergeConfigFrom( __DIR__.'/../config/log.php', 'logging' );

        $this->app->singleton(Client::class, function ($app) {
            $url = $this->getHost();

            return ClientBuilder::create()->setHosts([$url])->build();
        });

        $this->app->bind(ElasticsearchFormatter::class, function ($app) {
            return new ElasticsearchFormatter( $this->getIndexName(), $this->getIndexType() );
        });

    }

    /**
     * get index type
     *
     * @return string
     */
    public function getIndexType(): string
    {
        if( App::environment(['local', 'staging']) )
        {
            return env('ELK_TYPE_LOCAL', '_doc');
        }
        else
        {
            return env('ELK_TYPE_LOCAL', '_doc');
        }
    }

    /**
     * get index name
     *
     * @return string
     */
    public function getIndexName(): string
    {
        if( App::environment(['local', 'staging']) )
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
        if( App::environment(['local', 'staging']) )
        {
            return env('ELK_HOST_LOCAL', 'http://localhost:9200');
        }
        else
        {
            return env('ELK_HOST_LIVE', 'http://localhost:9200');
        }
    }
}
