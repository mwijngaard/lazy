<?php

namespace mwijngaard\Lazy;

abstract class AbstractValue implements ValueInterface {
	public function __toString() {
		return (string) $this->resolve();
	}
}