<?php

namespace Elklog\Commands ;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elk:installTips';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install elk and add logging channel';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('' );

        $this->info('First: you need to run php artisan vendor:publish to get the configuration file' );

        $this->info('' );

        $this->info('Second: create a new logging channel on config\logging.php called elastic and put this on it' );

        $this->info('' );

        $headers = ['Key', 'Value'];

        $path = __DIR__ . '/../../config/logging.php' ;

        $data = require $path;

        $elastic_data = $data['channels']['elastic'] ;

        $this->info( sprintf( 'Copy it below or open this file and copy them %s', $path ) );

        $this->info('' );

        $this->table( $headers, $elastic_data );
    }
}
