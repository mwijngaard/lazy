<?php

namespace mwijngaard\Lazy;

abstract class AbstractLazyValue implements LazyValue {
	public function __toString() {
		return (string) $this->resolve();
	}
}