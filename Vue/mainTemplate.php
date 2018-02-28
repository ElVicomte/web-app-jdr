<!DOCTYPE html>
<html lang="en">
<head>
	<title><?= $titre; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="contenu/image/minia.ico" />


			<!-- CSS -->
	<link rel="stylesheet" href="contenu/lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="contenu/lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="contenu/css/main-template.css">

			<!-- LIBRAIRIES -->
	<script src="contenu/lib/jquery/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script src="contenu/lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="contenu/lib/fontawesome/svg-with-js/js/fontawesome-all.js"></script>

</head>
<body class="container-fluid row">
	<div class="col-md-2" id="menu">
		<?php require('Vue/vuePage/vueMenu.php'); ?>
	</div>
	<div class="content container-fluid col-md-10">
		<?= $contenu; ?>
	</div>
</body>
</html>
<!-- <script type="text/javascript" src="contenu/js/animation.js"></script> -->