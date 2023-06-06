<?php ob_start() ?>

<form method="POST" action="<?= URL ?>vehicules/editvalid">
    <div class="form-group">
        <label for="marque">Marque</label>
        <input type="text" class="form-control" name="marque" id="marque" value="<?= $vehicule->getMarque() ?>">
    </div>
    <div class="form-group">
        <label for="modele" >Modèle</label>
        <input type="text" class="form-control" name="modele" id="modele" value="<?= $vehicule->getModele() ?>">
    </div>
    <div class="form-group">
        <label for="couleur" >Couleur</label>
        <input type="text" class="form-control" name="couleur" id="couleur" value="<?= $vehicule->getCouleur() ?>">
    </div>
    <div class="form-group">
        <label for="immatriculation" >immatriculation</label>
        <input type="text" class="form-control" name="immatriculation" id="immatriculation" value="<?= $vehicule->getImmatriculation() ?>">
    </div>
    <input type="hidden" name="id_vehicule" value="<?= $vehicule->getId() ?>">
    <button type="submit" class="btn btn-warning my-3">Modifier</button>
</form>

<?php

$title = "Modifier : " . $vehicule->getMarque() . " " . $vehicule->getModele();
$content = ob_get_clean();
require_once "base.html.php";

?>