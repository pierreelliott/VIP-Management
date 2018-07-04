<?php 
	session_name('p1402690');
	session_start();

	if(isset($_GET["page"]))
	{
		$page = $_GET["page"];
	}
	else
	{
		$page = "connexion";
	}
	
	switch($page)
	{
		case "connexion" :
			require("Controleur/controleurConnexion.php");
		break;
		case "accueil" :
			require("Vue/accueil.php");
		break;
		case "ajoutVIP" :
			require("Controleur/controleurAjoutVIP.php");
		break;
		case "modificationVIP" :
			require("Controleur/controleurModificationVIP.php");
		break;
		case "suppressionVIP" :
			require("Controleur/controleurSuppressionVIP.php");
		break;
		case "accueilAjoutEchangeVIP" :
			require("Controleur/controleurAccueilAjoutEchangeVIP.php");
		break;
		case "ajoutEchangeVIP" :
			require("Controleur/controleurAjoutEchangeVIP.php");
		break;
		case "modificationEchangeVIP" :
			require("Controleur/controleurModificationEchangeVIP.php");
		break;
		case "ajouterAction" :
			require("Controleur/controleurAjoutAction.php");
		break;
		case "modifierAction" :
			require("Controleur/controleurAjoutAction.php");
		break;
		case "supprimerAction" :
			require("Controleur/controleurAjoutAction.php");
		break;
		default :
			require("Vue/404.php");
	}

?>