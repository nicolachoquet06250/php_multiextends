<?php

class utils {
	public function ma_premiere_fonction_dans_utils() {
		return __FUNCTION__."\n";
	}

	public static function ma_premiere_fonction_static($array) {
		$result = null;
		for($i=0, $max=count($array); $i<$max; $i++) {
			if($i === 0) {
				$result = $array[$i];
			}
			else {
				$result *= $array[$i];
			}
		}
		return $result;
	}
}