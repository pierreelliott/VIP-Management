<?php
	require_once("bdd.php");
	
	function ajouterEchangeVIP($date, $contenu, $numVIP)
	{
		global $bdd;
		$requete = "INSERT INTO EchangeVip(dateEchange, contenuEchange, numVIP)
					VALUES(:date, :contenu, :numVIP)";
					
		$resultat = $bdd->prepare($requete);
		return $resultat->execute(array(
			"date" => $date,
			"contenu" => $contenu,
			"numVIP" => $numVIP
		));
	}
	
	function getEchangesVIPs()
	{
		global $bdd;
		$requete = "SELECT numEchange, dateEchange, contenuEchange, numVIP
					FROM EchangeVip";
					
		$resultat = $bdd->query($requete);
		$resultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
		
		return $resultat;
	}
	
	function getEchangesVIP($numVIP)
	{
		global $bdd;
		$requete = "SELECT numEchange, dateEchange, contenuEchange, numVIP, numAction
					FROM EchangeVip e JOIN ActionEntreprise a
					ON e.numEchange = a.numEchange
					WHERE numVIP = :numVIP";
					
		$resultat = $bdd->prepare($requete);
		$resultat->execute(array(
			"numVIP" => $numVIP
		));
		$resultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
		
		return $resultat;
	}
	
	function getActions($numEchange)
	{
		global $bdd;
		$requete = "SELECT numAction, libelle, etat, dateRealisation, numEchange
					FROM ActionEntreprise
					WHERE numEchange = :numEchange";
		
		$resultat = $bdd->prepare($requete);
		$resultat->execute(array(
			"numEchange" => $numEchange
		));
		$resultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
		
		return $resultat;
	}
	
	function ajouterAction($libelle, $etat, $dateRealisation, $numEchange)
	{
		global $bdd;
		$requete = "INSERT INTO ActionEntreprise(libelle, etat, dateRealisation, numEchange)
								VALUES(:libelle, :etat, :dateRealisation, :numEchange)";
								
		$resultat = $bdd->prepare($requete);
		$resultat->execute(array(
			"libelle" => $libelle,
			"etat" => $etat,
			"dateRealisation" => $dateRealisation,
			"numEchange" => $numEchange
		));
		
		return $resultat;
	}
	
	function modifierAction($libelle, $etat, $dateRealisation, $numEchange, $numAction)
	{
		global $bdd;
		$requete = "UPDATE ActionEntreprise
					SET	libelle = :libelle, etat = :etat, dateRealisation = :dateRealisation, numEchange = :numEchange
					WHERE numAction = :numAction";
								
		$resultat = $bdd->prepare($requete);
		$resultat->execute(array(
			"libelle" => $libelle,
			"etat" => $etat,
			"dateRealisation" => $dateRealisation,
			"numEchange" => $numEchange,
			"numAction" => $numAction
		));
		
		return $resultat;
	}
	
	function supprimerAction($numAction)
	{
		global $bdd;
		$requete = "DELETE FROM ActionEntreprise
					WHERE numAction = :numAction";
								
		$resultat = $bdd->prepare($requete);
		$resultat->execute(array(
			"numAction" => $numAction
		));
		
		return $resultat;
	}
?>