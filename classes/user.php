<?php

/**
 * @method string prenom(string $prenom = null)
 * @method string nom(string $nom = null)
 * @method integer age(integer $age = null)
 * @method string adresse(string $adresse = null)
 * @method string telephone(string $telephone = null)
 */
class user extends reference_object {

	/**
	 * @var string $prenom
	 * @var string $nom
	 * @var integer $age
	 * @var string $adresse
	 * @var string $telephone
	 */
	public $prenom;
	public $nom;
	public $age;
	public $adresse;
	public $telephone;
}