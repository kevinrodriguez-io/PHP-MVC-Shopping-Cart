<?php
class AuthenticationController extends BaseController {
    
    public function __CONSTRUCT (){}
    
    public function Index () {
        parent::RenderPage(
            'Authentication', 
            'view/shared/login/layout.php', 
            'view/authentication/authentication.php'
        );
    }

    public function Login () {
        $model = new User($_REQUEST['username'], $_REQUEST['password']);
        if ($model->Login()) {
            parent::RedirectToController('home');
        } else {
            $model->setMessage('Combinación usuario/password no válida');
            parent::RenderPage(
                'Authentication', 
                'view/shared/login/layout.php', 
                'view/authentication/authentication.php',
                $model
            );
        }
    }

    public function Logout () {
        Security::DeleteSession();
        parent::RedirectToController('Authentication');
    }
    
}

?>