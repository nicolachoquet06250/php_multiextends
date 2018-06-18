<?php

class reference_object {

	/**
	 * @param $class
	 * @throws Exception
	 */
	public function extends($class) {
		$class_min = strtolower($class);
		try {
			if(isset($this->$class_min)) {
				throw new Exception('Une classe ne peux pas être étendue plusieurs fois.');
			}
			else {
				if(in_array('instence', get_class_methods($class))) {
					$this->$class_min = $class::instence();
				}
				else {
					throw new Exception('PHP Fatal error:  Uncaught Error: Call to private '.$class.'::__construct() from context \''.__CLASS__.'\'');
				}
			}
		}
		catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
		if(!isset($this->$class_min)) {
			$this->$class_min = new $class();
		}

	}

	/**
	 * @param $function
	 * @param $arguments
	 * @return mixed
	 * @throws Exception
	 */
	public function __call($function, $arguments) {
		foreach ($this as $name => $value) {
			if(gettype($value) === 'object') {
				foreach ($value as $key => $item) {
					if($key === $function) {
						if(!in_array($key, get_class_methods($name))) {
							if(!empty($arguments) && $arguments[0]) {
								$this->$name->$key = $arguments[0];
							}
							return $this->$name->$key;
						}
						else {
							return $this->$name->$key($arguments);
						}
					}
				}
				return null;
			}
			else if(in_array($function, get_class_methods(get_class($this)))) {
				return $this->$function($arguments);
			}
			else if(in_array($function, get_object_vars($this))) {
				if (!empty($arguments) && $arguments[0]) {
					$this->$function = $arguments[0];
				}
				return $this->$function;
			}
		}
		/** @var string $name */
		throw new Exception(get_class($this).'::'.$name.' est ni une méthode, ni une propriété.');
	}
}