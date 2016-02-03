<?php

namespace Mixdinternet\Eleads;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class EleadsServiceProvider extends ServiceProvider
{
	/**
	 * Register the News module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('Mixdinternet\Eleads\EleadsFactory', function($app)
		{
		    return new EleadsFactory();
		});

		$loader = AliasLoader::getInstance();
		$loader->alias('Eleads', 'Mixdinternet\Eleads\EleadsFacade');
	}

}
