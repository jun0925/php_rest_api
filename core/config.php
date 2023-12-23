<?php 

$host = 'localhost';
$dbname = 'rest_api';
$username = 'root';
$password = '111111';

try {
  $dsn = "mysql:host={$host};dbname={$dbname}";
  $pdo = new PDO($dsn, $username, $password);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // echo "DB연결 성공";
} catch(PDOException $e) {
  echo $e->getMessage();
}