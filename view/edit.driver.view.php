<?php ob_start() ?>

<form method="POST" action="<?= URL ?>drivers/editvalid">
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" name="nom" id="nom" value="<?= $driver->getNom() ?>">
    </div>
    <div class="form-group">
        <label for="prenom" >Prénom</label>
        <input type="text" class="form-control" name="prenom" id="prenom" value="<?= $driver->getPrenom() ?>">
    </div>
    <input type="hidden" name="id_conducteur" value="<?= $driver->getId() ?>">
    <button type="submit" class="btn btn-warning my-3">Modifier</button>
</form>

<?php

$title = "Modifier : " . $driver->getPrenom() . " " . $driver->getNom();
$content = ob_get_clean();
require_once "base.html.php";

?>