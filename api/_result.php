<?php
$db = require_once __DIR__.'/../db.php';

$requested = strtolower($_GET['object']);
$sql = "SELECT b.bin_id, b.name as bin_name
        FROM products p
        INNER JOIN bins b ON p.bin_id = b.bin_id
        WHERE p.name = '$requested'";

$sth = $db->query($sql);
$rows = $sth->fetch(PDO::FETCH_OBJ);

$result = [
    'found'            => 0,
    'product_searched' => $requested
];

if($rows) {
    $result = [
        'found'   => 1,
        'bin'     => $rows->bin_id,
        'binName' => $rows->bin_name
    ];
}
