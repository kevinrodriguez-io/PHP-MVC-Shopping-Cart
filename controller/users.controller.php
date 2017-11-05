<?php
class UsersController extends BaseController {
    
    public function __CONSTRUCT (){}
    
    public function Index () {
        $model = User::GetAllUsers();
        parent::RenderPage(
            'Users', 
            'view/shared/dtadmin/layout.php', 
            'view/users/users.php',
            $model
        );
    }
    
    public function Edit () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new User(
                $_REQUEST['username'], 
                $_REQUEST['password'],
                $_REQUEST['idCard'],
                $_REQUEST['name'],
                $_REQUEST['lastName'],
                $_REQUEST['phone'],
                $_REQUEST['email'],
                $_REQUEST['role'],
                $_REQUEST['id']
            );
            $model->Edit();
            parent::RedirectToController('users');
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = (int)$_REQUEST['id'];
            $model = User::GetUserById($id);
            parent::RenderPage(
                'Users', 
                'view/shared/dtadmin/layout.php', 
                'view/users/edit.php',
                $model
            );
        }
    }

    public function Create () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User(
                $_REQUEST['username'], 
                $_REQUEST['password'],
                $_REQUEST['idCard'],
                $_REQUEST['name'],
                $_REQUEST['lastName'],
                $_REQUEST['phone'],
                $_REQUEST['email'],
                $_REQUEST['role']
            );
            $user->Create();
            parent::RedirectToController('users');
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            parent::RenderPage(
                'Users', 
                'view/shared/dtadmin/layout.php', 
                'view/users/create.php'
            );
        }
    }

    public function Delete () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int)$_REQUEST['id'];
            $model = User::GetUserById($id);
            $model->Delete();
            parent::RedirectToController('users');
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = (int)$_REQUEST['id'];
            $model = User::GetUserById($id);
            parent::RenderPage(
                'Users', 
                'view/shared/dtadmin/layout.php', 
                'view/users/delete.php',
                $model
            );
        }
    }

    public function Details () {
        $id = (int)$_REQUEST['id'];
        $model = User::GetUserById($id);
        parent::RenderPage(
            'Users', 
            'view/shared/dtadmin/layout.php', 
            'view/users/details.php',
            $model
        );
    }

}

?>