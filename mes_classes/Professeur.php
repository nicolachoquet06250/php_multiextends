<?php

/**
 * From User class
 * @method string  name(string $name = null)
 * @method string  first_name(string $first_name = null)
 * @method string  birthday(string $birthday = null)
 * @method integer age(int|Closure|null $age = null, array|null $params = null)
 * @method string  address(string $address = null)
 * @method string  postal_code(string $postal_code = null)
 * @method string  city(string $city = null)
 *
 * From Professeur class
 * @method string  matiere(string $matiere = null)
 * @method array   classes(string $classes = null)
 */
class Professeur extends reference_object {
	public $matiere;
	public $classes;

	public function __construct(array $extends = []) {
		$extends = [
			'User'
		];
		parent::__construct($extends);
	}
}