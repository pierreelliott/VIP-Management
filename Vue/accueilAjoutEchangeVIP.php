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
					<div class="row">
						<form method="post" action="index.php?page=ajoutEchangeVIP">
							<input type="hidden" name="numVIP" id="numVIP">
							<div class="col-xs-6">
								<button type="submit" class="btn btn-success btn-block">Ajout échange VIP</a>
							</div>
							<div class="col-xs-6">
								<a href="index.php?page=accueil" class="btn btn-primary btn-block">Annuler</a>
							</div>
						</form>
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
				$('button').click(function(e) {
					e.preventDefault();
					var ref = $('li[class=active] a').attr('href');
					ref = ref.substr(1, ref.length);
					$('#numVIP').val(ref);
					$('form').submit();
				});
			});
		</script>
	</body>
</html>