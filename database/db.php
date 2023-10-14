<?php
require_once './database/config.php';
//este no iria mas por las dudas no lo borro
function setupDB()
{
  $db = new PDO(DB_URL, DB_USER, DB_PASS);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $db->exec("CREATE DATABASE IF NOT EXISTS `web2tpe`;");
  $db->exec("USE `web2tpe`;");

  try {
    $query = $db->prepare('SELECT * FROM usuarios');
    $query->execute();
  } catch (Exception $e) {
    $create_script = file_get_contents("./database/web2tpe.sql");
    $db->exec($create_script);
  }
  return $db;
}
