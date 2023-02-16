<?php
require_once('./models/Articles.php');

class CtrlArticles
{
  public function accueil()
  {
    include_once('./models/Articles.php');
    $articles = new Articles();
    $all_articles = $articles->all_articles();
    unset($articles);
    include_once('./views/viewAccueil.php');
  }

  public function ajout()
  {
    if (!empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['contenu']) && !empty($_POST['date_creation'])) {
      $titre = htmlspecialchars($_POST['titre']);
      $auteur = htmlspecialchars($_POST['auteur']);
      $contenu = htmlspecialchars($_POST['contenu']);
      $date_creation = htmlspecialchars($_POST['date_creation']);

      include_once('./models/Articles.php');
      $articles = new Articles();
      $ajout = $articles->create_article($titre, $contenu, $auteur, $date_creation);
      unset($articles);

      if ($ajout) {
        $message = "Vous venez d'ajouter un article";
        header("Refresh: 3; url=./index.php?action=accueil");
      } else {
        $message = "erreur lors de l'ajout";
      }
    }
    include_once('./views/viewAjout.php');
  }

  public function modification()
  {
    $_SESSION['id'] = htmlspecialchars($_GET['id']);

    include_once('./models/Articles.php');
    $articles = new Articles();
    $article_by_id = $articles->article_by_id($_SESSION['id']);
    unset($articles);


    if (!empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['contenu']) && !empty($_POST['date_creation'])) {
      $titre = htmlspecialchars($_POST['titre']);
      $auteur = htmlspecialchars($_POST['auteur']);
      $contenu = htmlspecialchars($_POST['contenu']);
      $date_creation = htmlspecialchars($_POST['date_creation']);

      include_once('./models/Articles.php');
      $articles = new Articles();
      $update = $articles->update_article($_SESSION['id'], $titre, $contenu, $auteur, $date_creation);
      unset($articles);

      if ($update) {
        $message = "Vous venez de modifier un article";
        header("Refresh: 3; url=./index.php?action=accueil");
      } else {
        $message = "erreur lors de la modification";
      }
    }
    include_once('./views/viewModif.php');
  }

  public function suppression()
  {
    $_SESSION['id'] = htmlspecialchars($_GET['id']);

    include_once('./models/Articles.php');
    $articles = new Articles();
    $delete = $articles->delete_article($_SESSION['id']);

    if ($delete) {
      $message = "Vous venez de supprimer un article";
      header("Refresh: 3; url=./index.php?action=accueil");
    } else {
      $message = "erreur lors de la suppression";
    }

    $all_articles = $articles->all_articles();
    unset($articles);

    include_once('./views/viewAccueil.php');
  }
}
