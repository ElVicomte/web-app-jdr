<div class="row container-fluid">
	<span class="col-lg-5">
		<?= $donnees['formulaireCSV']; ?>
		<h4>Ajouter une classe</h4>
		<?= $donnees['formulaireGeneral']; ?>
	</span>
	<span class="col-lg-5">
		<h3>Liste des classes existantes :</h3>
		<ul class="list-group">
		<?php
		foreach ($donnees["classes"] as $d) { ?>
			<!-- <?php
				var_dump($d['idString']);
				var_dump($d['classeNom']);
				var_dump($d['classeDescription']);
				var_dump($d['sortNom']);
				var_dump($d['raceNom']);
			?> -->
			<div class="list-group-item"> 
				<div class="container" data-toggle="collapse" data-target="#<?= $d['idString']; ?>">
					<h5><?= $d['classeNom']; ?></h5>
				</div>
				<div class="collapse informations" id="<?= $d['idString']; ?>">
					<div class="info-description">
						<?= $d['classeDescription']; ?>
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