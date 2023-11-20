<?php

require_once( __DIR__ . '/DAO.php');

class AboDAO extends DAO {

  // public function selectAll(){
  //   $sql = "SELECT * FROM `boek_it_abonnementen`";
  //   $stmt = $this->pdo->prepare($sql);
  //   $stmt->execute();
  //   return $stmt->fetchAll(PDO::FETCH_ASSOC);
  // }

  // public function selectById($id){
  //   $sql = "SELECT * FROM `boek_it_abonnementen` WHERE `id` = :id";
  //   $stmt = $this->pdo->prepare($sql);
  //   $stmt->bindValue(':id', $id);
  //   $stmt->execute();
  //   return $stmt->fetch(PDO::FETCH_ASSOC);
  // }

}
