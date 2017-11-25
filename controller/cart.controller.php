<?php
class HomeController extends BaseController {
    
    public function __CONSTRUCT (){}
    
    public function Index () {
        $cart = ShoppingCartSession::GetShoppingCart();
        $model = $cart->getArticles();
        parent::RenderPage(
            'Cart', 
            'view/shared/dtadmin/layout.php', 
            'view/cart/cart.php',
            $model
        );
    }
    
}

?>