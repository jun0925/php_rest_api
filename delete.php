<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$product = new Product($pdo);

$id = $segment[2];
$deleted_row = $product->delete($id);

if ($deleted_row) {
  echo json_encode(['message' => '제품 정보를 삭제했습니다.']);
} else {
  echo json_encode(['message' => '제품 정보 삭제에 실패했습니다.']);
}