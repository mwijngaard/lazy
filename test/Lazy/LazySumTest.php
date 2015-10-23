<?php

namespace mwijngaard\Lazy;

use Eris\TestTrait;
use Eris\Generator;

class LazySumTest extends \PHPUnit_Framework_TestCase {
	use TestTrait;

	public function testEqualToNative() {
		$this->forAll(Generator\seq(Generator\int()))->__invoke(function ($arr) {
			$e = array_sum($arr);
			$this->assertEquals($e, lazy_sum($arr)->resolve());
			$this->assertEquals($e, lazy_sum(new \ArrayObject($arr))->resolve());
		});
	}
}