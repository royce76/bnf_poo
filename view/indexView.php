<?php
include 'view/template/nav.php';
include 'view/template/header.php';
?>

<section class="container">
  <div class="row">
    <h3 class="col-10 mx-auto my-4 text-center">Catalogue de livres</h3>
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
          <th scope="col">Détails</th>
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
            <td><a href=<?="book.php?id={$book->getId()}"?> class="badge badge-pill badge-info">Voir</td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>
<section class="container">
  <div class="row">
    <h3 class="col-10 mx-auto my-4 text-center">Ajouter un livre</h3>
    <?php if ($error !== ""): ?>
      <div class="alert alert-danger col-10 mx-auto my-4 text-center" role="alert">
        <?=$error?>
      </div>
    <?php endif; ?>
    <form class="col-10 mx-auto my-4" action="" method="POST">
      <div class="form-group">
        <label for="isbn">ISBN :</label>
        <input type="number" class="form-control" id="isbn" name="isbn" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="title">Titre :</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      <div class="form-group">
        <label for="author">Auteur :</label>
        <input type="text" class="form-control" id="author" name="author">
      </div>
      <div class="form-group">
        <label for="publisher">Editeur :</label>
        <input type="text" class="form-control" id="publisher" name="publisher">
      </div>
      <div class="form-group">
        <label for="publicationYear">Année de publication :</label>
        <input type="year" class="form-control" id="publicationYear" name="publicationYear">
      </div>
      <div class="form-group">
        <label for="pagesNumber">Nombre de pages :</label>
        <input type="number" class="form-control" id="pagesNumber" name="pagesNumber">
      </div>
      <div class="form-group">
        <label for="summary">Résumé :</label>
        <textarea class="form-control" id="summary" name="summary" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="quantity">Quantité:</label>
        <input type="number" class="form-control" id="quantity" name="quantity">
      </div>
      <div class="form-group">
        <label for="bookType">Type :</label>
        <input type="text" class="form-control" id="bookType" name="bookType">
      </div>
      <div class="form-group">
        <label for="bookNature">Genre :</label>
        <input type="text" class="form-control" id="bookNature" name="bookNature">
      </div>
      <div class="form-group">
        <label for="identificationBook">Identité :</label>
        <input type="text" class="form-control" id="identificationBook" name="identificationBook">
      </div>
      <input type="submit" class="btn btn-primary" name="Ajouter" value="Ajouter">
    </form>
  </div>
</section>


<?php
include 'view/template/footer.php';
?>
