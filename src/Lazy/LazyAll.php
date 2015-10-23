<?php

namespace mwijngaard\Lazy;

class LazyAll extends AbstractLazyValue {
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
			if ((bool) call_user_func($this->func, $value, $key) === false) {
				return false;
			}
		}
		return true;
	}
}

function lazy_all(LazyEnumerable $enumerable, callable $func) {
	return new LazyAll($enumerable, $func);
}