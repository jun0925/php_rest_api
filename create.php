<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$product = new Product($pdo);

$params = json_decode(file_get_contents("php://input"), 1);
$id = $product->create($params);

if ($id) {
  echo json_encode(['message' => '새 제품을 등록했습니다.']);
} else {
  echo json_encode(['message' => '제품 등록에 실패했습니다.']);
}
