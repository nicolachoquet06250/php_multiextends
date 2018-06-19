<?php

function get_static_method($class) {
	$array = [];
	$content = file_get_contents('classes/'.$class.'.php');
	preg_replace_callback('`public static function ([a-zA-Z0-9\_]+)\(\$[a-zA-Z0-9\_]+\)`', function ($matches) use (&$array) {
		$array[] = $matches[1];
	}, $content);
	return $array;
}

function __autoload($class) {
	$class = $class === 'reference_object' ? "lib/{$class}" : "classes/{$class}";
	require_once "{$class}.php";
}