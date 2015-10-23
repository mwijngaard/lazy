<?php

namespace mwijngaard\Lazy;

abstract class AbstractLazyTraversable extends AbstractLazyValue implements LazyTraversable {
	public function resolve() {
		return iterator_to_array($this);
	}
}