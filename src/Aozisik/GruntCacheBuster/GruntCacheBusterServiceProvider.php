<?php namespace Aozisik\GruntCacheBuster;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class GruntCacheBusterServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
		$this->app->bind('cacheBuster', function()
		{
		    return new \Aozisik\GruntCacheBuster\CacheBuster;
		});

		$this->app->booting(function()
        {
            $loader = AliasLoader::getInstance();
            $loader->alias('CacheBusted', '\Aozisik\GruntCacheBuster\CacheBusterFacade');
        });
	}
}
