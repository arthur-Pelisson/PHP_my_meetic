<?php
class user
{
	
	private $conn ;
	

	function __construct()
	{
		$this->conn = new PDO("mysql:host=localhost; dbname=my_meetic", 'root', '30042436') ;
	}

	
	public function getUserByfilter($filter)
	{

	}

	public function userExist($email, $password)
	{
		if ($password == true) 
		{
			$requetmdp = $this->conn->prepare('SELECT password FROM membre WHERE email = :email');
			$requetmdp->bindParam(':email', $email, PDO::PARAM_STR);
			$requetmdp->execute();
			$requemdp = $requetmdp->fetchALL(PDO::FETCH_OBJ);
			$donnees = $requemdp[0]->password;
			var_dump($donnees);
			// var_dump($email);
			var_dump($email);
			$requet = $this->conn->prepare("SELECT COUNT(*) FROM membre WHERE email = :email AND password = " . $donnees);
			$requet->bindParam(":email", $email, PDO::PARAM_STR);
			// $requet->bindParam(":password", $password, PDO::PARAM_STR);
			$requet->execute();
			$donnes = $requet->fetch();
			$donnes_final = $donnes[0];
			// var_dump($donnes);
			
			if ($donnes_final == 1) 
			{

				return true;
			}
			else
			{
				return false;
			}
		}
	}

	public function addUser($nom, $prenom, $date_de_naissance, $sexe, $ville, $email, $password)
	{

			$checkUserExists = $this->conn->prepare("SELECT COUNT(nom) FROM membre WHERE email = :email") ;
			$checkUserExists->bindParam(':email', $email, PDO::PARAM_STR);
			$checkUserExists->execute();
			$result = $checkUserExists->fetch();
			$count = $result[0];
			$naissance = $_POST['date_de_naissance'];
			$under18 = (date('Y-m-d') - $naissance);
				if ($under18 >= 18) 
				{
					if ($count == 0) 
					{

					$requet = $this->conn->prepare('INSERT INTO membre (nom, prenom, date_de_naissance, sexe, ville, email, password)
					 VALUES (:nom, :prenom, :date_de_naissance, :sexe, :ville, :email, :password)');
					$requet->bindParam(':nom', $prenom, PDO::PARAM_STR) ;
					$requet->bindParam(':prenom', $nom, PDO::PARAM_STR) ;
					$requet->bindParam(':date_de_naissance', $date_de_naissance, PDO::PARAM_STR) ;
					$requet->bindParam(':sexe', $sexe, PDO::PARAM_STR) ;
					$requet->bindParam(':ville', $ville, PDO::PARAM_STR) ;
					$requet->bindParam(':email', $email, PDO::PARAM_STR) ;
					$requet->bindParam(':password', $password, PDO::PARAM_STR) ;
					// var_dump($requet);
					$requet->execute();
					}
					else
					{
						echo "cette addrese email existe deja";
					}
				}
				else
				{
					echo "vous devez avoir plus de 18ans pour vous inscrire" ;
				}
	}

	public function getProfil($email)
	{
		$requet = $this->conn->prepare('SELECT * FROM membre WHERE email = :email');
		$requet->bindParam(':email', $email, PDO::PARAM_STR);
		$requet->execute();
		$user_info = $requet->fetchAll(PDO::FETCH_OBJ);
		return $user_info;

	}

	public function changeProfil($columns, $change, $id_membre)
	{
		// var_dump('hello');
		// var_dump($columns);
		// var_dump($change);
		// var_dump($id_membre);
		$requet = $this->conn->prepare('UPDATE membre SET ' . $columns . ' = :change WHERE id_membre = :id_membre');
		$requet->bindParam(':change', $change, PDO::PARAM_STR);
		$requet->bindParam(':id_membre', $id_membre, PDO::PARAM_INT);
		$requet->execute();
	}

	public function ban_user($id_membre)
	{
		$requet = $this->conn->prepare('UPDATE membre SET ban = 0 WHERE id_membre = :id_membre');
		$requet->bindParam(':id_membre', $id_membre, PDO::PARAM_INT);
		$requet->execute();
	}

	public function verifBan($email)
	{
		$requet = $this->conn->prepare('SELECT ban FROM membre WHERE email = :email');
		$requet->bindParam(':email', $email, PDO::PARAM_STR);
		$requet->execute();
	}

	public function verifEmail($email)
	{
		$requet = $this->conn->prepare('SELECT COUNT(email) FROM membre WHERE email = :email');
		$requet->bindParam(':email', $email, PDO::PARAM_STR);
		$requet->execute();
		$donnees = $requet->fetch();
		$donnees = $donnees[0];
		if ($donnees != 1) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function verifPassword($email)
	{
		$requet = $this->conn->prepare('SELECT password FROM membre WHERE email = :email');
		$requet->bindParam(':email', $email, PDO::PARAM_STR);
		$requet->execute();
		$donnees = $requet->fetchALL(PDO::FETCH_OBJ);

		// $donnees = $donnees[0];
		return $donnees;
		// return $donnees;
	}
}


