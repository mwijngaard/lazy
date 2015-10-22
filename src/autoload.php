<?php

$files = [
	'Lazy/Concat.php',
	'Lazy/Count.php',
	'Lazy/Cycle.php',
	'Lazy/Filter.php',
	'Lazy/Iterate.php',
	'Lazy/Map.php',
	'Lazy/Range.php',
	'Lazy/Reduce.php',
	'Lazy/Repeat.php',
	'Lazy/Replicate.php',
	'Lazy/Sum.php',
];

foreach ($files as $file) {
	require(__DIR__ . '/' . $file);
}