<?php

namespace mwijngaard\Lazy;

use Eris\TestTrait;
use Eris\Generator;

class LazyProductTest extends \PHPUnit_Framework_TestCase {
	use TestTrait;

	public function testEqualToNative() {
		$this->forAll(Generator\seq(Generator\int()))->__invoke(function ($arr) {
			$e = array_product($arr);
			$this->assertEquals($e, lazy_product($arr)->resolve());
			$this->assertEquals($e, lazy_product(new \ArrayObject($arr))->resolve());
		});
	}
}