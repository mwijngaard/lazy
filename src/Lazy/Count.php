<?php

namespace mwijngaard\Lazy;

function count(EnumerableInterface $enumerable) {
	return lazy_reduce($enumerable, function ($prev) {
		return $prev + 1;
	}, 0);
}