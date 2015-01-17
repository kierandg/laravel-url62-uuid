<?php

/**
 * @author     Gponster <anhvudg@gmail.com>
 * @copyright  Copyright (c) 2014
 */
namespace Gponster\Uuid\Facades;

use Illuminate\Support\Facades\Facade;

class Url62Uuid extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() {
		return 'gponster/url62-uuid';
	}
}