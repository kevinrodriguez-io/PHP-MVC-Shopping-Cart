<?php

include_once('base.controller.php');
include_once('../security/security.class.php');
include_once('../model/user.class.php');

class AuthenticationController extends BaseController {
    
    public function __CONSTRUCT (){}
    
    public function Index () {
        parent::RenderPage(
            'Authentication', 
            'view/shared/dtadmin/layout.php', 
            'view/authentication/authentication.php'
        );
    }

    public function Login () {
        $model = new User($_REQUEST['username'], $_REQUEST['password']);
        if ($model->Login()) {
            parent::RedirectToController('home');
        } else {
            parent::RenderPage(
                'Authentication', 
                'view/shared/dtadmin/layout.php', 
                'view/authentication/authentication.php'
            );
        }
    }

    public function Logout () {
        Security::DeleteSession();
        parent::RedirectToController('Authentication');
    }
    
}

?>