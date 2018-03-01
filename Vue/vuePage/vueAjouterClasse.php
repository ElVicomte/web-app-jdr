<div class="row container-fluid">
	<span class="col-lg-5">
		<h5>Importer via CSV</h5>
		<?= $donnees['formulaireCSV']; ?>
		<h4>Ajouter une classe</h4>
		<?= $donnees['formulaireGeneral']; ?>
	</span>
	<span class="col-lg-5">
		<h3>Liste des classes existantes :</h3>
		<ul class="list-group">
		<?php
		foreach ($donnees["classes"] as $c) { ?>
			<!-- <?php
				var_dump($c['idString']);
				var_dump($c['classeNom']);
				var_dump($c['classeDescription']);
				var_dump($c['sortNom']);
				var_dump($c['raceNom']);
			?> -->
			<div class="list-group-item">
				<div class="container" data-toggle="collapse" data-target="#<?= $c['idString']; ?>">
					<h5><?= $c['classeNom']; ?></h5>
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