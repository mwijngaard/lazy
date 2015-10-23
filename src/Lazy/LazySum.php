<?php

namespace mwijngaard\Lazy;

function lazy_sum($traversable) {
	return lazy_reduce($traversable, function ($res, $value) {
		return $value + $res;
	}, 0);
}