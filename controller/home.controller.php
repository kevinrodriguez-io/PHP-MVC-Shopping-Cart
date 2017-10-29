<?php
class HomeController extends BaseController {
    
    public function __CONSTRUCT (){}
    
    public function Index () {
        parent::RenderPage(
            'Home', 
            'view/shared/dtadmin/layout.php', 
            'view/home/home.php'
        );
    }
    
}

?>