<?php

require_once 'lib/autoload.php';

$dir = opendir(__DIR__.'/mes_classes');
while (($file = readdir($dir)) !== false) {
	if($file !== '.' && $file !== '..') {
		require_once __DIR__."/mes_classes/{$file}";
	}
}