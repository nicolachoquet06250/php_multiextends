<?php

class reference_object {

	/**
	 * @param $class
	 * @throws Exception
	 */
	protected function extends($class) {
		$class_min = strtolower($class);
		try {
			if(!isset($this->$class_min)) {
				if(in_array('instence', get_class_methods($class))) {
					$this->$class_min = $class::instence();
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

	protected function exists($var, $type = 'var'): bool {
		switch ($type) {
			case 'method':
				return in_array($var, get_class_methods(get_class($this)));
			case 'var':
				foreach (get_object_vars($this) as $name => $value) {
					if($name === $var) {
						return true;
					}
				}
				return false;
			default:
				return false;
		}
	}

	protected function exists_in($var, $in, $type = 'var'): bool {
		switch ($type) {
			case 'method':
				var_dump(get_class_methods(get_class($in)));
				return in_array($var, get_class_methods(get_class($in)));
			case 'var':
				foreach (get_object_vars($in) as $name => $value) {
					if($name === $var) {
						return true;
					}
				}
				return false;
			default:
				return false;
		}
	}

	/**
	 * @param $function
	 * @param $arguments
	 * @return mixed
	 * @throws Exception
	 */
	public function __call($function, $arguments) {
		foreach ($this as $property => $value) {
			if(gettype($value) === 'object') {
				$object = $value;
				if(in_array($function, get_class_methods(get_class($object)))) {
					return $this->$property->$function($arguments);
				}

				foreach ($object as $key => $item) {
					if($key === $function) {
						if($this->exists_in($key, $this->$property)) {
							if(!empty($arguments) && $arguments[0]) {
								$this->$property->$key = $arguments[0];
							}
							return $this->$property->$key;
						}
					}
				}
			}
			else if($this->exists($function, 'method')) {
				return $this->$function($arguments);
			}
			else if($this->exists($function)) {
				if (!empty($arguments) && $arguments[0]) {
					$this->$function = $arguments[0];
				}
				return $this->$function;
			}
		}
		throw new Exception(get_class($this).'::'.$function.'() or '.get_class($this).'::$'.$function.' not found.');
	}
}