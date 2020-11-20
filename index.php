<?php

 session_start();
if ($_SESSION['email'] == '')
{  
	header('Location: conn_inscription.php');
	exit;
}
else
{
	include('user.php');
	$profil = new user;
	$user_info = $profil->getProfil($_SESSION['email']);
	// var_dump($user_info[0]->nom);
	
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8"/>
	<title>mymeetic</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="index.css">
	<!-- <script type="text/javascript" src="formulaire.js"></script> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<header class="header">
	<form action="deconnexion.php">
		<input class="btn btn-warning"  type="submit" name="deco" value="Deconnexion">
	</form>
	<a class="recherche" href="rechercher_un_membre.php">Rechercher l'ame soeur</a>
</header>
<!-- <div class="container-fluid" >
	<div class="row">
		<div class="offset-lg-4 col-lg-4 IDP">

		</div>
	</div>
</div> -->
<div class="container-fluid">
	<div class="row">
		<div class="offset-lg-3 col-lg-6 info_profil">
			<h2>Votre profile</h2>
			<form action="change_profile.php"  method="post">
				<span>Nom</span>
				<div class="container-fluid">
					<div class="row">
						<input class="form-control col-lg-5" type="text" value="<?php echo $user_info[0]->nom?>" name="change">
						<input class="btn btn-primary offset-lg-2 col-lg-3" type="submit" name="nom_btn" value="Change">
						<input type="hidden" name="columns" value="nom">
						<input type="hidden" name="id_membre" value="<?php echo $user_info[0]->id_membre?>">
					</div>
				</div>
			</form>
		</br>
			<form action="change_profile.php" method="post">
				<span>Prenom</span>
				<div class="container-fluid">
					<div class="row">
						<input class="form-control col-lg-5"  type="text" value="<?php echo $user_info[0]->prenom?>" name="change">
						<input class="btn btn-primary offset-lg-2 col-lg-3" type="submit" name="prenom" value="Change">
						<input type="hidden" name="columns" value="prenom">
						<input type="hidden" name="id_membre" value="<?php echo $user_info[0]->id_membre?>">
					</div>
				</div>
			</form>
		</br>
			<form action="change_profile.php" method="post">
				<span>Date de naissance</span>
				<div class="container-fluid">
					<div class="row">
						<input class="form-control col-lg-5" type="text" value="<?php echo $user_info[0]->date_de_naissance?>" name="change">
						<input class="btn btn-primary offset-lg-2 col-lg-3" type="submit" name="date_de_naissance" value="Change">
						<input type="hidden" name="columns" value="date_de_naissance">
						<input type="hidden" name="id_membre" value="<?php echo $user_info[0]->id_membre?>">
					</div>
				</div>
			</form>
		</br>
			<form action="change_profile.php" method="post">
				<span>Sex</span>
				<div class="container-fluid">
					<div class="row">
						<input class="form-control col-lg-3" type="text"  value="<?php echo $user_info[0]->sexe?>" name="pardon" readonly>
						<select name="change" class="form-control col-lg-3" >
							<option value="0">Sex</option>
							<option value="Homme">Homme</option>
							<option value="Femme">Femme</option>
							<option value="nerd">Nerd</option>
							<option value="apach helicopter">Apach helicopter</option>
						</select>
						<input class="btn btn-primary offset-lg-1 col-lg-3" type="submit" name="sex" value="Change">
						<input type="hidden" name="id_membre" value="<?php echo $user_info[0]->id_membre?>">
						<input type="hidden" name="columns" value="sexe">
					</div>
				</div>
			</form>
			</br>
			<form action="change_profile.php" method="post">
				<span>Ville</span>
				<div class="container-fluid">
					<div class="row">
						<input class="form-control col-lg-5" type="text" value="<?php echo $user_info[0]->ville?>" name="change">
						<input class="btn btn-primary offset-lg-2 col-lg-3" type="submit" name="ville" value="Change">
						<input type="hidden" name="columns" value="ville">
						<input type="hidden" name="id_membre" value="<?php echo $user_info[0]->id_membre?>">
					</div>
				</div>
			</form>
		</br>
			<form action="change_profile.php" method="post">
				<span>addrese email</span>
				<div class="container-fluid">
					<div class="row">
						<input class="form-control col-lg-5" type="text" value="<?php echo $user_info[0]->email?>"  name="change">
						<input class="btn btn-primary offset-lg-2 col-lg-3" type="submit" name="email" value="Change">
						<input type="hidden" name="columns" value="email">
						<input type="hidden" name="id_membre" value="<?php echo $user_info[0]->id_membre?>">
					</div>
				</div>
			</form>
		</br>
		</br>
			<form action="change_profile.php" method="post">
				<h5>Change votre mot de passe</br></br></h5>
				<span>Entré votre ancien mot de passe</span>
				<div class="container-fluid">
					<div class="row">
						<input type="hidden"  name="verif_password" value="<?php echo $user_info[0]->password?>">
						<input type="password" class="form-control col-lg-5" name="last_password" required="required">
					</div>
				</div>
				<span>Entré votre nouveau mot de passe</span>
				<div class="container-fluid">
					<div class="row">
						<input class="form-control col-lg-5" type="password"  name="change">
					</div>
			</div>
				<input class="btn btn-primary col-lg-5" type="submit" name="password" value="Change">
				<input type="hidden" name="columns" value="password">
				<input type="hidden" name="id_membre" value="<?php echo $user_info[0]->id_membre?>">
			</form>
		</br>
	</br>
		</br>
			</br>
				</br>
					<form action="ban.php" method="post">
						<input type="submit" name="tarace" value="DELETE ACCOUNT" class="btn btn-danger offset-lg-3 col-lg-5">
						<input type="hidden" name="id_membre" value="<?php echo $user_info[0]->id_membre?>">
					</form>
		</div>
	</div>
	
</div>
<div class="container-fluid">
	<div class="row">
		<div >
			
		</div>
	</div>
	
</div>

</body>
</html>
