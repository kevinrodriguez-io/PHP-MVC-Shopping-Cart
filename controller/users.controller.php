<?php
class UsersController extends BaseController {
    
    private function CheckClientRights ($id) {
        if ((Security::GetLoggedUser())->getRole() == 'CLIENT' && (Security::GetLoggedUser())->getId() != $id) {
            parent::RedirectToController('home');
        }
    }

    private function RedirectToHomeIfNotAdmin () {
        if ((Security::GetLoggedUser())->getRole() != 'ADMIN') {
            parent::RedirectToController('home');
        }
    }

    public function __CONSTRUCT () {}
    
    public function Index () {

        $this->RedirectToHomeIfNotAdmin();

        $model = User::GetAllUsers();
        parent::RenderPage(
            'Users', 
            'view/shared/dtadmin/layout.php', 
            'view/users/users.php',
            $model
        );
    }
    
    public function Edit () {

        $this->CheckClientRights($_REQUEST['id']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ((Security::GetLoggedUser())->getRole() == 'CLIENT') {
                $id = (int)$_REQUEST['id'];
                $old = User::GetUserById($id);
                $role = $old->getRole();
                $username = $old->getUsername();
                $new = new User(
                    $username, 
                    $_REQUEST['password'],
                    $_REQUEST['idCard'],
                    $_REQUEST['name'],
                    $_REQUEST['lastName'],
                    $_REQUEST['phone'],
                    $_REQUEST['email'],
                    $role,
                    $_REQUEST['id']
                );
                $new->Edit();
                Security::CreateSessionForUser(User::GetUserById($id));
            } else {
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
            }
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

        $this->RedirectToHomeIfNotAdmin();

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

        $this->RedirectToHomeIfNotAdmin();

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

        $this->RedirectToHomeIfNotAdmin();

        $id = (int)$_REQUEST['id'];
        $model = User::GetUserById($id);
        parent::RenderPage(
            'Users', 
            'view/shared/dtadmin/layout.php', 
            'view/users/details.php',
            $model
        );
    }

    public function DetailsJson () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int)$_REQUEST['id'];
            $model = User::GetUserById($id);
            parent::RenderJson($model);
        }
    }

    public function DeleteJson () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int)$_REQUEST['id'];
            $model = User::GetUserById($id);
            $model->Delete();
            $result = array('status' => 'done');
            parent::RenderJson($result);
        }
    }

}

?>