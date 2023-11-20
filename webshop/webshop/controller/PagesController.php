<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ProductDAO.php';
require_once __DIR__ . '/../dao/ProductVariantDAO.php';

class PagesController extends Controller {

  private $productDAO;
  private $productVariantDAO;

  function __construct() {
    $this->productDAO = new ProductDAO();
    $this->productVariantDAO = new ProductVariantDAO();
  }

  public function index() {
    $producten = $this->productDAO->selectAll();
    $this->set('producten', $producten);
    $this->set('title', 'home');

    if (strtolower($_SERVER['HTTP_ACCEPT']) == 'application/json') {
      header('Content-Type: application/json');
      echo json_encode($todos);
      exit();
    }
  }

  // PRODUCTEN

  public function producten() {
    $producten = $this->productDAO->selectAll();

    // if(!empty($_GET['action'])) {
    //   if($_GET['action'] == 'filter' && isset($_GET['categorie'])) {
    //     $producten = $this->productDAO->selectByCategory($_GET['categorie']);
    //   }
    // }

    if (!empty($_GET['action']) && $_GET['action'] == 'filter') {
      $producten = $this->productDAO->search($_GET['categorie']);
      $this->set('categorie',$_GET['categorie']);
    }else{
      $producten = $this->productDAO->search();
      $this->set('producten', $producten);
      $this->set('title', 'producten');
      $this->set('currentPage', 'producten');
      $this->set('categorie','');
    }

    $this->set('producten', $producten);
    $this->set('categories', $this->productDAO->selectCategories());
  }

  // PRODUCTEN DETAIL

  public function producten_detail() {
    if(!empty($_GET['id'])){
      $product = $this->productDAO->selectById($_GET['id']);
    }

    $producten = $this->productDAO->selectAll();
    $varianten = $this->productVariantDAO->selectByProductId($product['product_id']);
    $this->set('title', 'Detail');
    $this->set('product', $product);
    $this->set('producten', $producten);
    $this->set('varianten', $varianten);
  }

}
