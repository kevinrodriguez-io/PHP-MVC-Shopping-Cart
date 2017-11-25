<?php
class CartController extends BaseController {
    
    public function __CONSTRUCT (){}
    
    public function Index () {
        $cart = ShoppingCartSession::GetShoppingCart();
        $model = $cart->articles;
        parent::RenderPage(
            'Cart', 
            'view/shared/dtadmin/layout.php', 
            'view/cart/cart.php',
            $model
        );
    }
    
}

?>