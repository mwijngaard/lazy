<?php

namespace mwijngaard\Lazy;

use Eris\TestTrait;
use Eris\Generator;

class LazyIfTest extends \PHPUnit_Framework_TestCase {
	use TestTrait;

	public function testEqualToNative() {
		$this->forAll(Generator\int(), Generator\int())->__invoke(function ($a, $b) {
			$this->assertEquals($a > $b ? $a : $b, lazy_if($a > $b, $a, $b)->resolve());
		});
	}
}