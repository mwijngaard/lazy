<?php

namespace mwijngaard\Lazy;

class LazyFilter extends AbstractLazyTraversable {
	/** @var array|\Traversable  */
	private $traversable;
	/** @var callable  */
	private $filter_func;

	public function __construct($traversable, callable $filter_func) {
		$this->traversable = $traversable;
		$this->filter_func = $filter_func;
	}

	public function getIterator() {
		foreach ($this->traversable as $key => $value) {
			if (call_user_func($this->filter_func, $value, $key) === true) {
				yield $key => $value;
			}
		}
	}
}

function lazy_filter($traversable, callable $filter_func) {
	return new LazyFilter($traversable, $filter_func);
}