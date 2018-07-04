<?php

	//Table créée :  VIP / Echange VIP / Action Entreprise
	//Action Entr importe Echange VIP qui importe VIP
	$bdd = null;
	try
	{
		if($_SERVER["SERVER_NAME"] == "localhost")
		{
		    $serveur = "localhost";
		    $utilisateur = "root";
		    $mdp = "";
		    $base = "BDD_VIP";
		}
		// Uncomment to change BDD config if the server is not localhost
		// else
		// {
		// 	$serveur = "";
		//     $utilisateur = "";
		//     $mdp = "";
		//     $base = "";
		// }
		$bdd = new PDO('mysql:host='.$serveur.
			';dbname='.$base, $utilisateur, $mdp);
	}
	catch(Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
?>
