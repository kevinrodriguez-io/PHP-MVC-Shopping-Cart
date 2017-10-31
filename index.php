<?php
include_once('./security/security.class.php');
include_once('./model/user.class.php');
include_once('./database/database.class.php');
include_once('./controller/base.controller.php');

class FrontController {
    
    const kDefaultController = 'home';
    const kAuthenticationController = 'authentication';
    const kPublicControllers = [
        'productlisting'
    ];

    /**
     * Undocumented function
     *
     * @return bool
     */
    private static function IsLoginRequest () {
        $isControllerSet = isset($_REQUEST['c']);
        if ($isControllerSet) {
            return strtolower($_REQUEST['c']) === FrontController::kAuthenticationController;
        } else {
            return false;
        }
    }

    /**
     * Undocumented function
     *
     * @return bool
     */
    private static function IsPublicRequest () {
        $isControllerSet = isset($_REQUEST['c']);
        $controller = $isControllerSet ? strtolower($_REQUEST['c']) : FrontController::kDefaultController;
        return in_array($controller, FrontController::kPublicControllers);
    }

    /**
     * Undocumented function
     *
     * @param string $default The default controller to be rendered
     * @return void
     */
    private static function RenderController ($default = FrontController::kDefaultController) {
        if (!isset($_REQUEST['c'])) FrontController::Render($default); else FrontController::RenderFromQueryString();
    }

    /**
     * Undocumented function
     *
     * @param string $controller - A default controller to rendered
     * @return void
     */
    private static function Render ($controller) {
        require_once "controller/$controller.controller.php";
        $controller = ucwords($controller) . 'Controller';
        $controller = new $controller;
        $controller->Index();  
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    private static function RenderFromQueryString () {
        // Obtenemos el controlador que queremos cargar
        $controller = strtolower($_REQUEST['c']);
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
        // Instanciamos el controlador
        require_once "controller/$controller.controller.php";
        $controller = ucwords($controller).'Controller';
        $controller = new $controller;
        // Llama la accion
        call_user_func(array($controller, $accion));
    }

    public static function ProcessRequest () {

        // If user is logged in, just render 
        if (Security::UserIsLoggedIn()) { FrontController::RenderController(); return; }
        
        // If this is a login request, just render
        if (FrontController::IsLoginRequest()) { FrontController::RenderController(); return; }

        // If this is a public request, just render
        if (FrontController::IsPublicRequest()) {  FrontController::RenderController(); return; }

        // Otherwise, force render authentication controller (Login screen)
        header('Location: ?c='.FrontController::kAuthenticationController);

    }

}

FrontController::ProcessRequest();

?>