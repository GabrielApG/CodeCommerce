<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller {


    public function __construct()
    {
        // Obriga o usuário estar logado
        $this->middleware('auth');
    }

	public function place(Order $orderModel, OrderItem $orderItem){ //Método plcae order, quando acessar esse método ele ira acessar o carrinho de comprar e começar a executar
                             //os pedidos

        if(!Session::has('cart')){
            return false;
        }

        $cart = Session::get('cart');// recupera o carrinho de compras

        if($cart->getTotal() > 0){

            $order = $orderModel->create(['user_id'=>Auth::user()->id,'total'=>$cart->getTotal()]);

            /*Método all corresponde ao método da classe Cart*/
            foreach($cart->all() as $k=>$item){
                //Toda vez que der o save tem que passar a instancia lá para dentro

                $order->itens()->create(['product_id'=>$k,'price'=>$item['price'], 'qtd'=>$item['qtd']]);
            }

            dd($order);
        }
    }

}
