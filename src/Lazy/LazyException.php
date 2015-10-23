<?php

namespace mwijngaard\Lazy;

class LazyException extends AbstractLazyValue {
	/** @var \Exception  */
	private $exception;

	public function __construct(\Exception $exception) {
		$this->exception = $exception;
	}

	public function resolve() {
		throw $this->exception;
	}
}

function lazy_exception(\Exception $e) {
	return new LazyException($e);
}