<?php 

  $db = require_once "../db.php";

  $requested = $_POST['object'];

  $sql = "SELECT product_name FROM products WHERE product_name LIKE '%".$requested."%'";
  $sth = $db->query($sql);
  $rows = $sth->fetchAll(PDO::FETCH_OBJ);
  echo json_encode($rows);
