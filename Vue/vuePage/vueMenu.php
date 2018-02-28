<nav>
	<a href="index.php" class="navbar-brand"><img src="contenu/image/neutron.png" alt="accueil" class="img-logo"></a>
	<i class="fas fa-bars fas-menu" onclick="animationMenu()"></i>
	<ul class="nav flex-column">
		<li class="nav-item">
			<a href="index.php" class="nav-link ">Accueil</a>
		</li>
		<li class="nav-item">
			<a href="index.php?page=fiche-personnage" class="nav-link ">Fiches</a>
		</li>
		<li class="nav-item">
			<a href="index.php" class="nav-link ">Editer</a>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Ajouter</a>
			<div class="dropdown-menu">
				<a href="index.php?page=ajouter-classe" class="dropdown-item">Classe</a>
				<a href="index.php" class="dropdown-item">Personnage</a>
				<a href="index.php?page=ajouter-race" class="dropdown-item">Race</a>
			</div>
		</li>
		<li class="nav-item dropdown"></li>
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="index.php">Modifier</a>
			<div class="dropdown-menu">
				<a href="index.php" class="dropdown-item">Classe</a>
				<a href="index.php" class="dropdown-item">Personnage</a>
				<a href="index.php" class="dropdown-item">Race</a>
			</div>
		</li>
	</ul>
</nav>