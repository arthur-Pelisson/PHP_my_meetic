<?php
require_once('user.php');


if (isset($_POST['email']) && isset($_POST['password'])) 
{
	$connexion = new user;
	$verif_password = new user;
	$verif_password = $verif_password->verifPassword($_POST['email']);
	if (password_verify($_POST['password'], $verif_password[0]->password))
	{
		$profil = new user;
		$user_info = $profil->getProfil($_POST['email']);
		if ( $user_info[0]->ban != 0) 
		{
			session_start();
			header('location: index.php');
			$_SESSION['email'] = $_POST['email'];
		}
		else
		{
			header('location: connexion.html');
		}
	}
	else
	{
		echo "Mauvais email ou mot de passe!";
		header('location: connexion.html');
	}
}
else
{
	echo "veullier remplire tout les champ ";
	header('location: index.php');
}
