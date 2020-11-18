<?php
require 'models/Noticia.php';

class NoticiaDaoMysql implements NoticiaDao {
  private $pdo;

  public function __construct(PDO $driver) {
    $this->pdo = $driver;
  }

  public function add(Noticia $n) {

    $sql = $this->pdo->prepare("INSERT INTO noticias (title, body) VALUES (:title, :body)");
    $sql->bindValue(':title', $n->getTitle());
    $sql->bindValue(':body', $n->getBody());
    $sql->execute();

    $n->setId( $this->pdo->lastInsertId() );

    return $n;

  }
  public function findAll() {
    $array = [];

    $sql = $this->pdo->query("SELECT * FROM noticias");
    if($sql->rowCount() > 0) {
      $data = $sql->fetchAll(PDO::FETCH_ASSOC);

      foreach($data as $item) {
        $noti = new Noticia;
        $noti->setId($item['id']);
        $noti->setTitle($item['title']);
        $noti->setBody($item['body']);

        $array[] = $noti;
      }
    }
    return $array;
    
  }
  public function findByNoticia($title) {
    $array = [];

    $sql = $this->pdo->prepare("SELECT * FROM noticias WHERE title LIKE ?");
    $sql->bindValue(1, "%$title%");
    $sql->execute();

    if($sql->rowCount() > 0) {
      $data = $sql->fetchAll();

      foreach($data as $item) {
        $noti = new Noticia;
        $noti->setId($item['id']);
        $noti->setTitle($item['title']);
        $noti->setBody($item['body']);

        $array[] = $noti;
      }
    }
    return $array;
  }
  public function findById($id) {}
  public function update(Noticia $n) {}
  public function delete($id) {}
}