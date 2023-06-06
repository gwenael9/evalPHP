<?php ob_start() ?>

<!-- <p>Nombre d'associations : <?= count($assos) ?></p>  -->

<table class="table table-hover text-center">

  <thead class="table-primary">
    <tr>
      <th>id_association</th>
      <th>conducteur</th>
      <th>vehicule</th>
      <th>Modification</th>
      <th>Suppression</th>
    </tr>
  </thead>
  
  <tbody>
    <?php foreach ($assos as $asso) : ?>
      <tr>
        <td><div class="btn"><?= $asso->getId() ?></div></td>
        <td><div class="btn"><?= $asso->getId_conducteur() ?></div></td>
        <td><div class="btn"><?= $asso->getId_vehicule() ?></div></td>


        <td><a class="btn" href="<?= URL ?>assos/edit/<?= $asso->getId() ?>"><i class="fas fa-edit"></i></a></td>

        <td>
          <form action="#" method="POST" onSubmit="return confirm('Êtes-vous certains ?')">
            <button class="btn" type="submit"><i class="fas fa-trash"></i></button>
          </form>
        </td>

      </tr>
    <?php endforeach; ?>
  </tbody>

</table>

<form method="POST" action="<?= URL ?>assos/avalid" class="mt-5">
    <div class="form-group">
        <label for="title">Conducteur</label>
        <input type="text" class="form-control" name="conducteur" id="conducteur" required>
    </div>
    <div class="form-group">
        <label for="nbPlayers" >Véhicule</label>
        <input type="text" class="form-control" name="vehicule" id="vehicule" required>
    </div>
    <button type="submit" class="btn btn-warning my-3">Ajouter cette association</button>
</form>

<?php

$title = "Association";
$content = ob_get_clean();
require_once "base.html.php";

?>