<?php

namespace mwijngaard\Lazy;

function lazy_product(LazyEnumerable $enumerable) {
	return lazy_reduce($enumerable, function ($res, $value) {
		return $value * $res;
	}, 1);
}