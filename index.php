<?php

include "core/config.php";
include 'core/product.php';

// [REDIRECT_URL] => /product/1
$method = $_SERVER['REQUEST_METHOD'];
//  [REQUEST_METHOD] => GET
$segment = explode('/', $_SERVER['REDIRECT_URL']);

if ($segment[1] === 'products') {
  // READ
  if ($method === 'GET') {
    if (empty($segment[2])) {
      // get a list of all products
      include "read_all.php";
    } else {
      // get a list of one product
      include "read_one.php";
    }
  } elseif ($method === 'POST') {
    // create product
    include "create.php";
  } elseif ($method === 'PUT') {
    // update
    if (empty($segment[2])) {
      echo json_encode(['message' => 'id 값이 없습니다.']);
    } else {
      include "update.php";
    }
  } elseif ($method === 'DELETE') {
    // delete
    if (empty($segment[2])) {
      echo json_encode(['message' => 'id 값이 없습니다.']);
    } else {
      include "delete.php";
    }
  } else {
    echo json_encode(['message' => '요청할 페이지를 찾을 수 없습니다.']);
  }
} else {
  echo json_encode(['message' => '요청한 페이지를 찾을 수 없습니다.']);
}
