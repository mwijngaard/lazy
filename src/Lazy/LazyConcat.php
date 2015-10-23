<?php

namespace mwijngaard\Lazy;

class LazyConcat extends AbstractEnumerable {
	/** @var LazyEnumerable[]  */
	private $enumerables;

	public function __construct(LazyEnumerable ...$enumerables) {
		$this->enumerables = $enumerables;
	}

	public function getIterator() {
		foreach ($this->enumerables as $enumerable) {
			foreach ($enumerable as $key => $value) {
				yield $key => $value;
			}
		}
	}
}

function lazy_concat(LazyEnumerable ...$enumerables) {
	return new LazyConcat(...$enumerables);
}