<?php

require_once 'autoload.php';

try {
	$obj = new student();

	var_dump($obj->nom('Choquet'));
	var_dump($obj->ma_nom());
} catch (Exception $e) {
	var_dump($e->getMessage());
}