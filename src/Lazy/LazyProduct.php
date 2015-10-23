<?php

namespace mwijngaard\Lazy;

function lazy_product($traversable) {
	return lazy_reduce($traversable, function ($res, $value) {
		return $value * $res;
	}, 1);
}