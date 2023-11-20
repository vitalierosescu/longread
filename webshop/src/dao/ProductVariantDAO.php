<?php

require_once( __DIR__ . '/DAO.php');

class ProductVariantDAO extends DAO {

  public function selectByProductId($productId) {
    $sql = "SELECT * FROM `product_varianten` WHERE `product_id` = :product_id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':product_id', $productId);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
