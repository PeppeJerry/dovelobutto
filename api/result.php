<?php 
  require('../mock.php');

  $requested = strtolower($_GET['object']);
  if (isset($mock[$requested])) {
    $found = True;

    $translated = array(
      "plastic" => "plastica",
      "glass" => "vetro",
      "paper" => "carta"
    );
    $bin = $mock[$requested];
    $binName = $translated[$bin];

    echo json_encode(array(
      "found" => $found,
      "bin" => $bin,
      "binName" => $binName
    ));
  } else {
    $found = False;

    echo json_encode(array(
      "found" => $found,
    ));
  }
