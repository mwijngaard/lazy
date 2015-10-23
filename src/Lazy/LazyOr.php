<?php

namespace mwijngaard\Lazy;

class LazyOr extends AbstractLazyValue {
	/** @var array|\Traversable */
	private $traversable;

	public function __construct($traversable) {
		$this->traversable = $traversable;
	}

	public function resolve() {
		foreach ($this->traversable as $value) {
			if ((bool) $value === true) {
				return true;
			}
		}
		return false;
	}
}

function lazy_or($traversable) {
	return new LazyOr($traversable);
}