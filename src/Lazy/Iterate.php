<?php

namespace mwijngaard\Lazy;

class Iterate extends AbstractInfiniteEnumerable {
	private $value_func;
	private $value_func_args;

	public function __construct(callable $value_func, ...$value_func_args) {
		$this->value_func = $value_func;
		$this->value_func_args = $value_func_args;
	}

	public function getIterator() {
		while (true) {
			yield call_user_func($this->value_func, ...$this->value_func_args);
		}
	}
}

function lazy_iterate(callable $value_func, ... $value_func_args) {
	return new Iterate($value_func, ...$value_func_args);
}