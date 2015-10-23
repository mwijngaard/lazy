<?php

namespace mwijngaard\Lazy;

function lazy_max($traversable) {
	return lazy_if(lazy_empty($traversable), lazy_exception(new \DomainException("Cannot determine max for empty traversable")), lazy_reduce($traversable, function ($res, $value) {
		return $value > $res || $res === null ? $value : $res;
	}, null));
}