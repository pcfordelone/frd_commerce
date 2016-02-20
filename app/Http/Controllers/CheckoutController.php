<?php

namespace FRD\Http\Controllers;

use FRD\Events\CheckoutEvent;
use FRD\Order;
use FRD\OrderItem;
use Illuminate\Http\Request;
use FRD\Http\Requests;
use FRD\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{

    public function place(Order $orderModel, OrderItem $orderItem)
    {
        if (!Session::has('cart')) {
            return false;
        }

        $cart = Session::get('cart');

        if ($cart->getTotal() > 0) {
            $order = $orderModel->create([
                'user_id'   => Auth::user()->id,
                'total'     => $cart->getTotal(),
            ]);

            foreach($cart->all() as $k => $item) {

                $order->order_items()->create([
                    'product_id'    => $k,
                    'price'         => $item['price'],
                    'qtd'           => $item['qtd'],
                ]);

            }

            $cart->clear();
            event(new CheckoutEvent(Auth::user(), $order));

            return view('store.order', compact('order'));
        }

        Session::flash('msg','Não foi possível fechar a compra pois o carrinho encontra-se vazio');
        return redirect()->route('cart');
    }

    public function teste()
    {

    }

}
