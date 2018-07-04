<!DOCTYPE html>
<html>
    <head>
       <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css.css" />
		<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <title>Gestion VIP</title>
		<meta name="description" content="Page de connexion VIP" />
		<meta name="author" content="B2T">
		<link rel="stylesheet" href="Vue/css.css">
     
    </head>
	
<body> 

	<div id="contenant">
		<div id="couleurform">
			<h1>Connexion - Gestion des VIP</h1>
			
			<form method="post" action="index.php?page=connexion" id="formulaire">
				
					<p>Pseudo : <input type="text" name="pseudo" value ="<?php if(isset($_COOKIE['pseudo']) ) echo $_COOKIE['pseudo'];?>" /></p>
					<p>Mot de passe :<input name="mdp" type="password" value ="<?php if(isset($_COOKIE['mdp']) ) echo $_COOKIE['mdp'];?>"/></p>
									 <input type="checkbox" name="souvenir" id="case"/> <label for="case">Se souvenir de moi</label>
					
			   <p style="text-align: center;"><input type="submit" value="Se connecter" /></p>
				
			</form>
			<?php if(isset($req) && $req==false ){
				echo' Merci de rentrer un identifiant ou mot de passe correct ! Il se peut que vous n\'ayez pas d\'accès à cette page.'; }  ?>
		</div>	
			
	</div>
</body>

</html>
