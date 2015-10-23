<?php

namespace mwijngaard\Lazy;

class LazyReduce implements LazyValue {
	/** @var array|\Traversable  */
	private $traversable;
	/** @var callable  */
	private $reduce_func;
	private $initial;

	public function __construct($traversable, callable $reduce_func, $initial) {
		$this->traversable = $traversable;
		$this->reduce_func = $reduce_func;
		$this->initial = $initial;
	}

	public function resolve() {
		$res = $this->initial;
		foreach ($this->traversable as $key => $value) {
			$res = call_user_func($this->reduce_func, $res, $value, $key);
		}
		return $res;
	}
}

function lazy_reduce($traversable, callable $fold_func, $initial) {
	return new LazyReduce($traversable, $fold_func, $initial);
}
