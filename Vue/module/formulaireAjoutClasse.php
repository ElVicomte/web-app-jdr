<form method="post" class="form-horizontal">
	<div class="form-group">
		<label for="nom">Nom</label>
		<input type="text" name="classe-nom" class="form-control" id="nom" placeholder="Nom de la classe" required>
		<label for="description">Description</label>
		<textarea rows="6" name="classe-description" class="form-control" id="description" placeholder="Description de la classe"></textarea>
	</div>
	<div class="form-group">
		<h5>Associer à une race</h5>
		<?php foreach($races as $r): ?>
			<div>
				<input type="checkbox" name="races[]" id="<?= $r['idString']; ?>" value="<?= $r['idString']; ?>">
				<label for="<?= $r['idString']; ?>"><?= $r['raceNom']; ?></label>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="form-group">
		<h5>Sorts de la classe</h5>
		<multiple name="sort" mapping="sort">
			<label for="nom">Nom</label>
			<input type="text" name="sort-nom" class="form-control" id="sort-nom" placeholder="Nom du sort" value="sort" required>
			<label for="description">Description</label>
			<textarea name="sort-description" class="form-control" id="description-sort" rows="3" placeholder="Description du sort"></textarea>
		</multiple>
	</div>
	<input type="submit" name="ajouter-classe" class="btn btn-primary" value="Ajouter">
</form>