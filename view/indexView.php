<?php
include 'view/template/nav.php';
include 'view/template/header.php';
?>

<p>Vos livre au catalogue s'affichent sur cette page</p>
<section class="container">
  <div class="row">
    <h3 class="col-10 mx-auto my-4">catalogue de livres</h3>
    <table class="table col-10 mx-auto my-4">
      <thead>
        <tr>
          <th scope="col">Identité</th>
          <th scope="col">isbn</th>
          <th scope="col">Titre</th>
          <th scope="col">Auteur</th>
          <th scope="col">Editeur</th>
          <th scope="col">Type</th>
          <th scope="col">Statut</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($list_book as $key => $book): ?>
          <tr>
            <th scope="row"><?=$book->getIdentificationBook()?></th>
            <td><?=$book->getIsbn()?></td>
            <td><?=$book->getTitle()?></td>
            <td><?=$book->getAuthor()?></td>
            <td><?=$book->getPublisher()?></td>
            <td><?=$book->getBookType()?></td>
            <?php if ($book->getUserId() !== NULL): ?>
              <td><span class="badge badge-pill badge-primary">En prêt</span></td>
              <?php else: ?>
              <td><span class="badge badge-pill badge-success">Libre</span></td>
            <?php endif; ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>


<?php
include 'view/template/footer.php';
 ?>
