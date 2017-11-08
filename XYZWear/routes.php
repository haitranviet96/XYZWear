<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
      case 'register':
        require_once('models/user.php');
        $controller = new RegisterController();
      break;
      case 'buyproduct':
        require_once('models/product.php');
        $controller = new BuyProductController();
      break;
    }

    $controller->{ $action }();
  }

  $controllers = array('pages' => ['home', 'error'],
                       'register' => ['index', 'register'],
                       'buyproduct' => ['index', 'buy', 'orderType', 'order']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>