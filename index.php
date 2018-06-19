<?php

require_once 'autoload.php';

try {
	$obj = new student();

	$obj->nom('Choquet');
	$obj->prenom('Nicolas');
	$obj->matiere_prefere('PHP');

	$nom_complet = $obj->mon_nom();
	$ma_matiere_prefere = $obj->matiere_prefere();

	echo $obj->get_presentation();
	echo $obj->ma_premiere_fonction_dans_utils();

} catch (Exception $e) {
	echo "{$e->getMessage()}\n";
}