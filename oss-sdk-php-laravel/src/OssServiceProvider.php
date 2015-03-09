<?php namespace Tzuhsiulin\Laravel;

use Illuminate\Support\ServiceProvider;
use Tzuhsiulin\Laravel\MoOssClient;

class OssServiceProvider extends ServiceProvider {

	/**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
	protected $defer = true;

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$config = realpath(__DIR__ . '/../config/config.php');

        $this->mergeConfigFrom($config, 'oss');

        // $this->publishes([$config => config_path('oss.php')], 'config');
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('oss', function($app) {
			$config = $app['config']->get('oss');
			return new MoOssClient($config);
		});
	}

	/**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['oss', 'Tzuhsiulin\Laravel\MoOssClient'];
    }

}
