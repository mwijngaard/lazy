<?php

namespace mwijngaard\Lazy;

class LazyCycle extends AbstractLazyEnumerable {
	/** @var LazyEnumerable  */
	private $enumerable;

	public function __construct(LazyEnumerable $enumerable) {
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

function lazy_cycle(LazyEnumerable $enumerable) {
	return new LazyCycle($enumerable);
}