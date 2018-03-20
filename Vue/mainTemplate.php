<!DOCTYPE html>
<html lang="en">
<head>
	<title><?= $titre; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="contenu/image/minia.ico" />


			<!-- CSS -->
	<!-- <link rel="stylesheet" href="contenu/lib/bootstrap/css/bootstrap.css"> -->
	<link rel="stylesheet" href="contenu/css/main-template.css">

			<!-- LIBRAIRIES -->
	<!-- <script src="contenu/lib/jquery/jquery.min.js"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script> -->
	<!-- <script src="contenu/lib/bootstrap/js/bootstrap.min.js"></script> -->
	<!-- <script src="contenu/lib/fontawesome/svg-with-js/js/fontawesome-all.js"></script> -->


		<!-- CDN -->
	<!-- Latest compiled and minified CSS -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>



</head>
<body class="container-fluid">
	<div id="menu">
		<?php require('Vue/vuePage/vueMenu.php'); ?>
	</div>
	<div class="content container-fluid">
		<?= $contenu; ?>
	</div>
</body>
</html>
<!-- <script type="text/javascript" src="contenu/js/animation.js"></script> -->