<?php

/**
 * @author     Gponster <anhvudg@gmail.com>
 * @copyright  Copyright (c) 2014
 */
namespace Gponster\Uuid;

use Illuminate\Support\ServiceProvider;

class Url62UuidServiceProvider extends ServiceProvider {

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
	public function boot() {
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
		$this->app['gponster/url62-uuid'] = $this->app->share(function ($app) {
			return new Url62UuidGenerator();
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {
		return [
			'gponster/url62-uuid'
		];
	}
}