<?php

namespace mwijngaard\Lazy;

function lazy_resolve($val) {
	return $val instanceof LazyValue ? $val->resolve() : $val;
}