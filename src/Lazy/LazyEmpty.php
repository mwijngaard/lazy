<?php

namespace mwijngaard\Lazy;

class LazyEmpty extends AbstractLazyValue {
	/** @var array|\Traversable  */
	private $traversable;

	public function __construct($traversable) {
		$this->traversable = $traversable;
	}

	public function resolve() {
		foreach ($this->traversable as $key => $value) {
			return false;
		}

		return true;
	}
}

function lazy_empty($traversable) {
	return new LazyEmpty($traversable);
}