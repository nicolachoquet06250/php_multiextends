<?php

class user {
	private static $instence;
	private function __construct() {

	}

	public static function instence() {
		if(self::$instence === null) {
			self::$instence = new user();
		}
		return self::$instence;
	}

	public $prenom;
	public $nom = '';
	public $age;
	public $adresse;
	public $telephone;
}