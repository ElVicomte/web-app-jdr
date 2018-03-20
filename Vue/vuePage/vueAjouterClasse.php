<div class="row container-fluid">
	<span class="col-lg-5">
		<h4>Importer un CSV</h4>
		<?= $donnees['formulaireCSV']; ?>
		<h4>Ajouter une classe</h4>
		<?= $donnees['formulaireGeneral']; ?>
	</span>
	<span class="col-lg-5">
		<h3>Liste des classes existantes :</h3>
		<ul class="list-group">
		<?php
		foreach ($donnees["classes"] as $c) { ?>
			<div class="list-group-item">
				<div class="container" >
					<h5 class="titre-liste-classe"><?= $c['classeNom']; ?></h5><i class="fas fa-chevron-circle-right dropdown-list-class" data-toggle="collapse" data-target="#<?= $c['idString']; ?>"></i>
				</div>
				<div class="collapse informations" id="<?= $c['idString']; ?>">
					<div class="info-description">
						<?= $c['classeDescription']; ?>
					</div>
					<div class="info-race">

					</div>
					<div class="info-sorts">

					</div>
				</div>
			</div>
		<?php } ?>
		</ul>
	</span>
	<div class="col-md-2">
		<?= $donnees['evenement']; ?>
	</div>
</div>