<?php

class Ma {
	public static function in() {
		try {
			// objet de la classe student qui étend les classes user et utils
			$student = new student();

			// propriétés de user
			$student->nom('Choquet');
			$student->prenom('Nicolas');
			$student->telephone('0763207630');
			$student->age(22);
			$student->adresse('22 chemin des hautes combes');

			// propriété de student
			$student->matiere_prefere('PHP');
			$student->mon_tableau(
				[
					'voila' => 'ma premiere ligne',
					'puis' => 'ma seconde ligne'
				]
			);

			// methode appartenant à student
			echo "{$student->get_presentation()}\n";

			// __toString
			echo "{$student}\n";

			// methode appartenant à utils
			echo "{$student->ma_premiere_fonction_dans_utils()}\n";

			// méthode statique de utils appelée par student
			echo student::ma_premiere_fonction_static(['class' => 'utils'], 5, 10, 2)."\n";

			// méthode statique de utils appelée par utils
			echo utils::ma_premiere_fonction_static([5, 10, 2])."\n\n";

			// propriété de student.
			// La propriété récupère un array et prend en paramètre une closure et les paramètre de la closure
			$student->mon_tableau(function (student $student) {
				$array = $student->mon_tableau();
				$array['test'] = 'avec un nouveau tableau';
				return $array;
			}, $student);

			// propriété de student.
			var_dump($student->mon_tableau());

		} catch (Exception $e) {
			echo "{$e->getMessage()}\n";
		}
	}
}