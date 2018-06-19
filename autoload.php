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
	$exceptions = [
		'reference_object' => [
			'directory' => 'lib',
			'class' => 'reference_object'
		],
		'Ma' => [
			'directory' => 'classes',
			'class' => 'Main'
		],
		'default' => [
			'directory' => 'classes',
			'class' => $class
		]
	];
	$class = isset($exceptions[$class]) ? $class : 'default';
		$class = "{$exceptions[$class]['directory']}/{$exceptions[$class]['class']}";
	require_once "{$class}.php";
}