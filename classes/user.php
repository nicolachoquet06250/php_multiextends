<?php

class user extends reference_object {

	public $prenom;
	public $nom;
	public $age;
	public $adresse;
	public $telephone;


	private static $instence;
	protected function __construct() {

	}

	public static function instence() {
		if(self::$instence === null) {
			self::$instence = new user();
		}
		return self::$instence;
	}
}