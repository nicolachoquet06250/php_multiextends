<?php


/**
 * @method string prenom(string $prenom = null)
 * @method string nom(string $nom = null)
 * @method integer age(integer $age = null)
 * @method string adresse(string $adresse = null)
 * @method string telephone(string $telephone = null)
 * @method string matiere_prefere(string $matiere_prefere = null)
 * @method array mon_tableau(array|Closure $mon_tableau = null, array|string|integer|null $params = null)
 * @method string ma_premiere_fonction_dans_utils()
 */
class student extends reference_object {
	public $matiere_prefere;
	public $mon_tableau = [];

	/**
	 * student constructor.
	 *
	 * @throws Exception
	 */
	public function __construct() {
		$this->extends('user');
		$this->extends('utils');
	}

	public function mon_nom(): string {
		return $this->nom().' '.$this->prenom();
	}

	public function get_presentation() {
		return "Je m'appel {$this->mon_nom()}, j'ai {$this->age()} ans et mon langage de programmation préféré est le {$this->matiere_prefere()}.
J'habite {$this->adresse()}.
Appel moi au {$this->telephone()}.\n";
	}
}