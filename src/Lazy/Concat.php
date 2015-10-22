<?php

namespace mwijngaard\Lazy;

class Concat extends AbstractEnumerable {
	/** @var EnumerableInterface[]  */
	private $enumerables;

	public function __construct(EnumerableInterface ...$enumerables) {
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

function lazy_concat(EnumerableInterface ...$enumerables) {
	return new Concat(...$enumerables);
}