<?php

namespace mwijngaard\Lazy;

class Filter extends AbstractEnumerable {
	/** @var EnumerableInterface  */
	private $enumerable;
	/** @var callable  */
	private $filter_func;

	public function __construct(EnumerableInterface $enumerable, callable $filter_func) {
		$this->enumerable = $enumerable;
		$this->filter_func = $filter_func;
	}

	public function getIterator() {
		foreach ($this->enumerable as $key => $value) {
			if (call_user_func($this->filter_func, $key, $value) === true) {
				yield $key => $value;
			}
		}
	}
}

function lazy_filter(EnumerableInterface $enumerable, callable $filter_func) {
	return new Filter($enumerable, $filter_func);
}