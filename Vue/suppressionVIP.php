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
				<div class="col-xs-offset-4 col-xs-4">
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
					<div class="row">
						<div class="col-xs-6">
							<!-- Bouton d'activation de la fenêtre modale -->
							<button href="#modalevip" id="modalevip" class="btn btn-danger btn-block">Supprimer</button>
							<!-- Fenêtre modale -->
							<div class="modal fade" id="modalevip">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Voulez-vous suppimer ce VIP ?</h4>
										</div>
										<div class="modal-body">
											<form method="post" action="index.php?page=suppressionVIP" class="form-horizontal">
												<div class="row">
													<div class="col-xs-6">
														<input type="hidden" name="numVIP" id="numVIP">
														<div class="form-group">
															<label for="nom" class="col-xs-4 control-label">Nom</label>
															<div class="col-xs-8">
																<input type="text" name="nom" id="nom" class="form-control" disabled>
															</div>
														</div>
														<div class="form-group">
															<label for="prenom" class="col-xs-4 control-label">Prenom</label>
															<div class="col-xs-8">
																<input type="text" name="prenom" id="prenom" class="form-control" disabled>
															</div>
														</div>
														<div class="form-group">
															<div class="col-xs-offset-6 col-xs-4">
																<img src="img/avatar.png" alt="avatar" class="img-responsive">
															</div>
														</div>
														<div class="form-group">
															<label for="priorite" class="col-xs-4 control-label">Priorité</label>
															<div class="col-xs-8">
																<input type="number" name="priorite" min="0" max="10" id="priorite" class="form-control" disabled>
															</div>
														</div>
														<div class="form-group">
															<label for="datenaissance" class="col-xs-4 control-label">Date de naissance</label>
															<div class="col-xs-8">
																<input type="date" name="datenaissance" id="datenaissance" class="form-control" disabled>
															</div>
														</div>
													</div>
													<div class="col-xs-6">
														<div class="form-group marge-bas">
															<label for="nationalite" class="col-xs-4 control-label">Nationalité</label>
															<div class="col-xs-8">
																<input type="text" name="nationalite" id="nationalite" class="form-control" disabled>
															</div>
														</div>
														<div class="form-group marge-bas">
															<label for="typeVIP" class="col-xs-4 control-label">Type VIP</label>
															<div class="col-xs-8">
																<input type="text" name="typeVIP" id="typeVIP" class="form-control" disabled>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-xs-offset-2 col-xs-3">
														<button type="submit" class="btn btn-lg btn-danger btn-block">Supprimer VIP</button>
													</div>
													<div class="col-xs-offset-2 col-xs-3">
														<button data-dismiss="modal" class="btn btn-lg btn-primary btn-block">Retour</a>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<!-- Fin fenêtre modale -->
						</div>
						<div class="col-xs-6">
							<a href="index.php?page=accueil" class="btn btn-primary btn-block">Annuler</a>
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
				$('button#modalevip').click(function (e) {
					var ref = $('li[class=active] a').attr('href');
					var donneesVIP = $(ref).text();
					
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
					
					// On active la fenêtre modale
					$('.modal').modal('show');
				});
			});
		</script>
	</body>
</html>