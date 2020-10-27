<?php
include 'view/template/nav.php';
include 'view/template/header.php';
?>

<section class="container">
  <div class="row">
    <h3 class="col-10 mx-auto my-4 text-center">Détails du livre</h3>
    <div class="card col-5 mx-auto my-4" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title"><?=$book->getTitle()?></h5>
        <p class="card-text"><?=$book->getSummary()?></p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Auteur : <?=$book->getAuthor()?></li>
        <li class="list-group-item">Editeur : <?=$book->getPublisher()?></li>
        <li class="list-group-item">Sortie : <?=$book->getPublicationYear()?></li>
        <li class="list-group-item">Pages : <?=$book->getPagesNumber()?></li>
        <li class="list-group-item">Quantité : <?=$book->getQuantity()?></li>
        <li class="list-group-item">Type : <?=$book->getBookType()?></li>
        <li class="list-group-item">Genre : <?=$book->getBookNature()?></li>
        <li class="list-group-item">Identité : <?=$book->getIdentificationBook()?></li>
      </ul>
      <div class="card-body">
        <form class="form-group" action="" method="POST">
          <input type="submit" class="btn btn-primary" name="delete" value="Supprimer">
        </form>
        <a href="index.php" class="btn btn-primary">Retour</a>
      </div>
    </div>
  </div>
</section>

<?php
include 'view/template/footer.php';
 ?>
