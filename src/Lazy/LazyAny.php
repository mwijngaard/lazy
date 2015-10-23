<?php

namespace mwijngaard\Lazy;

class LazyAny extends AbstractLazyValue {
	/** @var LazyEnumerable[] */
	private $enumerable;
	/** @var callable  */
	private $func;

	public function __construct(LazyEnumerable $enumerable, callable $func) {
		$this->enumerable = $enumerable;
		$this->func = $func;
	}

	public function resolve() {
		foreach ($this->enumerable as $key => $value) {
			if ((bool) call_user_func($this->func, $value, $key) === true) {
				return true;
			}
		}
		return false;
	}
}

function lazy_any(LazyEnumerable $enumerable) {
	return new LazyAny($enumerable);
}