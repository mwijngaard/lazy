<?php

namespace mwijngaard\Lazy;

class LazyAnd extends AbstractLazyValue {
	/** @var array|\Traversable */
	private $traversable;

	public function __construct($traversable) {
		$this->traversable = $traversable;
	}

	public function resolve() {
		foreach ($this->traversable as $value) {
			if ((bool) $value === false) {
				return false;
			}
		}
		return true;
	}
}

function lazy_and($enumerable) {
	return new LazyAnd($enumerable);
}