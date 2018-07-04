<?php
	require("Modele/modeleEchangeVIP.php");
	require("Modele/modeleVIP.php");
	
	modifierAction($_POST["libelle"], $_POST["etat"], $_POST["dateRealisation"], $_POST["numEchange"], $_POST["numAction"]);
?>