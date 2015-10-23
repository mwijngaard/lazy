<?php

$files = [
	'Lazy/LazyAll.php',
	'Lazy/LazyAnd.php',
	'Lazy/LazyAny.php',
	'Lazy/LazyConcat.php',
	'Lazy/LazyCount.php',
	'Lazy/LazyCycle.php',
	'Lazy/LazyEmpty.php',
	'Lazy/LazyException.php',
	'Lazy/LazyFilter.php',
	'Lazy/LazyIf.php',
	'Lazy/LazyIterate.php',
	'Lazy/LazyMap.php',
	'Lazy/LazyMax.php',
	'Lazy/LazyMin.php',
	'Lazy/LazyOr.php',
	'Lazy/LazyProduct.php',
	'Lazy/LazyRange.php',
	'Lazy/LazyReduce.php',
	'Lazy/LazyRepeat.php',
	'Lazy/LazyReplicate.php',
	'Lazy/LazySum.php',
];

foreach ($files as $file) {
	require(__DIR__ . '/' . $file);
}