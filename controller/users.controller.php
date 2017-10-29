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
    
}

?>