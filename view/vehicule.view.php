<?php ob_start() ?>

<p>Nombre de véhicules : <?= count($vehicules) ?></p> 

<table class="table table-hover text-center">

  <thead class="table-primary">
    <tr>
      <th>id_vehicule</th>
      <th>Marque</th>
      <th>Modèle</th>
      <th>Couleur</th>
      <th>Immatricule</th>
      <th>Modification</th>
      <th>Suppression</th>
    </tr>
  </thead>
  
  <tbody>
    <?php foreach ($vehicules as $vehicule) : ?>
      <tr>
        <td><div class="btn"><?= $vehicule->getId() ?></div></td>
        <td><div class="btn"><?= $vehicule->getMarque() ?></div></td>
        <td><div class="btn"><?= $vehicule->getModele() ?></div></td>
        <td><div class="btn"><?= $vehicule->getCouleur() ?></div></td>
        <td><div class="btn"><?= $vehicule->getImmatriculation() ?></div></td>

        <td><a class="btn" href="<?= URL ?>vehicules/edit/<?= $vehicule->getId() ?>"><i class="fas fa-edit"></i></a></td>

        <td>
          <form action="#" method="POST" onSubmit="return confirm('Êtes-vous certains ?')">
            <button class="btn" type="submit"><i class="fas fa-trash"></i></button>
          </form>
        </td>

      </tr>
    <?php endforeach; ?>
  </tbody>

</table>

<form method="POST" action="<?= URL ?>vehicules/dvalid" class="mt-5">
    <div class="form-group">
        <label for="marque">Marque du véhicule</label>
        <input type="text" class="form-control" name="marque" id="marque" placeholder="Marque">
    </div>
    <div class="form-group">
        <label for="modele" >Modèle du véhicule</label>
        <input type="text" class="form-control" name="modele" id="modele">
    </div>
    <div class="form-group">
        <label for="couleur" >Couleur du véhicule</label>
        <input type="text" class="form-control" name="couleur" id="couleur">
    </div>
    <div class="form-group">
        <label for="immatriculation" >Immatricule du véhicule</label>
        <input type="text" class="form-control" name="immatriculation" id="immatriculation">
    </div>
    <button type="submit" class="btn btn-warning my-3">Ajouter</button>
</form>

<?php

$title = "Liste de nos véhicules";
$content = ob_get_clean();
require_once "base.html.php";

?>