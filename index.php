<?php

session_start();

if (!empty($_GET['action'])) {
  $action = $_GET['action'];
} else {
  $action = 'accueil';
}

switch ($action) {
  case 'accueil': {
      require_once('controllers/CtrlArticles.php');
      $article = new CtrlArticles();
      $article->accueil();
      break;
    }
  case 'ajout': {
      require_once('controllers/CtrlArticles.php');
      $article = new CtrlArticles();
      $article->ajout();
      break;
    }
  case 'modification': {
      if (!empty($_GET['id'])) {
        require_once('controllers/CtrlArticles.php');
        $article = new CtrlArticles();
        $article->modification();
        break;
      } else {
        require_once('controllers/CtrlArticles.php');
        $article = new CtrlArticles();
        $article->accueil();
        break;
      }
    }
  case 'suppression': {
      if (!empty($_GET['id'])) {
        require_once('controllers/CtrlArticles.php');
        $article = new CtrlArticles();
        $article->suppression();
        break;
      } else {
        require_once('controllers/CtrlArticles.php');
        $article = new CtrlArticles();
        $article->accueil();
        break;
      }
    }
  default: {
      require_once('controllers/CtrlArticles.php');
      $article = new CtrlArticles();
      $article->accueil();
    }
}
