<?php
	require("Modele/modeleVIP.php");
	
	if(isset($_POST["numVIP"]))
	{
		$_POST["numVIP"] = (int)$_POST["numVIP"];
		
		$res = supprimerVIP($_POST["numVIP"]);
	}

	$vips = getVIPs();
	
	include("Vue/suppressionVIP.php");