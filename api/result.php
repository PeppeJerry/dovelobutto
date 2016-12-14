<?php 

  $db = require_once "../db.php";
  $requested = strtolower($_GET['object']);
  $sql = "SELECT products.product_name, bins.bin_id, bins.bin_name FROM products LEFT JOIN bins ON products.bin_id=bins.bin_id WHERE products.product_name='$requested'";
  $sth = $db->query($sql);
  $rows = $sth->fetch(PDO::FETCH_OBJ);
  if($rows)
  {
    $result = array(
        "found" => 1,
        "bin" => $rows->bin_id,
        "binName" => $rows->bin_name
      );
    }
  else
  {
    $result = array(
        "found" => 0,
        "product_searched" =>  $requested
      );
  }
  echo json_encode($result);
