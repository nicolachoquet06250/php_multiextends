<?php

class Ma {
	public static function in() {
		try {

			$fonction_pour_les_callback_des_tableaux = function(student $student) {
				$array = $student->mon_tableau();
				$array['test'] = 'avec un nouveau tableau';
				$array['et'] = 'aussi qui prend en parametre une closure donc qui peux avoir un résultat dynamique';
				$array['comme'] = "par exemple nom={$student->nom()}";
				return $array;
			};

			// objet de la classe student qui étend les classes user et utils
			$student = new student();

			$student2 = new student([
				'user',
				'utils',
				'class_a_etendre'
			]);

			// propriétés de user
			$student->nom('Choquet');
			$student->prenom('Nicolas');
			$student->telephone('0763207630');
			$student->age(22);
			$student->adresse('22 chemin des hautes combes');

			$student2->nom('Loubet');
			$student2->prenom('André');
			$student2->telephone('0768654895');
			$student2->age(50);
			$student2->adresse('23 tror tsts');

			// propriété de student
			$student->matiere_prefere('PHP');
			$student->mon_tableau(
				[
					'voila' => 'ma premiere ligne',
					'puis' => 'ma seconde ligne'
				]
			);

			$student2->matiere_prefere('rien');
			$student2->mon_tableau($fonction_pour_les_callback_des_tableaux);

			// methode appartenant à student
			echo "{$student->get_presentation()}\n";

			// __toString
			echo "{$student}\n";

			// methode appartenant à utils
			echo "{$student->ma_premiere_fonction_dans_utils()}\n";

			// méthode statique de utils appelée par student
			echo 'lancé avec student: '.student::ma_premiere_fonction_static(['class' => 'utils'], [5, 10, 2])."\n";

			// méthode statique de utils appelée par utils
			echo 'lancé avec utils: '.utils::ma_premiere_fonction_static([5, 10, 2])."\n\n";

			// propriété de student.
			// La propriété récupère un array et prend en paramètre une closure et les paramètre de la closure
			$student->mon_tableau($fonction_pour_les_callback_des_tableaux);

			// propriété de student.
			var_dump($student->mon_tableau());

			$student2->mon_tableau(function (student $student) {
				$array = $student->mon_tableau();
				$array['toto'] = 'property: '.$student->property();
				return $array;
			});

			var_dump($student2->mon_tableau());

		} catch (Exception $e) {
			echo "{$e->getMessage()}\n";
		}
	}
}