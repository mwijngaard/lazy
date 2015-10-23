<?php

$files = [
	'Lazy/LazyConcat.php',
	'Lazy/LazyCount.php',
	'Lazy/LazyCycle.php',
	'Lazy/LazyFilter.php',
	'Lazy/LazyIterate.php',
	'Lazy/LazyMap.php',
	'Lazy/LazyRange.php',
	'Lazy/LazyReduce.php',
	'Lazy/LazyRepeat.php',
	'Lazy/LazyReplicate.php'
];

foreach ($files as $file) {
	require(__DIR__ . '/' . $file);
}