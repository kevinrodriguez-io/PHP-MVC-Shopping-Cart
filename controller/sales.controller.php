<?php
class SalesController extends BaseController {
    
    public function __CONSTRUCT (){}
    
    public function Index () {
        $model = User::GetAllUsers();
        parent::RenderPage(
            'Sales', 
            'view/shared/dtadmin/layout.php', 
            'view/sales/sales.php',
            $model
        );
    }

}

?>