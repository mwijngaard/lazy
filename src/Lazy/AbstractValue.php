<?php

namespace mwijngaard\Lazy;

abstract class AbstractValue implements LazyValue {
	public function __toString() {
		return (string) $this->resolve();
	}
}