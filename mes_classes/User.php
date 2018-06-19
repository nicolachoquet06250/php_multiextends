<?php

/**
 * @method string  name(string $name = null)
 * @method string  first_name(string $first_name = null)
 * @method string  birthday(string $birthday = null)
 * @method integer age(int|Closure|null $age = null, array|null $params = null)
 * @method string  address(string $address = null)
 * @method string  postal_code(string $postal_code = null)
 * @method string  city(string $city = null)
 */
class User extends reference_object {
	public $name;
	public $first_name;
	public $birthday;
	public $age;
	public $address;
	public $postal_code;
	public $city;
}