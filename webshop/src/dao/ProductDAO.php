<?php

require_once( __DIR__ . '/DAO.php');

class ProductDAO extends DAO {

  public function selectAll(){
    $sql = "SELECT product_varianten.*, producten.titel, producten.beschrijving, producten.auteur, producten.categorie
    FROM product_varianten
    INNER JOIN producten ON producten.id = product_varianten.product_id
    WHERE variant_default = 1";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectById($id){
    $sql = "SELECT product_varianten.*, producten.titel, producten.beschrijving, producten.auteur, producten.categorie, producten.paginas, producten.levertijd_min, producten.levertijd_max
    FROM product_varianten
    INNER JOIN producten ON producten.id = product_varianten.product_id
    WHERE variant_default = 1 AND product_varianten.id = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function search($categorie = ''){
    $sql = "SELECT product_varianten.*, producten.titel, producten.beschrijving, producten.auteur, producten.categorie
    FROM product_varianten
    INNER JOIN producten ON producten.id = product_varianten.product_id
    WHERE variant_default = 1";

    if (!empty($categorie)) {
      $sql .= " AND `categorie` = :categorie";
    }

    $stmt = $this->pdo->prepare($sql);
    if (!empty($categorie)) {
      $stmt->bindValue(':categorie', $categorie);
    }
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectCategories() {
    $sql = "SELECT DISTINCT `categorie` FROM `producten` ORDER BY `categorie` ASC";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // public function selectByCategory($categorie){
  //   $sql = "SELECT product_varianten.*, producten.titel, producten.beschrijving, producten.categorie
  //   FROM product_varianten
  //   INNER JOIN producten ON producten.id = product_varianten.product_id
  //   WHERE variant_default = 1 AND producten.categorie = :categorie";
  //   $stmt = $this->pdo->prepare($sql);
  //   $stmt->bindValue(':categorie', $categorie);
  //   $stmt->execute();
  //   return $stmt->fetch(PDO::FETCH_ASSOC);
  // }

  // public function selectById($id){
  //   $sql = "SELECT product_varianten.*, producten.titel, producten.beschrijving
  //   FROM product_varianten
  //   INNER JOIN producten ON producten.id = product_varianten.product_id
  //   WHERE product_id = :id";
  //   $stmt = $this->pdo->prepare($sql);
  //   $stmt->bindValue(':id', $id);
  //   $stmt->execute();
  //   return $stmt->fetch(PDO::FETCH_ASSOC);
  // }


  // public function selectByTourId($productId) {
  //   $sql = "SELECT * FROM `product_varianten` WHERE `product` = :product_id";
  //   $stmt = $this->pdo->prepare($sql);
  //   $stmt->bindValue(':product_id', $productId);
  //   $stmt->execute();
  //   return $stmt->fetchAll(PDO::FETCH_ASSOC);
  // }

  // public function selectById($id){
  //   $sql = "SELECT producten .*, product_varianten.img, product_varianten.kortingscode, product_varianten.variant, product_varianten.prijs
  //   FROM producten
  //   INNER JOIN product_varianten
  //   ON product_varianten.product_id = producten.id
  //   WHERE variant_default = 1";
  //   $stmt = $this->pdo->prepare($sql);
  //   $stmt->bindValue(':id', $id);
  //   $stmt->execute();
  //   return $stmt->fetch(PDO::FETCH_ASSOC);
  // }

  // SELECT producten .*, product_varianten.img, product_varianten.kortingscode, product_varianten.variant, product_varianten.prijs
  //   FROM producten
  //   INNER JOIN product_varianten
  //   ON product_id = product_varianten.product_id
  //   WHERE variant_default = 1

  public function delete($id){
    $sql = "DELETE FROM `producten` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    return $stmt->execute();
  }

}
