<?php

namespace mwijngaard\Lazy;

class LazyMap extends AbstractEnumerable {
	/** @var LazyEnumerable  */
	private $enumerable;
	/** @var callable  */
	private $map_func;

	public function __construct(LazyEnumerable $enumerable, callable $map_func) {
		$this->enumerable = $enumerable;
		$this->map_func = $map_func;
	}

	public function getIterator() {
		foreach ($this->enumerable as $key => $value) {
			yield $key => call_user_func($this->map_func, $value);
		}
	}
}

function lazy_map(LazyEnumerable $enumerable, callable $map_func) {
	return new LazyMap($enumerable, $map_func);
}