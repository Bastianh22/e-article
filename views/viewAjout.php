<?php
include_once('./views/header.php');

?>
<main>
  <?php
  if (!empty($message)) {
  ?>
    <p class="message">
      <?= $message ?>
    </p>
  <?php
  }
  ?>
  <div class="container_form">
    <div class="form">
      <h1>Ajouter un article</h1>
      <form action="" method="post">
        <div class="form-control">
          <input type="text" name="titre" required>
          <label>Titre</label>
        </div>
        <div class="form-control">
          <input type="text" name="auteur" required>
          <label>Auteur</label>
        </div>
        <div class="form-control">
          <textarea name="contenu"></textarea>
          <label>Contenu</label>
        </div>
        <div class="form-control">
          <input type="date" name="date_creation" required>
        </div>
        <button class="btn">Ajouter</button>
      </form>
    </div>
  </div>
</main>

<?php
include_once('./views/footer.php');
?>