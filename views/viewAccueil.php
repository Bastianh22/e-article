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
  if (!empty($all_articles)) {
  ?>
    <div class="container">
      <div class="pin_container">
        <?php
        foreach ($all_articles as $article) {
        ?>
          <div class="card">
            <h2 class="title">
              <?= $article->titre ?>
            </h2>
            <div class="content">
              <?= $article->contenu ?>
            </div>
            <div class="card_footer">
              <div>
                <?= $article->date_creation ?>
              </div>
              <div class="icons">
                <a href="./index.php?action=modification&id=<?= $article->id ?>"><i class="fa-solid fa-arrow-up-right-from-square icon"></i></a>
                <a href="./index.php?action=suppression&id=<?= $article->id ?>"><i class="fa-solid fa-trash icon"></i></a>
              </div>
              <div>
                <?= $article->auteur ?>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  <?php
  } else {
  ?>
    <p class="message">
      Aucun article n'a été publié
    </p>
  <?php
  }
  ?>
</main>

<?php
include_once('./views/footer.php');
?>