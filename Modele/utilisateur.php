<?php 
class Utilisateur{
	
	
	function connexion($login, $mdp){
		global $bdd;
		$bool = true;
		
		$resultat = $this->getUtil($login, $mdp);

		if (!$resultat)
		{
			
			$bool = false;
			
		}
		
		
		return $bool;
	
		
	}
	
	function getUtil($login, $mdp){
		global $bdd;
		$req = $bdd->prepare('SELECT login, mdp FROM Utilisateurs WHERE login = :login AND mdp = :mdp');
		$req->execute(array(
			'login' => $login,
			'mdp' => $mdp));

		$resultat = $req->fetch();
		
		return $resultat;
		
	}
	
	
}

?>