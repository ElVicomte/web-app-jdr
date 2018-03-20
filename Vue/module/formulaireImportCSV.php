<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<input type="file" name="import-csv" class="btn" id="input-csv">
    <div class="button-list">
      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal" title="Informations sur les fichiers CSV">
        Informations
      </button>
      <input type="submit" name="ajouter-csv" class="btn btn-primary" value="Charger le fichier">
    </div>
	</div>
</form>

<!-- Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Fichier CSV</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <a href="Fichiers-exemple/ajout-classe-exemple.csv" class="btn btn-primary" download>Télécharger un exemple de CSV</a>
        <a href="Fichiers-exemple/ajout-classe-exemple.xlsx" class="btn" download>Télécharger le fichier Excel original</a>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>

    </div>
  </div>
</div>