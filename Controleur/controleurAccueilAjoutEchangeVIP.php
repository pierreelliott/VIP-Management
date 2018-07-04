<?php
	require("Modele/modeleVIP.php");
	
	$vips = getVIPs();
	
	include("Vue/accueilAjoutEchangeVIP.php");
?>