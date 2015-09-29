<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller {

    // precisa de utilizar o carrinho todotempo
    // Trabalhar com injeção de dependencia

    private $cart;

    /** Gerar Documentação /** ENTER
     * @param Cart $cart
     */
    public function __construct(Cart $cart)// Poderia passar uma interface como
    {
        $this->cart = $cart;
    }

    public function index()
    {
        if(!Session::has('cart')){
            Session::set('cart', $this->cart);
        }
        //Passar o cart para a View
        return view('store.cart', ['cart' => Session::get('cart')]);
    }

    public function add($id)
    {

        $cart = $this->getCart();

        //Adiciona os atributo no carrinho
        $product = Product::find($id);
        $cart->add($id, $product->name, $product->price);

        //Altera a sessão passando o Carrinho
        Session::set('cart', $cart);

        return redirect()->route('cart');

    }

    public function destroy($id){

        $cart = $this->getCart();
        $cart->remove($id);

        Session::set('cart', $cart);

        return redirect()->route('cart');
    }

    /**
     * @return Cart
     */
    public function getCart()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }

        return $cart;
    }

}
