<?php

namespace mwijngaard\Lazy;

function lazy_count($traversable) {
	return lazy_reduce($traversable, function ($prev) {
		return $prev + 1;
	}, 0);
}