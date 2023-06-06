<?php ob_start() ?>

<p>Nombre de conducteurs : <?= count($drivers) ?></p> 

<table class="table table-hover text-center">

  <thead class="table-primary">
    <tr>
      <th>id_conducteur</th>
      <th>Prénom</th>
      <th>Nom</th>
      <th>Modification</th>
      <th>Suppression</th>
    </tr>
  </thead> 
  
  <tbody>
    <?php foreach ($drivers as $driver) : ?>
      <tr>
        <td><div class="btn"><?= $driver->getId() ?></div></td>
        <td><div class="btn"><?= $driver->getPrenom() ?></div></td>
        <td><div class="btn"><?= $driver->getNom() ?></div></td>

        <td><a class="btn" href="<?= URL ?>drivers/edit/<?= $driver->getId() ?>"><i class="fas fa-edit"></i></a></td>

        <td>
          <form action="<?= URL ?>drivers/delete<?= $driver->getId() ?>" method="POST" onSubmit="return confirm('Êtes-vous certains ?')">
            <button class="btn" type="submit"><i class="fas fa-trash"></i></button>
          </form>
        </td>

      </tr>
    <?php endforeach; ?>
  </tbody>

</table>
<form method="POST" action="<?= URL ?>drivers/dvalid" class="mt-5">
    <div class="form-group">
        <label for="title">Nom</label>
        <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" required>
    </div>
    <div class="form-group">
        <label for="nbPlayers" >Prénom</label>
        <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom" required>
    </div>
    <button type="submit" class="btn btn-warning my-3">Ajouter un conducteur</button>
</form>
<?php

$title = "Liste de nos conducteurs";
$content = ob_get_clean();
require_once "base.html.php";

?>