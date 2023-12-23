<?php

class Product 
{
  private $conn;
  private $table = 'products';

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function get_all()
  {
    $sql = "SELECT * FROM {$this->table}";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt;
  }

  public function get_one($id)
  {
    $sql = "SELECT * FROM {$this->table} WHERE id = :id";
    $stmt = $this->conn->prepare($sql);

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
  }

  public function create($params)
  {
    $sql = "
      INSERT INTO {$this->table} SET
      name = :name,
      price = :price,
      stock = :stock
    ";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':name', $params['name'], PDO::PARAM_STR);
    $stmt->bindParam(':price', $params['price'], PDO::PARAM_INT);
    $stmt->bindParam(':stock', $params['stock'], PDO::PARAM_INT);

    if ($stmt->execute()) {
      return $this->conn->lastInsertId();
    } 

    return false;
  }

  public function update($params)
  {
    $sql = "
      UPDATE {$this->table} SET
      name = :name,
      price = :price,
      stock = :stock
      WHERE id = :id
    ";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':name', $params['name'], PDO::PARAM_STR);
    $stmt->bindParam(':price', $params['price'], PDO::PARAM_INT);
    $stmt->bindParam(':stock', $params['stock'], PDO::PARAM_INT);
    $stmt->bindParam(':id', $params['id'], PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
  }

  public function delete($id)
  {
    $sql = "DELETE FROM {$this->table} WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
  }
}
