<?php namespace Schplay\GraphdatApiPhp;

use Illuminate\Support\ServiceProvider;

class GraphdatApiPhpServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('schplay/graphdat-api-php');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['graphdat'] = $this->app->share(function($app) {
			
			$config = (object) array();
			$config->client_email = $app['config']->get('graphdat-api-php::client_email');
			$config->api_key = $app['config']->get('graphdat-api-php::api_key');
			$config->api_version = $app['config']->get('graphdat-api-php::api_version');

			return new Graphdat($config);

		});

		// $this->app->booting(function() {
		//     $loader = \Illuminate\Foundation\AliasLoader::getInstance();
		//     $loader->alias('Graphdat', 'Schplay\GraphdatApiPhp\GraphdatApiPhpFacade');
		// });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('graphdat');
	}

}