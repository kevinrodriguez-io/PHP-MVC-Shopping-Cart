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

    public function Empty () {
        ShoppingCartSession::RemoveShoppingCartFromSession();
        parent::RedirectToController('articles');
    }

    public function RemoveArticle () {
        $id = $_REQUEST['id'];
        $cart = ShoppingCartSession::GetShoppingCart();
        $filteredArticles = array_filter($cart->articles, function ($element) use ($id) {
            return $element->getCartUniqueId() != $id;
        });
        if (count($filteredArticles) > 0) {
            $cart->articles = $filteredArticles;
            ShoppingCartSession::StoreShoppingCartInSession($cart);
            parent::RedirectToController('cart');
        } else {
            ShoppingCartSession::RemoveShoppingCartFromSession();
            parent::RedirectToController('articles');
        }
    }
    
    public function Checkout () {
        $cart = ShoppingCartSession::GetShoppingCart();
        $model = $cart->articles;
        parent::RenderPage(
            'Cart', 
            'view/shared/dtadmin/layout.php', 
            'view/cart/checkout.php',
            $model
        );
    }

}

?>