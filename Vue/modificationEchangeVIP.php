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
				<div class="col-xs-8">
					<div class="row">
						<div class="col-xs-12">
							<div class="block-vip">
								<div class="row">
									<div class="col-xs-12">
										<h1 class="center-block">VIP</h1>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-offset-1 col-xs-3">
										<img src="img/avatar.png" alt="avatar" class="img-responsive">
									</div>
									<div class="col-xs-8">
										<dl class="dl-horizontal">
											<dt>Nom : </dt><dd id="nom"></dd>
											<dt>Prénom : </dt><dd id="prenom"></dd>
											<dt>Nationalité : </dt><dd id="nationalite"></dd>
										</dl>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<div class="row">
								<div class="col-xs-4">
									<button type="button" data-toggle="modal"
														  data-target="#modalAction"
														  data-action="ajouter"
														  data-echange="<?php echo $echangesVIPs[0]["numEchange"]; ?>"
														  class="btn btn-success btn-block">Ajouter action</button>
									<button type="button" data-toggle="modal"
														  data-target="#modalAction"
														  data-action="modifier"
														  data-echange="<?php echo $echangesVIPs[0]["numEchange"]; ?>"
														  class="btn btn-primary btn-block">Modifier action</button>
									<button type="button" data-toggle="modal"
														  data-target="#modalAction"
														  data-action="supprimer"
														  data-echange="<?php echo $echangesVIPs[0]["numEchange"]; ?>"
														  class="btn btn-danger btn-block">Supprimer action</button>
									<div class="block-vip">
										<ul class="nav nav-pills nav-stacked action">
											<?php foreach($actions as $key => $actionsEchange) {
												foreach($actionsEchange as $key2 => $action) { ?>
											
											<li<?php if($key2 == 0) echo ' class="active"'; ?>>
												<a href="#action<?php echo $action['numAction']; ?>" data-toggle="tab"
																									 data-date="<?php echo $action["dateRealisation"]; ?>"
																									 data-etat="<?php echo $action["etat"]; ?>"
																									 class="actions">
													<?php echo $action["libelle"]; ?>
												</a>
											</li>
											
												<?php } } ?>										
										</ul>
									</div>
								</div>
								<div class="col-xs-8">
									<form method="post" action="index.php?page=modificationEchangeVIP">
										<input type="hidden" name="numVIP" value="<?php echo $_POST["numVIP"]; ?>">
										<div class="form-group">
											<label for="dateEchange" class="label-form">Date : </label>
											<input type="date" name="dateEchange" id="dateEchange" class="form-control">
										</div>
										<div class="form-group">
											<label for="commentaire" class="label-form">Commentaire : </label>
											<textarea name="commentaire" id="commentaire" class="form-control"></textarea>
										</div>
										<div class="row">
											<div class="col-xs-6">
												<a href="index.php?page=accueil" class="btn btn-primary btn-block">Annuler</a>
											</div>
											<div class="col-xs-6">
												<button type="submit" class="btn btn-success btn-block">Modifier échange VIP</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-4">
					<div class="block-vip">
						<ul class="nav nav-pills nav-stacked echange">	
							<?php foreach($echangesVIPs as $key => $echangeVIP) { ?>

							<li<?php if($key == 0) echo ' class="active"'; ?>>
								<a href="#echange<?php echo $echangeVIP["numEchange"]; ?>" data-toggle="tab"
																						   data-numvip="<?php echo $echangeVIP["numVIP"]; ?>"
																						   class="echanges">
									<?php echo $echangeVIP["contenuEchange"]; ?>
								</a>
							</li>
							
							<?php } ?>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Fenêtre modale -->
		<div class="modal fade" id="modalAction">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
						<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						<form id="actionForm">
							<div class="form-group">
								<label for="libelle" class="control-label">Libellé : </label>
								<input type="text" class="form-control" id="libelle">
							</div>
							<div class="form-group">
								<label for="etat" class="control-label">Etat : </label>
								<input type="text" class="form-control" id="etat">
							</div>
							<div class="form-group">
								<label for="dateRealisation" class="control-label">Date de réalisation : </label>
								<input type="date" class="form-control" id="dateRealisation">
							</div>
							<input type="hidden" class="form-control" id="numEchange">
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" form="actionForm" class="btn btn-primary">Valider</button>
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
				// Lors de l'affichage de la fenêtre modale on modifie son contenu pour l'adapter à l'action et à l'échange
				$('#modalAction').on('show.bs.modal', function (event)
				{
					// Récupération des attributs data
					var button = $(event.relatedTarget);
					var action = button.data('action');
					var echange = button.data('echange');
					var boutonAction = $('li[class=active] a[class=actions]');
					var dateRea = boutonAction.data('date');
					var etat = boutonAction.data('etat');
					var libelle = boutonAction.text();
					var ref = boutonAction.attr('href');
					var numAction = ref.substr(ref.length, 1);
					
					console.log(dateRea);
					console.log(etat);
					console.log(libelle);
					
					$('#libelle').val(libelle.trim());
					$('#etat').val(etat);
					$('#dateRealisation').val(dateRea);
					
					// On envoie le type d'action au formulaire (ajout, modification, suppression)
					$('#actionForm').data('action', action);
					
					action = action.charAt(0).toUpperCase() + action.substr(1, action.length);
					
					var modal = $(this);
					modal.find('.modal-title').text(action + ' une action');
					modal.find('#numEchange').val(echange);
				});
				
				// Lorsque le formulaire de la fenêtre modale est envoyé
				$('#actionForm').submit(function(e)
				{
					e.preventDefault();
					
					var page = $(this).data('action');
					console.log(page);
					
					var values = [];
					
					$('#actionForm input').each(function()
					{
						values.push($(this).val());
					});
					
					var now = new Date();
					values[2] = values[2] + ' ' + now.getHours() + ':' + now.getMinutes() + ':' + now.getSeconds();
					
					$.post('index.php?page=' + page + 'Action',
					{
						libelle: values[0],
						etat: values[1],
						dateRealisation: values[2],
						numEchange: values[3]
					},
					function(data, status)
					{
						$('#modalAction').modal('hide');
					});
				});
				
				$(document).ready(function(e)
				{
					var numVIP = $('.echange li[class~=active] a').data('numvip');
					
					getVIP(numVIP);
				});
				
				$('a[class~=echanges]').click(function(e)
				{
					var numVIP = $(this).data('numvip');
					var numEchange = $(this).attr('href');
					numEchange = numEchange.substr(numEchange.length - 1, 1);

					$('button[data-toggle=modal]').data('echange', numEchange);
					
					getVIP(numVIP);
				});
				
				function getVIP(numVIP)
				{
					$.post("Modele/getVIP.php",
					{
						numVIP: numVIP
					},
					function(data, status)
					{
						var vip = JSON.parse(data);
						
						$('#nom').text(vip.nom);
						$('#prenom').text(vip.prenom);
						$('#nationalite').text(vip.nationalite);
					});
				}
			});
		</script>
	</body>
</html>