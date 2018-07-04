<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Gestion VIP</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="Vue/css.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>
    
		<p><?php if(isset($_SESSION['pseudo'])) echo "Utilisateur connecté : ".$_SESSION['pseudo'];?></p>

		<div class="container-fluid">
			<div class="row">
				<h1 class="col-lg-12 center-block">
					Gestion des VIP
				</h1>
			</div>
			<div class="row bordered-top">
				<div class="col-lg-6">
					<div class="row">
						<div class="col-lg-offset-3 col-lg-6">
							<a href="index.php?page=ajoutVIP" class="btn btn-lg btn-primary btn-block marge-bouton">Ajouter VIP</a>
						</div>
						<div class="col-lg-offset-3 col-lg-6">
							<a href="index.php?page=modificationVIP" class="btn btn-lg btn-primary btn-block marge-bouton">Modifier VIP</a>
						</div>
						<div class="col-lg-offset-3 col-lg-6">
							<a href="index.php?page=suppressionVIP" class="btn btn-lg btn-primary btn-block marge-bouton">Supprimer VIP</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6 bordered-left">
					<div class="row">
						<div class="col-lg-offset-3 col-lg-6">
							<a href="index.php?page=accueilAjoutEchangeVIP" class="btn btn-lg btn-primary btn-block marge-bouton">Ajouter échange VIP</a>
						</div>
						<div class="col-lg-offset-3 col-lg-6">
							<a href="index.php?page=modificationEchangeVIP" class="btn btn-lg btn-primary btn-block marge-bouton">Modifier échange VIP</a>
						</div>
						<div class="col-lg-offset-3 col-lg-6">
							<a href="" class="btn btn-lg btn-primary btn-block marge-bouton">Supprimer échange VIP</a>
						</div>
					</div>
				</div>
			</div>
		</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>


