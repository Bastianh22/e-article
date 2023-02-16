<?php
require_once('./models/db_connect.php');

class Articles extends db_connect
{
  public function all_articles()
  {
    $stmt = $this->cnx->query("SELECT `id`, `titre`, `contenu`, `auteur`, `date_creation` FROM `article`");
    
    // résultat retourné dans un tableau d'object
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    return $stmt->fetchAll();
  }

  public function article_by_id($id)
  {
    $stmt = $this->cnx->prepare("SELECT `id`, `titre`, `contenu`, `auteur`, `date_creation` FROM `article` WHERE `id` = :id");
    $stmt->bindParam(':id', $id);

    // résultat retourné dans un tableau d'object
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    return $stmt->fetch();
  }

  public function create_article($titre, $contenu, $auteur, $date_creation)
  {
    $stmt = $this->cnx->prepare("INSERT INTO `article` (`titre`, `contenu`, `auteur`, `date_creation`) VALUES(:titre, :contenu, :auteur, :date_creation)");
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':contenu', $contenu);
    $stmt->bindParam(':auteur', $auteur);
    $stmt->bindParam(':date_creation', $date_creation);

    return $stmt->execute();
  }

  public function update_article($id, $titre, $contenu, $auteur, $date_creation)
  {
    $stmt = $this->cnx->prepare("UPDATE `article` SET `titre` = :titre, `contenu` = :contenu, `auteur` = :auteur, `date_creation` = :date_creation WHERE `id` = :id ");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':titre', $titre);
    $stmt->bindParam(':contenu', $contenu);
    $stmt->bindParam(':auteur', $auteur);
    $stmt->bindParam(':date_creation', $date_creation);

    return $stmt->execute();
  }

  public function delete_article($id)
  {
    $stmt = $this->cnx->prepare("DELETE FROM `article` WHERE `id` = :id ");
    $stmt->bindParam(':id', $id);

    return $stmt->execute();
  }
}
