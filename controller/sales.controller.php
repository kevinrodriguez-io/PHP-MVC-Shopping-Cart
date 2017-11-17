<?php
class SalesController extends BaseController {
    
    public function __CONSTRUCT (){}
    
    public function Index () {
        parent::RenderPage(
            'Sales', 
            'view/shared/dtadmin/layout.php', 
            'view/sales/sales.php'
        );
    }

}

?>