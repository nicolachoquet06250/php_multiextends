<?php

function get_static_method($class) {
	$array = [];
	$content = file_get_contents('classes/'.$class.'.php');
	preg_replace_callback('`public static function ([a-zA-Z0-9\_]+)\(\$[a-zA-Z0-9\_]+\)`', function ($matches) use (&$array) {
		$array[] = $matches[1];
	}, $content);
	return $array;
}

$dir = opendir(__DIR__.'/lib');
while (($file = readdir($dir)) !== false) {
	if($file !== '.' && $file !== '..') {
		require_once __DIR__."/lib/{$file}";
	}
}