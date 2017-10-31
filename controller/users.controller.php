<?php
class UsersController extends BaseController {
    
    public function __CONSTRUCT (){}
    
    public function Index () {
        parent::RenderPage(
            'Users', 
            'view/shared/dtadmin/layout.php', 
            'view/users/users.php'
        );
    }
    
    public function Edit () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            (new User(
                $_REQUEST['username'], 
                $_REQUEST['password'],
                $_REQUEST['idCard'],
                $_REQUEST['name'],
                $_REQUEST['lastName'],
                $_REQUEST['phone'],
                $_REQUEST['email'],
                $_REQUEST['role']
            ));//->Create();
            parent::RedirectToController('users');
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            parent::RenderPage(
                'Users', 
                'view/shared/dtadmin/layout.php', 
                'view/users/edit.php'
            );
        }
    }

    public function Create () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            (new User(
                $_REQUEST['username'], 
                $_REQUEST['password'],
                $_REQUEST['idCard'],
                $_REQUEST['name'],
                $_REQUEST['lastName'],
                $_REQUEST['phone'],
                $_REQUEST['email'],
                $_REQUEST['role']
            ))->Create();
            parent::RedirectToController('users');
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            parent::RenderPage(
                'Users', 
                'view/shared/dtadmin/layout.php', 
                'view/users/create.php'
            );
        }
    }

}

?>