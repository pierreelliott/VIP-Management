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
    

		<div class="container-fluid">	
			<div class="row">
				<h1 class="col-lg-12 center-block">
					Ajouter un VIP
				</h1>
			</div>
			<div class="row marge-haut">
				<div class="col-lg-offset-2 col-lg-8">
					<form method="post" action="index.php?page=ajoutVIP" class="form-horizontal" enctype="multipart/form-data">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label for = "nom" class="col-lg-4 control-label">Nom</label>
									<div class="col-lg-8">
										<input type="text" name="nom" id="nom" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label for = "prenom" class="col-lg-4 control-label">Prenom</label>
									<div class="col-lg-8">
										<input type="text" name="prenom" id="prenom" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="row pointille">
										<div class="col-lg-8">
											<label for="photo" class="col-lg-4 control-label">Photo</label>
											<input type="file" name="photo" id="photo"  accept="image/*">
										</div>
										<div class="col-lg-4">
											<img src="img/avatar.png" alt="avatar" id="apercuPhoto" class="img-responsive">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for = "priorite" class="col-lg-4 control-label">Priorité</label>
									<div class="col-lg-8">
										<input type="number" name="priorite" min="0" max="10" id="priorite" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label for = "datenaissance" class="col-lg-4 control-label">Date de naissance</label>
									<div class="col-lg-8">
										<input type="date" name="datenaissance" id="datenaissance">
										</div>
										<?php if($message != null){
											echo '<p class="text-danger"><strong>'.$message.'</strong></p>';
										} ?>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group marge-bas">
									<label for = "nationalite" class="col-lg-4 control-label">Nationalité</label>
									<div class="col-lg-8">
										<select name="nationalite" id="nationalite" class="form-control">
											<option value="France" selected>France</option>
											<option value="England">England</option>
											<option value="Deutschland">Deutschland</option>
											<option value="Spain">Spain</option>
											<option value="USA">USA</option>
										</select>
									</div>
								</div>
								<div class="form-group marge-bas">
									<label for = "typeVIP" class="col-lg-4 control-label">Type VIP</label>
									<div class="col-lg-8">
										<select name="typeVIP" id="typeVIP" class="form-control">
											<option value="Journaliste" selected>Journaliste</option>
											<option value="Comédien">Comédien</option>
											<option value="Réalisateur">Réalisateur</option>
											<option value="Scénariste">Scénariste</option>
											<option value="Photographe">Photographe</option>
											<option value="Acteur">Acteur</option>
											<option value="Producteur">Producteur</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-offset-2 col-lg-3">
								<button type="submit" class="btn btn-lg btn-primary btn-block">Ajouter VIP</button>
							</div>
							<div class="col-lg-offset-2 col-lg-3">
								<a href="index.php?page=accueil" class="btn btn-lg btn-primary btn-block">Retour</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
	<script>
			$(function()
			{	
				// Lorsqu'on choisi une image dans l'input file
				$('#photo').change(function (e1) {
					var filename = e1.target.files[0]; 
					var fr = new FileReader();
					fr.onload = function (e2) { 
						$('img').attr('src', e2.target.result);
					};  
					fr.readAsDataURL(filename); 
				});
			});
		</script>
  </body>
</html>
