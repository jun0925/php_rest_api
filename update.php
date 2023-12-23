<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// create instance
$product = new Product($pdo);

$params = json_decode(file_get_contents("php://input"), 1);
$params['id'] = $segment[2];
$update_row = $product->update($params);

if ($update_row) {
  echo json_encode(['message' => '제품 정보를 수정했습니다.']);
} else {
  echo json_encode(['message' => '제품 정보 수정에 실패했습니다.']);
}