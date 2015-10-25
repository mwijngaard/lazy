<?php

namespace mwijngaard\Lazy;

use Eris\TestTrait;
use Eris\Generator;

class RangeTest extends \PHPUnit_Framework_TestCase {
	use TestTrait;

	public function testRangeIsEqualToNative() {
		$this->forAll(Generator\int(), Generator\int())->__invoke(function ($start, $end) {
			if ($end < $start) {
				list($end, $start) = array($start, $end);
			}
			$this->assertEquals(range($start, $end), iterator_to_array(lazy_range($start, $end)));
		});
	}
}