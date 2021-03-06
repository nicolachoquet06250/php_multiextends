<?php

class reference_object {

	/**
	 * reference_object constructor.
	 *
	 * @param array $extends
	 * @throws Exception
	 */
	public function __construct($extends = []) {
		$this->extends($extends);
	}

	/**
	 * @param $class
	 * @throws Exception
	 */
	protected function extends($class) {
		if(gettype($class) === 'string') {
			$class_min = strtolower($class);
			try {
				if (!isset($this->$class_min)) {
					if (in_array('instence', get_class_methods($class))) {
						$this->$class_min = $class::instence();
					}
					else {
						$this->$class_min = new $class();
					}
				}
			} catch (Exception $e) {
				throw new Exception($e->getMessage());
			}
		}
		else if(gettype($class) === 'array') {
			foreach ($class as $_class) {
				$class_min = strtolower($_class);
				try {
					if (!isset($this->$class_min)) {
						if (in_array('instence', get_class_methods($_class))) {
							$this->$class_min = $_class::instence();
						}
						else {
							$this->$class_min = new $_class();
						}
					}
				} catch (Exception $e) {
					throw new Exception($e->getMessage());
				}
			}
		}
	}

	/**
	 * @param  string $var
	 * @param  string $type
	 * @return bool
	 */
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

	/**
	 * @param  string $var
	 * @param  object $in
	 * @param  string $type
	 * @return bool
	 */
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
	 * @param string $function
	 * @param array $arguments
	 * @return string|integer|array|null
	 * @throws Exception
	 */
	public function __call($function, $arguments) {
		//var_dump($this);
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
								if(gettype($arguments[0]) === 'object' && get_class($arguments[0]) === 'Closure') {
									$arguments[1] = isset($arguments[1]) ? $arguments[1] : $this;
									$this->$property->$key = $arguments[0]($arguments[1]);
								}
								else {
									$this->$property->$key = $arguments[0];
								}
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
					if(gettype($arguments[0]) === 'object' && get_class($arguments[0]) === 'Closure') {
						$arguments[1] = isset($arguments[1]) ? $arguments[1] : $this;
						$this->$function = $arguments[0]($arguments[1]);
					}
					else {
						$this->$function = $arguments[0];
					}
				}
				return $this->$function;
			}
		}
		throw new Exception(get_class($this).'::'.$function.'() or '.get_class($this).'::$'.$function.' not found.');
	}

	/**
	 * @param $name
	 * @param $arguments
	 * @return mixed
	 * @throws Exception
	 */
	public static function __callStatic($name, $arguments) {
		$class = isset($arguments[0]['class']) ? $arguments[0]['class'] : self::class;
		if(in_array($name, get_static_method($class))) {
			unset($arguments[0]);
			$tmp = [];
			foreach ($arguments as $argument) {
				$tmp[] = $argument;
			}
			$arguments = $tmp;
			return $class::$name($arguments);
		}
		throw new Exception("static method {$class}::{$name}() not found");
	}
}