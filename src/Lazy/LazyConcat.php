<?php

namespace mwijngaard\Lazy;

class LazyConcat extends AbstractLazyTraversable {
	/** @var (array|\Traversable)[]  */
	private $traversables;

	public function __construct(...$traversables) {
		$this->traversables = $traversables;
	}

	public function getIterator() {
		foreach ($this->traversables as $traversable) {
			foreach ($traversable as $key => $value) {
				yield $key => $value;
			}
		}
	}
}

function lazy_concat(...$traversables) {
	return new LazyConcat(...$traversables);
}