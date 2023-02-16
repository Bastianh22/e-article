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
      <h1>Modifier un article</h1>
      <form action="" method="post">
        <div class="form-control">
          <input type="text" name="titre" value="<?= $article_by_id->titre ?>" required>
          <label>Titre</label>
        </div>
        <div class="form-control">
          <input type="text" name="auteur" value="<?= $article_by_id->auteur ?>" required>
          <label>Auteur</label>
        </div>
        <div class="form-control">
          <textarea name="contenu"><?= $article_by_id->contenu ?></textarea>
          <label>Contenu</label>
        </div>
        <div class="form-control">
          <input type="date" name="date_creation" value="<?= $article_by_id->date_creation ?>" required>
        </div>
        <button class="btn">Modifier</button>
      </form>
    </div>
  </div>
</main>
<script src="./views/js/script.js" defer></script>

<?php


include_once('./views/footer.php');
?>