<?php

require_once 'autoload.php';

try {
	$obj = new student();

	$obj->nom('Choquet');
	$obj->prenom('Nicolas');
	$obj->telephone('0763207630');
	$obj->age(22);
	$obj->adresse('22 chemin des hautes combes');
	$obj->matiere_prefere('PHP');

	echo $obj->get_presentation();
	echo $obj->ma_premiere_fonction_dans_utils();

} catch (Exception $e) {
	echo "{$e->getMessage()}\n";
}