<?php
include 'view/template/nav.php';
include 'view/template/header.php';
?>


<section class="container">
  <div class="row">
    <div class="col-10 mx-auto my-4">
      <form action="" method="POST">
        <div class="form-group">
          <label for="identificationUser">Entrez l'identifiant :</label>
          <input type="number" class="form-control" id="identificationUser " placeholder="Identifiant abonné" name="identificationUser">
        </div>
        <button type="submit" class="btn btn-primary mb-2" name="informations">Informations</button>
      </form>
      <?php if ($user_identification !== []): ?>
        <?php if ($user_identification->getId() === $book_user->getUserId()): ?>
          <div class="col-10 mx-auto my-4">
            <ul>
              <li><?="{$user_identification->getLastname()} = {$user_identification->getidentificationUser()}"?></li>
              <li><?="Titre = {$book_user->getTitle()}"?></li>
              <li><?="identité du livre = {$book_user->getIdentificationBook()}"?></li>
            </ul>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
    <div class="col-10 mx-auto my-4 text-center">
      <h3>Vos abonnées</h3>
    </div>
    <div class="col-10 mx-auto my-4">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">email</th>
            <th scope="col">Ville</th>
            <th scope="col">Date de naissance</th>
            <th scope="col">Détails</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $key => $user): ?>
            <tr>
              <th scope="row"><?=$user->getidentificationUser()?></th>
              <td><?=$user->getLastname()?></td>
              <td><?=$user->getFirstname()?></td>
              <td><?=$user->getEmail()?></td>
              <td><?=$user->getCity()?></td>
              <td><?=$user->getBirthDate()?></td>
              <td><a class="btn btn-primary" href=<?="user.php?id={$user->getId()}"?>>Fiche personnel</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>


<?php
include 'view/template/footer.php';
 ?>
