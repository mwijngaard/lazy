<?php

namespace mwijngaard\Lazy;

class LazyRange extends AbstractEnumerable {
	private $start;
	private $end;
	private $step;

	public function __construct($start, $end = null, $step = 1) {
		$this->start = $start;
		$this->end = $end;
		$this->step = $step;
	}

	public function getIterator() {
		for ($current = $this->start; $current <= $this->end; $current += $this->step) {
			yield $current;
		}
	}
}

/**
 * @param int $start
 * @param int|null $end
 * @param int $step
 * @return LazyRange
 */
function lazy_range($start, $end = null, $step = 1) {
	return new LazyRange($start, $end, $step);
}