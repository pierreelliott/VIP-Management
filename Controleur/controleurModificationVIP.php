<?php
	require("Modele/modeleVIP.php");
	
	if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
	{
		if ($_FILES['photo']['size'] <= 1000000)
		{
			   
			$infosfichier = pathinfo($_FILES['photo']['name']);
			$extension_upload = $infosfichier['extension'];
			$extensions_autorisees = array('jpg', 'jpeg', 'png');
			if (in_array($extension_upload, $extensions_autorisees))
			{   
				move_uploaded_file($_FILES['photo']['tmp_name'], 'img/photos/' . basename($_FILES['photo']['name']));	
			}
		}
	}
	
	if
	(
		isset($_POST["nom"]) and isset($_POST["prenom"]) and
		isset($_POST["priorite"]) and
		isset($_POST["datenaissance"]) and isset($_POST["nationalite"]) and
		isset($_POST["typeVIP"])
	)
	{
	    if
		(
			!empty($_POST["nom"]) and !empty($_POST["prenom"]) and
			!empty($_POST["priorite"]) and
			!empty($_POST["datenaissance"]) and !empty($_POST["nationalite"]) and
			!empty($_POST["typeVIP"])
		)
		{
			$_POST["nom"] = htmlspecialchars($_POST["nom"]);
			$_POST["prenom"] = htmlspecialchars($_POST["prenom"]);
			$_POST["priorite"] = htmlspecialchars($_POST["priorite"]);
			$_POST["datenaissance"] = htmlspecialchars($_POST["datenaissance"]);
			$_POST["nationalite"] = htmlspecialchars($_POST["nationalite"]);
			$_POST["typeVIP"] = htmlspecialchars($_POST["typeVIP"]);
			$photo = 'img/photos/' . basename($_FILES['photo']['name']);
			
			$res = modifierVIP(
				$_POST["numVIP"],
				$_POST["nom"],
				$_POST["prenom"],
				$photo,
				(int)$_POST["priorite"],
				$_POST["datenaissance"],
				$_POST["nationalite"],
				$_POST["typeVIP"]
			);
		}
	}
		
	$vips = getVIPs();
	
	include("Vue/modificationVIP.php");