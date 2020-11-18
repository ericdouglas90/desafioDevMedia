<?php
$base = 'http://localhost/cursoB7Web/exercCRUD/';

$dbName = 'crud';
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';

$pdo = new PDO("mysql:dbname=".$dbName.";host=".$dbHost, $dbUser, $dbPass);