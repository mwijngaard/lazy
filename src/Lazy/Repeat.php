<?php

namespace mwijngaard\Lazy;

class Repeat extends AbstractInfiniteEnumerable {
	/** @var  callable */
	private $value_func;

	public function __construct(callable $value_func) {
		$this->value_func = $value_func;
	}

	public function getIterator() {
		while (true) {
			yield call_user_func($this->value_func);
		}
	}
}

function lazy_repeat(callable $value_func) {
	return new Repeat($value_func);
}