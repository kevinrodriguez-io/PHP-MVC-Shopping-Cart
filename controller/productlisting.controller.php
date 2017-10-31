<?php
class ProductlistingController extends BaseController {
    
    public function __CONSTRUCT (){}
    
    public function Index () {
        parent::RenderPage(
            'Productlisting', 
            'view/shared/dtadmin/layout.php', 
            'view/productlisting/productlisting.php'
        );
    }
    
}

?>