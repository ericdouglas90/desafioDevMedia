<?php
require 'config.php';
require 'dao/NoticiaDaoMysql.php';

$noticiaDao = new NoticiaDaoMysql($pdo);

$title = filter_input(INPUT_POST, 'title');
$body = filter_input(INPUT_POST, 'body');

if($title && $body) {

  $not = new Noticia;
  $not->setTitle($title);
  $not->setBody($body);
  
  $noticiaDao->add($not);
  
  header("Location: index.php");
  exit;
}
