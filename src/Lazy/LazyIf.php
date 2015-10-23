<?php

namespace mwijngaard\Lazy;

class LazyIf extends AbstractLazyValue {
	private $cond;
	private $then;
	private $else;

	public function __construct($cond, $then, $else) {
		$this->cond = $cond;
		$this->then = $then;
		$this->else = $else;
	}

	public function resolve() {
		return (bool) lazy_resolve($this->cond) === true ? lazy_resolve($this->then) : lazy_resolve($this->else);
	}
}

function lazy_if($cond, $then, $else) {
	return new LazyIf($cond, $then, $else);
}