<?php

require_once(__DIR__ . '/Controller.php');
// require_once(__DIR__ . '/../dao/BookingTourDAO.php');
// require_once(__DIR__ . '/../dao/BookingUserDAO.php');
require_once(__DIR__ . '/../dao/ProductDAO.php');


class OrdersController extends Controller {

  private $productDAO;
  // private $bookingTourDAO;
  // private $bookingUserDAO;

  function __construct() {
    $this->productDAO = new productDAO();
    // $this->bookingTourDAO = new BookingTourDAO();
    // $this->bookingUserDAO = new BookingUserDAO();
  }

  // CART
  public function cart() {

    if(!empty($_POST)) {
      if(!empty($_POST['checkout'])) {
        $this->handleCheckout();
      } else if(!empty($_POST['update'])) {
        $this->handleUpdateCart();
      }
    }
    if(!empty($_GET['action'])) {
      if($_GET['action'] == 'change') {
        $this->handleChange();
      }
    }
    $items = array();
  if(!empty($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $productId => $amount) {
      if($product = $this->productDAO->selectById($productId)) {
        $item = array(
          'product' => $product,
          'amount' => $amount
        );
        $items[] = $item;
      }
    }
  }

    $this->set('items', $items);
    $this->set('title', 'Cart');
  }

  //
  public function checkout(){
    $items = array();
    if(!empty($_SESSION['cart'])) {
      foreach($_SESSION['cart'] as $productId => $amount) {
        if($product = $this->productDAO->selectById($productId)) {
          $item = array(
            'product' => $product,
            'amount' => $amount
          );
          $items[] = $item;
        }
      }
    }

    if(!empty($_POST['action'])) {
      if ($_POST['action'] == 'addProductUser') {
        foreach ($items as $item) {
          $dataProduct = array(
            'product' => $item['product']['title'],
            'quantity' => $item['amount']
          );
          $this->bookingProductDAO->insert($dataProduct);
        }

        $this->addBooking($product);
      }
    }


    $this->set('title', 'checkout');
    $this->set('items', $items);
  }


  public function add_product() {
    if(!empty($_GET['id'])) {
        //get product
      if($product = $this->productDAO->selectById($_GET['id'])) {
        if(isset($_SESSION['cart'][$product['id']])) {
          $_SESSION['cart'][$product['id']]++;
          } else {
          $_SESSION['cart'][$product['id']] = 1;
        }
        $_SESSION['info'] = 'Product toegevoegd!';
        header('Location: index.php?page=producten');
        exit();
      }
    }
    header('Location: index.php');
    exit();
  }

  public function add_product_detail() {
    if(!empty($_GET['id']) && !empty($_GET['variant'])) {
      //get product
      if($product = $this->productDAO->selectById($_GET['id'])) {
        if(isset($_SESSION['cart'][$product['id']])) {
          $_SESSION['cart'][$product['id']]++;
        } else {
          $_SESSION['cart'][$product['id']] = 1;
        }
        $_SESSION['info'] = 'Je hebt een product toegevoegd aan de winkelmand!';
        header('Location: index.php?page=producten');
        exit();
      }
    }
    header('Location: index.php');
    exit();
  }


  // DELETE cart amount
  private function handleChange() {
    if(!empty($_GET['id']) && isset($_GET['amount']) && isset($_SESSION['cart'][$_GET['id']])) {
      $_SESSION['cart'][$_GET['id']] = $_GET['amount'];
      if($_GET['amount'] == 0) {
        unset($_SESSION['cart'][$_GET['id']]);
      }
      // $_SESSION['info'] = 'Je hebt "' . $_GET['id']['titel'] . '" uit je winkelmand verplaatst.';
      $_SESSION['info'] = 'yo';
      header('Location: index.php?page=winkelmand');
      exit();
    }
  }


  private function addProduct($product) {
      $errors = array();

    if(empty($_POST['lastname'])){
      $errors['lastname'] = 'Gelieve een naam in te vullen';
    }

    if(empty($_POST['firstname'])){
      $errors['firstname'] = 'Gelieve een voornaam in te vullen';
    }

    if(empty($_POST['email'])){
      $errors['email'] = 'Gelieve een email in te vullen';
    }

    if(empty($_POST['phone'])){
      $errors['phone'] = 'Gelieve een gsm nummer in te vullen';
    }

    if(empty($_POST['city'])){
      $errors['city'] = 'Gelieve een stad in te vullen';
    }

    if(empty($_POST['street'])){
      $errors['street'] = 'Gelieve een straat in te vullen';
    }

    if(empty($_POST['number'])){
      $errors['number'] = 'Gelieve een straatnummer in te vullen';
    }

    if(empty($_POST['province'])){
      $errors['province'] = 'Gelieve een provincie in te vullen';
    }

      // WELKE DATA???
      $dataUser = array(
        'lastname' => $_POST['lastname'],
        'firstname' => $_POST['firstname'],
        'email' => $_POST['email'],
        'province' => $_POST['province'],
        'city' => $_POST['city'],
        'street' => $_POST['street'],
        'number' => $_POST['number'],
        'phone' => $_POST['phone']
      );

      if(empty($errors)){
      $insertedBooking = $this->bookingUserDAO->insert($dataUser);
      if (!empty($insertedBooking)) {
        unset($_SESSION['cart']);
        Header('Location:index.php');
        $_SESSION['info'] = 'Jouw boeking werd succesvol geregistreerd!';
      } else {
        print_r($this->bookingUserDAO->validate($data));
      }
    }
    if(!empty($errors)){
      $_SESSION['error'] = 'Gelieve te controleren of alles is ingevuld.';
      $this->set('errors', $errors);
    }
  }

  // UPDATE cart item
  private function handleUpdateCart() {
    foreach($_POST['amount'] as $productId => $amount) {
      $_SESSION['cart'][$productId] = $amount;
      if($amount == 0) {
        unset($_SESSION['cart'][$productId]);
      }
    }
    $_SESSION['info'] = 'Je hebt het aantal producten aangepast.';
    header('Location: index.php?page=winkelmand');
    exit();
  }

  private function _handleCheckout() {
    header('Location: index.php?page=checkout');
    exit();
  }

}
