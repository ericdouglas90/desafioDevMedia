<?php
class Noticia {
  private $id;
  private $title;
  private $body;

  public function getId() {
    return $this->id;
  }
  public function setId($id) {
    $this->id = trim($id);
  }

  public function getTitle() {
    return $this->title;
  }
  public function setTitle($tile) {
    $this->title = ucwords(trim($tile));
  }

  public function getBody() {
    return $this->body;
  }
  public function setBody($body) {
    $this->body = ucfirst(trim($body));
  }

}

interface NoticiaDao {
  public function add(Noticia $n);
  public function findAll();
  public function findByNoticia($title);
  public function findById($id);
  public function update(Noticia $n);
  public function delete($id);
}