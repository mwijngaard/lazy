<?php

namespace mwijngaard\Lazy;

class LazyAnd extends AbstractLazyValue {
	/** @var LazyEnumerable[] */
	private $enumerable;

	public function __construct(LazyEnumerable $enumerable) {
		$this->enumerable = $enumerable;
	}

	public function resolve() {
		foreach ($this->enumerable as $value) {
			if ((bool) $value === false) {
				return false;
			}
		}
		return true;
	}
}

function lazy_and(LazyEnumerable $enumerable) {
	return new LazyAnd($enumerable);
}