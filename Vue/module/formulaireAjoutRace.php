<form method="post" class="form-horizontal">
  <div class="form-group">
    <label for="nom">Nom</label>
    <input type="text" name="race-nom" class="form-control" id="nom" placeholder="Nom de la race" required>
    <label for="description">Description</label>
    <textarea rows="6" name="race-description" class="form-control" id="description" placeholder="Description de la race"></textarea>
  </div>
  <div class="form-group">
    <h5>Associer à une classe</h5>
    <?php foreach($classes as $c): ?>
      <div>
        <input type="checkbox" name="classes[]" id="<?= $c['idString']; ?>" value="<?= $c['idString']; ?>">
        <label for="<?= $c['idString']; ?>"><?= $c['classeNom']; ?></label>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="form-group">
    <h5>Définir un racial</h5>
    <!-- <multiple name="racial" mapping="racial"> -->
      <h6>Type de racial</h6>
      <input type="radio" name="racial" id="type-actif" mapping="racial-actif" checked>
      <label for="type-actif">Actif</label>
      <input type="radio" name="racial" id="type-passif" mapping="racial-passif" value="passif">
      <label for="type-passif">Passif</label>
      <label for="racial-nom"></label>
      <input type="text" name="racial-nom" class="form-control" id="racial-nom" placeholder="Nom du racial" value="Cassage de dents" required>
      <label for="racial-description">Description</label>
      <textarea name="racial-description" class="form-control" id="racial-description" rows="3" placeholder="Description du racial"></textarea>
    <!-- </multiple> -->
  </div>
  <input type="submit" name="ajouter-race" class="btn btn-primary" value="Ajouter">
</form>