<?php
class SalesController extends BaseController {
    
    public function __CONSTRUCT (){}
    
    public function Index () {
        $model = [];
        if ((Security::GetLoggedUser())->getRole() == 'ADMIN') {
            $model = vwSale::GetAllSales();
        } else {
            $model = vwSale::GetAllSalesForUser((Security::GetLoggedUser())->getId());
        }
        parent::RenderPage(
            'Sales', 
            'view/shared/dtadmin/layout.php', 
            'view/sales/sales.php',
            $model
        );
    }

}

?>