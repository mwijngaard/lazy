<?php

namespace mwijngaard\Lazy;

class LazyEmpty extends AbstractLazyValue {
	/** @var LazyEnumerable  */
	private $enumerable;

	public function __construct(LazyEnumerable $enumerable) {
		$this->enumerable = $enumerable;
	}

	public function resolve() {
		foreach ($this->enumerable as $key => $value) {
			return false;
		}

		return true;
	}
}

function lazy_empty(LazyEnumerable $enumerable) {
	return new LazyEmpty($enumerable);
}