<?php

function __autoload($class) {
	$class = $class === 'reference_object' ? "lib/{$class}" : "classes/{$class}";
	require_once "{$class}.php";
}