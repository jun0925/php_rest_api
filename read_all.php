<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// create instance
$product = new Product($pdo);

$stmt = $product->get_all();

$num = $stmt->rowCount();

if ($num > 0) {
  $product_arr = [];
  $product_arr['data'] = [];
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $product_item = [
      'id' => $id,
      'name' => $name,
      'price' => $price,
      'stock' => $stock,
      'created_at' => $created_at,
    ];

    array_push($product_arr['data'], $product_item);
  }

  echo json_encode($product_arr);
}