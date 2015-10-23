<?php

namespace mwijngaard\Lazy;

class LazyOr extends AbstractLazyValue {
	/** @var LazyEnumerable[] */
	private $enumerable;

	public function __construct(LazyEnumerable $enumerable) {
		$this->enumerable = $enumerable;
	}

	public function resolve() {
		foreach ($this->enumerable as $value) {
			if ((bool) $value === true) {
				return true;
			}
		}
		return false;
	}
}

function lazy_or(LazyEnumerable $enumerable) {
	return new LazyOr($enumerable);
}