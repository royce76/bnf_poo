<?php
include 'view/template/nav.php';
include 'view/template/header.php';
?>

<section class="container">
  <div class="row">
    <div class="col-10 mx-auto my-4">
      <div>
        <h3>Fiche personnel</h3>
      </div>
      <div class="card" style="width: 18rem;">
        <div class="card-header">
          n°Abonné : <?=$user_get_id->getidentificationUser()?>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Nom : <?=$user_get_id->getLastname()?></li>
          <li class="list-group-item">Prénom : <?=$user_get_id->getFirstname()?></li>
          <li class="list-group-item">Email : <?=$user_get_id->getEmail()?></li>
          <li class="list-group-item">Ville : <?=$user_get_id->getCity()?></li>
          <li class="list-group-item">Code Postale : <?=$user_get_id->getCityCode()?></li>
          <li class="list-group-item">Adresse : <?=$user_get_id->getAdress()?></li>
          <li class="list-group-item">Genre : <?=$user_get_id->getSex()?></li>
          <li class="list-group-item">Date de naissance : <?=$user_get_id->getBirthDate()?></li>
        </ul>
      </div>
    </div>
    <?php if ($book->getUserId() === $user_get_id->getId()): ?>
      <div class="col-10 mx-auto my-4">
        <div>
          <h3>Livre emprunté</h3>
        </div>
        <div class="card" style="width: 18rem;">
          <div class="card-header">
            n°identité : <?=$book->getIdentificationBook()?>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Titre : <?=$book->getTitle()?></li>
            <li class="list-group-item">Auteur : <?=$book->getAuthor()?></li>
          </ul>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>


<?php
include 'view/template/footer.php';
 ?>
