<?php

/**
 * @author     Gponster <anhvudg@gmail.com>
 * @copyright  Copyright (c) 2014
 */
namespace Gponster\Uuid;

use Illuminate\Support\ServiceProvider;
use Rhumsaa\Uuid\Uuid;

class Url62UuidGenerator {

	public static function generate($ver = 4, $node = null, $clockSeq = null, $ns = null, $name = null) {
		$uuid = null;

		/* Create a new UUID based on provided data. */
		switch((int)$ver) {
			case 1:
				$uuid = Uuid::uuid1($node, $clockSeq);
				break;

			case 2:
				// Version 2 is not supported
				throw new \RuntimeException('UUID version 2 is unsupported.');

			case 3:
				$uuid = Uuid::uuid3($ns, $name);
				break;

			case 4:
				$uuid = Uuid::uuid4();
				break;

			case 5:
				$uuid = Uuid::uuid5($ns, $name);
				break;

			default:
				throw new \RuntimeException(
					'Selected UUID version is invalid or unsupported.');
		}

		if(function_exists('gmp_strval')) {
			return gmp_strval(gmp_init($uuid->getHex(), 16), 62);
		}

		return Base62::encode((string)$uuid->getInteger());
	}
}