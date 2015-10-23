<?php

namespace mwijngaard\Lazy;

function lazy_count(LazyEnumerable $enumerable) {
	return lazy_reduce($enumerable, function ($prev) {
		return $prev + 1;
	}, 0);
}