<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 2.4.18.
 * Time: 01.02
 */

namespace KgBot;


use Illuminate\Support\ServiceProvider;

class BillyServiceProvider extends ServiceProvider
{
    /**
     * Boot.
     */
    public function boot()
    {
        $configPath = __DIR__ . '/config/billy.php';

        $this->mergeConfigFrom( $configPath, 'billy' );

        $configPath = __DIR__ . '/config/billy.php';

        if ( function_exists( 'config_path' ) ) {

            $publishPath = config_path( 'billy.php' );

        } else {

            $publishPath = base_path( 'config/billy.php' );

        }

        $this->publishes( [ $configPath => $publishPath ], 'config' );
    }

    public function register()
    {
    }
}