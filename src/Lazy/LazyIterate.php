<?php

namespace mwijngaard\Lazy;

class LazyIterate extends AbstractLazyEnumerable {
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
	return new LazyIterate($value_func, ...$value_func_args);
}