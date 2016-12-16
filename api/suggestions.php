<?php 
$db = require_once __DIR__.'/../db.php';

$requested = $_GET['term'];

$sql = "SELECT b.bin_id, b.name as bin_name, p.name as product_name
        FROM products p
        INNER JOIN bins b ON p.bin_id = b.bin_id
        WHERE p.name LIKE '%$requested%'
        LIMIT 10 ";

$sth = $db->query($sql);
$rows = $sth->fetchAll(PDO::FETCH_OBJ);

$data = [];
foreach ($rows as $row) {
    $data[] = [
        'bin_id'    => $row->bin_id,
        'bin_name'  => $row->bin_name,
        'label'     => $row->product_name
    ];
}

echo json_encode($data);
