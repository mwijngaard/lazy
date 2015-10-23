<?php

namespace mwijngaard\Lazy;

class LazyAll extends AbstractLazyValue {
	/** @var array|\Traversable */
	private $traversable;
	/** @var callable  */
	private $cond_func;

	public function __construct($traversable, callable $cond_func) {
		$this->traversable = $traversable;
		$this->cond_func = $cond_func;
	}

	public function resolve() {
		foreach ($this->traversable as $key => $value) {
			if ((bool) call_user_func($this->cond_func, $value, $key) === false) {
				return false;
			}
		}
		return true;
	}
}

function lazy_all($traversable, callable $func) {
	return new LazyAll($traversable, $func);
}