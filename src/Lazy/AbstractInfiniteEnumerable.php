<?php

namespace mwijngaard\Lazy;

abstract class AbstractInfiniteEnumerable extends AbstractValue implements EnumerableInterface {
	public function resolve() {
		throw new \LogicException("Cannot resolve inifinite enumerable");
	}
}