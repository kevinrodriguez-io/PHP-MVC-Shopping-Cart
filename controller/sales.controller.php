<?php
class SalesController extends BaseController {
    
    public function __CONSTRUCT (){}
    
    public function Index () {
        $model = Sale::GetAllSales();
        parent::RenderPage(
            'Sales', 
            'view/shared/dtadmin/layout.php', 
            'view/sales/sales.php',
            $model
        );
    }

}

?>