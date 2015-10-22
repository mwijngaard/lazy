<?php

namespace mwijngaard\Lazy;

class Reduce implements ValueInterface {
	/** @var EnumerableInterface  */
	private $enumerable;
	/** @var callable  */
	private $reduce_func;
	private $initial;

	public function __construct(EnumerableInterface $enumerable, callable $reduce_func, $initial) {
		$this->enumerable = $enumerable;
		$this->reduce_func = $reduce_func;
		$this->initial = $initial;
	}

	public function resolve() {
		$res = $this->initial;
		foreach ($this->enumerable as $key => $value) {
			$res = call_user_func($this->reduce_func, $res, $value, $key);
		}
		return $res;
	}
}

function lazy_reduce(EnumerableInterface $enumerable, callable $fold_func, $initial) {
	return new Reduce($enumerable, $fold_func, $initial);
}
