<?php


/**
 *  From user Class
 * @method string prenom(string $prenom = null)
 * @method string nom(string $nom = null)
 * @method integer age(integer $age = null)
 * @method string adresse(string $adresse = null)
 * @method string telephone(string $telephone = null)
 *
 * From student Class
 * @method string matiere_prefere(string $matiere_prefere = null)
 * @method array mon_tableau(array|Closure $mon_tableau = null, array|string|integer|null $params = null)
 *
 * From utils Class
 * @method string ma_premiere_fonction_dans_utils()
 *
 * From class_a_etendre Class
 * @method string property(string $property = null)
 */
class student extends reference_object {
	/**
	 * @var string $matiere_prefere
	 * @var array $mon_tableau
	 */
	public $matiere_prefere;
	public $mon_tableau = [];

	/**
	 * @param array $extends
	 * @throws Exception
	 */
	public function __construct($extends=['user', 'utils']) {
		parent::__construct($extends);
	}

	/**
	 * @return string
	 */
	public function mon_nom(): string {
		return $this->nom().' '.$this->prenom();
	}

	/**
	 * @return string
	 */
	public function __toString(): string {
		return $this->get_presentation();
	}

	/**
	 * @return string
	 */
	public function get_presentation() {
		return "Je m'appel {$this->mon_nom()}, j'ai {$this->age()} ans et mon langage de programmation préféré est le {$this->matiere_prefere()}.
J'habite {$this->adresse()}.
Appel moi au {$this->telephone()}.\n";
	}
}