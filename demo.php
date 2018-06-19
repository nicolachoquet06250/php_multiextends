<?php

require_once 'autoload.php';

try {
	$users = [
		new User(),
		new Professeur(),
		new Admin(),
	];

	/**
	 * @var User $user
	 * @var Professeur $prof
	 * @var Admin $admin
	 */
	list($user, $prof, $admin) = $users;

	// instenciation User
	$user->name('Choquet');
	$user->first_name("Nicolas");
	$user->birthday('1995-07-21');
	$user->age(function (User $user) {
		return 22;
	});
	$user->address('22 ch des hautes combes');
	$user->postal_code('06370');
	$user->city('Mouans-Sartoux');

	// instenciation Professeur
	$prof->name('Choquet');
	$prof->first_name("Nicolas");
	$prof->birthday('1995-07-21');
	$prof->age(function (Professeur $professeur) {
		return 22;
	});
	$prof->address('22 ch des hautes combes');
	$prof->postal_code('06370');
	$prof->city('Mouans-Sartoux');
	$prof->matiere('PHP');
	$prof->classes([
					   'B1',
					   'B2',
					   'B3',
				   ]);

	// instenciation Admin
	$admin->name('Choquet');
	$admin->first_name("Nicolas");
	$admin->birthday('1995-07-21');
	$admin->age(function (Admin $admin) {
		return 22;
	});
	$admin->address('22 ch des hautes combes');
	$admin->postal_code('06370');
	$admin->city('Mouans-Sartoux');
	$admin->droits(['r1', 'w1']);




	// affichage User
	var_dump($user->name());
	var_dump($user->first_name());
	var_dump($user->birthday());
	var_dump($user->age());
	var_dump($user->address());
	var_dump($user->postal_code());
	var_dump($user->city());


	// affichage Professeur
	var_dump($prof->name());
	var_dump($prof->first_name());
	var_dump($prof->birthday());
	var_dump($prof->age());
	var_dump($prof->address());
	var_dump($prof->postal_code());
	var_dump($prof->city());
	var_dump($prof->matiere());
	var_dump($prof->classes());


	// affichage Admin
	var_dump($admin->name());
	var_dump($admin->first_name());
	var_dump($admin->birthday());
	var_dump($admin->age());
	var_dump($admin->address());
	var_dump($admin->postal_code());
	var_dump($admin->city());
	var_dump($admin->droits());

} catch (Exception $e) {
	echo $e->getMessage()."\n";
}