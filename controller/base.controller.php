<?php
abstract class BaseController {

  // protected function RenderPage ($pageName, $layoutPath, $viewPath) {
  //   $PAGE = $pageName; 
  //   $MASTER_CONTENT = file_get_contents($viewPath); 
  //   require_once $layoutPath;
  // }

  protected function RenderPage ($pageName, $layoutPath, $viewPath, $model = null) {
    $PAGE = $pageName; 
    $MODEL = $model;
    ob_start();
    include $viewPath;
    $MASTER_CONTENT = ob_get_clean();
    require_once $layoutPath;
  }

  protected function RedirectToController ($controller, $action = null) {
    if ($action != NULL) {
      header('Location: /?c=' + $controller);
    } else {
      header('Location: /?c=' + $controller + '&a=' + $action);
    }
    die();
  }

}
?>