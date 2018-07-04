<?php
	require("Modele/modeleEchangeVIP.php");
	require("Modele/modeleVIP.php");
	
	$echangesVIPs = getEchangesVIPs();
	foreach($echangesVIPs as $key => $echangesVIP)
	{
		$actions[$echangesVIP["numEchange"]] = getActions($echangesVIP["numEchange"]);
	}
	
	//print_r($echangesVIPs);
	//print_r($actions);
	
	include("Vue/modificationEchangeVIP.php");
?>