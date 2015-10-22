<?php

namespace mwijngaard\Lazy;

class Cycle extends AbstractInfiniteEnumerable {
	/** @var EnumerableInterface  */
	private $enumerable;

	public function __construct(EnumerableInterface $enumerable) {
		$this->enumerable = $enumerable;
	}

	public function getIterator() {
		while (true) {
			foreach ($this->enumerable as $key => $value) {
				yield $key => $value;
			}
		}
	}
}

function lazy_cycle(EnumerableInterface $enumerable) {
	return new Cycle($enumerable);
}