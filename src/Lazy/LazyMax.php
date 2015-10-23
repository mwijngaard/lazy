<?php

namespace mwijngaard\Lazy;

function lazy_max(LazyEnumerable $enumerable) {
	return lazy_if(lazy_empty($enumerable), lazy_exception(new \DomainException("Cannot determine max for empty list")), lazy_reduce($enumerable, function ($res, $value) {
		return $value > $res || $res === null ? $value : $res;
	}, null));
}