<?php

namespace mwijngaard\Lazy;

abstract class AbstractLazyEnumerable extends AbstractLazyValue implements LazyEnumerable {
	public function resolve() {
		return iterator_to_array($this);
	}
}