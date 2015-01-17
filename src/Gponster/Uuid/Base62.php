<?php

/**
 * @author     Gponster <anhvudg@gmail.com>
 * @copyright  Copyright (c) 2014
 */
namespace Gponster\Uuid;

use Illuminate\Support\ServiceProvider;

class Base62 {
	private static $base62 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

	public static function encode($number, $encode = '') {
		while($number > 0) {
			$mod = bcmod($number, 62);
			$encode .= self::$base62[$mod];
			$number = bcdiv(bcsub($number, $mod), 62);
		}

		return strrev($encode);
	}

	public static function decode($encode, $number = 0) {
		$len = strlen($encode);
		$arr = array_flip(str_split(self::$base62));

		for($i = 0; $i < $len; $i ++) {
			$number = bcadd($number, bcmul($arr[$encode[$i]], bcpow(62, $len - $i - 1)));
		}

		return $number;
	}
}