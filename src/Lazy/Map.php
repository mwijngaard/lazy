<?php

namespace mwijngaard\Lazy;

class Map extends AbstractEnumerable {
	/** @var EnumerableInterface  */
	private $enumerable;
	/** @var callable  */
	private $map_func;

	public function __construct(EnumerableInterface $enumerable, callable $map_func) {
		$this->enumerable = $enumerable;
		$this->map_func = $map_func;
	}

	public function getIterator() {
		foreach ($this->enumerable as $key => $value) {
			yield $key => call_user_func($this->map_func, $value);
		}
	}
}

function lazy_map(EnumerableInterface $enumerable, callable $map_func) {
	return new Map($enumerable, $map_func);
}