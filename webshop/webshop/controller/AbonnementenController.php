<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/ProductDAO.php';

class AbonnementenController extends Controller {

  private $aboDAO;

  function __construct() {
    // $this->aboDAO = new AboDAO();
  }

  public function index() {
    // $abos = $this->aboDAO->selectAll();
    $this->set('title', 'abonnementen');
    // $this->set('abos', $abos);

  }

  public function detail() {
    // $abos = $this->aboDAO->selectAll();
    $this->set('title', 'abonnementen_detail');
    // $this->set('abos', $abos);

  }

}
