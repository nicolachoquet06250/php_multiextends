<?php

class student extends reference_object {
	/**
	 * student constructor.
	 *
	 * @throws Exception
	 */
	public function __construct() {
		$this->extends('user');
	}

	public function mon_nom() {
		return $this->nom.' '.$this->prenom;
	}
}