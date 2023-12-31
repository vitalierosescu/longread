<?php

class Controller {

  public $route;
  protected $viewVars = array();
  protected $env = 'development';

  public function filter() {
    if (basename(dirname(dirname(__FILE__))) != 'src') {
      $this->env = 'production';
    }

    call_user_func(array($this, $this->route['action']));
  }

  public function render() {
    // load js through webpack-dev-server (NOT MAMP!)
    $this->set('js', '<script src="http://localhost:8082/script.js"></script>');
    // webpack dev server: css is injected by the script
    $this->set('css', '');
    if ($this->env == 'production') {
      $this->set('js', '<script src="script.js"></script>'); // regular script in production
      $this->set('css', '<link rel="stylesheet" src="style.css"'); // regular css in production
    }


    $this->createViewVarWithContent();
    $this->renderInLayout();
    if (!empty($_SESSION['info'])) {
      unset($_SESSION['info']);
    }
    if (!empty($_SESSION['error'])) {
      unset($_SESSION['error']);
    }
  }

  public function set($variableName, $value) {
    $this->viewVars[$variableName] = $value;
  }

  private function createViewVarWithContent() {
    extract($this->viewVars, EXTR_OVERWRITE);
    ob_start();
    require __DIR__ . '/../view/' . strtolower($this->route['controller']) . '/' . $this->route['action'] . '.php';
    $content = ob_get_clean();
    $this->set('content', $content);
  }

  private function renderInLayout() {
    extract($this->viewVars, EXTR_OVERWRITE);
    include __DIR__ . '/../view/layout.php';
  }

}
