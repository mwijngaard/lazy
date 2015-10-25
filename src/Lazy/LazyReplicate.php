<?php

namespace mwijngaard\Lazy;

class LazyReplicate implements \IteratorAggregate {
	/** @var  int */
	private $ct;
	private $value;

	public function __construct($ct, $value) {
		$this->ct = intval($ct);
		$this->value;
	}

	public function getIterator() {
		for ($i = 0; $i < $this->ct; $i++) {
			yield $this->value;
		}
	}
}

function lazy_replicate($ct, $value) {
	return new LazyReplicate($ct, $value);
}