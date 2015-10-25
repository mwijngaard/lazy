<?php

namespace mwijngaard\Lazy;

class LazyCycle implements \IteratorAggregate {
	/** @var array|\Traversable */
	private $traversable;

	public function __construct($traversable) {
		$this->traversable = $traversable;
	}

	public function getIterator() {
		while (true) {
			foreach ($this->traversable as $key => $value) {
				yield $key => $value;
			}
		}
	}
}

function lazy_cycle($traversable) {
	return new LazyCycle($traversable);
}