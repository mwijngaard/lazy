<?php

namespace mwijngaard\Lazy;

function lazy_sum(LazyEnumerable $enumerable) {
	return lazy_reduce($enumerable, function ($res, $value) {
		return $value + $res;
	}, 0);
}