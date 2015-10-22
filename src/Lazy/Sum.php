<?php

namespace mwijngaard\Lazy;

function lazy_sum(EnumerableInterface $enumerable) {
	return reduce($enumerable, function ($res, $value) {
		return $value + $res;
	}, 0);
}