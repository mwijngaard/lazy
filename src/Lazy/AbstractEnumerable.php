<?php

namespace mwijngaard\Lazy;

abstract class AbstractEnumerable extends AbstractValue implements EnumerableInterface {
	public function resolve() {
		return iterator_to_array($this);
	}
}