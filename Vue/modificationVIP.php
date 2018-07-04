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
			<div class="row marge-haut">
				<div class="col-xs-3">
					<div class="input-group">
						<span class="input-group-addon glyphicon glyphicon-search"></span>
						<input type="search" name="recherche" class="form-control" placeholder="Recherche">
					</div>
					<ul class="nav nav-pills nav-stacked">
						<!-- Les noms seront ceux des différents VIP de la bdd affichés avec PHP (l'attribut href : # + numVIP) -->
						<?php foreach($vips as $key => $vip) { ?>
						
						<li<?php if($key == 0) echo ' class="active"'; ?>><a href="#<?php echo $vip["numVIP"]; ?>" data-toggle="tab"><?php echo $vip["prenom"].' '.$vip["nom"]; ?></a></li>
						
						<?php } ?>
					</ul>
					<div class="tab-content">
						<!-- Ces valeurs seront récupérées dans la bdd et écrite sous ce format pour faire de l'autocomplétion quand on clique sur un vip, l'atribut id pareil que href sans le # (il y a peut-être mieux mais j'ai pas trouver) -->
						<?php foreach($vips as $key => $vip) { ?>
						
						<div class="tab-pane fade <?php if($key == 0) echo 'in active '; ?>hidden" id="<?php echo $vip["numVIP"]; ?>"><?php echo toString($vip); ?></div>
						
						<?php } ?>
					</div>
					<a href="index.php?page=ajoutVIP" class="btn btn-primary btn-block">Ajouter un VIP</a>
				</div>
				<div class="col-xs-offset-1 col-xs-7 contour">
					<div class="row">
						<h1 class="col-xs-12 center-block">
							Modifier un VIP
						</h1>
					</div>
					<div class="row marge-haut">
						<div class="col-xs-offset-2 col-xs-8">
							<form method="post" action="index.php?page=modificationVIP" class="form-horizontal" enctype="multipart/form-data">
								<div class="row">
									<div class="col-xs-6">
										<input type="hidden" name="numVIP" id="numVIP">
										<div class="form-group">
											<label for="nom" class="col-xs-4 control-label">Nom</label>
											<div class="col-xs-8">
												<input type="text" name="nom" id="nom" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label for="prenom" class="col-xs-4 control-label">Prenom</label>
											<div class="col-xs-8">
												<input type="text" name="prenom" id="prenom" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<div class="row pointille">
												<div class="col-xs-7 input-file-container">
													<label for="photo" class="input-file-trigger">Parcourir...</label>
													<input type="file" name="photo" id="photo" class="btn btn-lg btn-primary btn-block" accept="image/*">
												</div>
												<div class="col-xs-5">
													<img src="img/avatar.png" alt="avatar" id="apercuPhoto" class="img-responsive">
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="priorite" class="col-xs-4 control-label">Priorité</label>
											<div class="col-xs-8">
												<input type="number" name="priorite" min="0" max="10" id="priorite" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label for="datenaissance" class="col-xs-4 control-label">Date de naissance</label>
											<div class="col-xs-8">
												<input type="date" name="datenaissance" id="datenaissance" class="form-control">
											</div>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group marge-bas">
											<label for="nationalite" class="col-xs-4 control-label">Nationalité</label>
											<div class="col-xs-8">
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
											<label for="typeVIP" class="col-xs-4 control-label">Type VIP</label>
											<div class="col-xs-8">
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
									<div class="col-xs-offset-1 col-xs-4">
										<button type="submit" class="btn btn-lg btn-primary btn-block">Modifier VIP</button>
									</div>
									<div class="col-xs-offset-1 col-xs-4">
										<a href="index.php?page=accueil" class="btn btn-lg btn-primary btn-block">Retour</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script>
			$(function()
			{	
				function setInput(donneesVIP)
				{
					while(donneesVIP.length != 0)
					{
						// On récupère la position du caractère ':'
						var pos = donneesVIP.indexOf(':');
						if(pos < 0) break;
						// On récupère l'identifiant du champ
						var id = donneesVIP.substring(0, pos);
						// On supprime ce qu'on a récupérer dans la chaine 'donneesVIP'
						donneesVIP = donneesVIP.substring(pos + 1, donneesVIP.length);
						// On récupère la position du caractère ';'
						pos = donneesVIP.indexOf(';');
						if(pos < 0) break;
						// On récupère la valeur du champ qui possède l'identifiant obtenu
						var value = donneesVIP.substring(0, pos);
						// On supprime ce qu'on a récupérer dans la chaine 'donneesVIP'
						donneesVIP = donneesVIP.substring(pos + 1, donneesVIP.length);
						
						// Si c'est le champ photo
						if(id === "photo")
						{
							// On change l'image source
							$('img').attr('src', value);
						}
						else
						{
							// Sinon On donne la valeur trouvée au champ correspondant
							$('#' + id).val(value);
						}
					}
					
					
					/*for(i = 0; i < document.images.length; i++){
						if(!document.images[i].complete){
						  document.images[i].src = "img/avatar.png";
						}
					}*/
				}
			
				// Dès que la page est chargée
				$(document).ready(function(e) {
					var donneesVIP = $('div.active').text();
					
					setInput(donneesVIP);
				});
			
				// Lors d'un clic sur un élément de la liste de VIPs
				$('li a').click(function(e) {
					var donneesVIP = $($(this).attr('href')).text();
					
					setInput(donneesVIP);
				});
				
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
