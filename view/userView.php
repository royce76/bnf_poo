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
          n°Abonné : <?=$user->getidentificationUser()?>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Nom : <?=$user->getLastname()?></li>
          <li class="list-group-item">Prénom : <?=$user->getFirstname()?></li>
          <li class="list-group-item">Email : <?=$user->getEmail()?></li>
          <li class="list-group-item">Ville : <?=$user->getCity()?></li>
          <li class="list-group-item">Code Postale : <?=$user->getCityCode()?></li>
          <li class="list-group-item">Adresse : <?=$user->getAdress()?></li>
          <li class="list-group-item">Genre : <?=$user->getSex()?></li>
          <li class="list-group-item">Date de naissance : <?=$user->getBirthDate()?></li>
        </ul>
      </div>
    </div>
    <?php if ($user->getBookLend() !== null): ?>
      <div class="col-10 mx-auto my-4">
        <div>
          <h3>Livre emprunté</h3>
        </div>
        <div class="card" style="width: 18rem;">
          <div class="card-header">
            n°identité : <?=$user->getBookLend()->getIdentificationBook()?>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Titre : <?=$user->getBookLend()->getTitle()?></li>
            <li class="list-group-item">Auteur : <?=$user->getBookLend()->getAuthor()?></li>
          </ul>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>


<?php
include 'view/template/footer.php';
 ?>
