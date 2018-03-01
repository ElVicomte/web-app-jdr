<div class="row container-fluid">
	<span class="col-lg-5">
		<h4>Importer un CSV</h4>
		<?= $donnees['formulaireCSV']; ?>
		<h4>Ajouter une race</h4>
		<?= $donnees['formulaireGeneral']; ?>
	</span>
	<span class="col-lg-5">
		<h3>Liste des races existantes :</h3>
		<ul class="list-group">
		<?php
		foreach ($donnees["races"] as $r) { ?>
			<!-- <?php
				var_dump($r['idString']);
				var_dump($r['raceNom']);
				var_dump($r['raceDescription']);
				var_dump($r['sortNom']);
				var_dump($r['raceNom']);
			?> -->
			<div class="list-group-item">
				<div class="container" data-toggle="collapse" data-target="#<?= $r['idString']; ?>">
					<h5 class="titre-liste-classe"><?= $r['raceNom']; ?></h5><i class="fas fa-chevron-circle-right dropdown-list-class" data-toggle="collapse" data-target="#<?= $c['idString']; ?>"></i>
				</div>
				<div class="collapse informations" id="<?= $r['idString']; ?>">
					<div class="info-description">
						<?= $r['raceDescription']; ?>
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