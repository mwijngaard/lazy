<?php

namespace mwijngaard\Lazy;

class LazyMap extends AbstractLazyTraversable {
	/** @var array|\Traversable  */
	private $traversable;
	/** @var callable  */
	private $map_func;

	public function __construct($traversable, callable $map_func) {
		$this->traversable = $traversable;
		$this->map_func = $map_func;
	}

	public function getIterator() {
		foreach ($this->traversable as $key => $value) {
			yield $key => call_user_func($this->map_func, $value, $key);
		}
	}
}

function lazy_map($enumerable, callable $map_func) {
	return new LazyMap($enumerable, $map_func);
}