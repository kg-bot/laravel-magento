<?php
/**
 * Created by PhpStorm.
 * User: nts
 * Date: 2.4.18.
 * Time: 01.02
 */

namespace KgBot\Magento;


use Illuminate\Support\ServiceProvider;

class MagentoServiceProvider extends ServiceProvider
{
    /**
     * Boot.
     */
    public function boot()
    {
        $configPath = __DIR__ . '/config/laravel-magento.php';

        $this->mergeConfigFrom( $configPath, 'laravel-magento' );

        if ( function_exists( 'config_path' ) ) {

            $publishPath = config_path( 'laravel-magento.php' );

        } else {

            $publishPath = base_path( 'config/laravel-magento.php' );

        }

        $this->publishes( [ $configPath => $publishPath ], 'config' );
    }

    public function register()
    {
    }
}