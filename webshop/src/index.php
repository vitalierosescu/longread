<?php
session_start();
ini_set('display_errors', true);
error_reporting(E_ALL);

// basic .env file parsing
if (file_exists("../.env")) {
  $variables = parse_ini_file("../.env", true);
  foreach ($variables as $key => $value) {
    putenv("$key=$value");
  }
}

$routes = array(
  'home' => array(
    'controller' => 'Pages',
    'action' => 'index'
  ),
  'producten' => array(
    'controller' => 'Pages',
    'action' => 'producten'
  ),
  'producten_detail' => array (
    'controller' => 'Pages',
    'action' => 'producten_detail'
  ),
  'abonnementen' => array (
    'controller' => 'Abonnementen',
    'action' => 'index'
  ),
  'abonnementen_detail' => array (
    'controller' => 'Abonnementen',
    'action' => 'detail'
  ),
  'winkelmand' => array (
    'controller' => 'Orders',
    'action' => 'cart'
  ),
  'checkout' => array (
    'controller' => 'Orders',
    'action' => 'checkout'
  ),
  'add-to-cart' => array(
    'controller' => 'Orders',
    'action' => 'add_product'
  ),
  'add-to-cart-detail' => array(
    'controller' => 'Orders',
    'action' => 'add_product_detail'
  )

);

if(empty($_GET['page'])) {
  $_GET['page'] = 'home';
}
if(empty($routes[$_GET['page']])) {
  header('Location: index.php');
  exit();
}

$route = $routes[$_GET['page']];
$controllerName = $route['controller'] . 'Controller';

require_once __DIR__ . '/controller/' . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->route = $route;
$controllerObj->filter();
$controllerObj->render();
