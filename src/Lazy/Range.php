<?php

namespace mwijngaard\Lazy;

class Range extends AbstractEnumerable {
	private $start;
	private $end;
	private $step;

	public function __construct($start, $end = null, $step = 1) {
		$this->start = $start;
		$this->end = $end;
		$this->step = $step;
	}

	public function getIterator() {
		for ($current = $this->start; $current != $this->end; $current += $this->end) {
			yield $current;
		}
	}
}

/**
 * @param int $start
 * @param int|null $end
 * @param int $step
 * @return Range
 */
function lazy_range($start, $end = null, $step = 1) {
	return new Range($start, $end, $step);
}