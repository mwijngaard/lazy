<?php

namespace mwijngaard\Lazy;

class LazyIf extends AbstractLazyValue {
	/** @var LazyValue  */
	private $cond;
	/** @var LazyValue  */
	private $then;
	/** @var LazyValue  */
	private $else;

	public function __construct(LazyValue $cond, LazyValue $then, LazyValue $else) {
		$this->cond = $cond;
		$this->then = $then;
		$this->else = $else;
	}

	public function resolve() {
		return (bool) $this->cond->resolve() === true ? $this->then->resolve() : $this->else->resolve();
	}
}

function lazy_if(LazyValue $cond, LazyValue $then, LazyValue $else) {
	return new LazyIf($cond, $then, $else);
}