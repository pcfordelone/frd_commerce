<?php

namespace FRD\Listeners;

use FRD\Events\CheckoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailCheckoutListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CheckoutEvent  $event
     * @return void
     */
    public function handle(CheckoutEvent $event)
    {
        $to = $event->getUser()->email;
        $order = $event->getOrder();

        Mail::send('store.emailcheckout', ['order' => $order], function($message) use($to) {
            $message
                ->to($to)
                ->subject('FRDCommerce - Pedido realizado com sucesso')
                ->from('orders@frdcommerce')
            ;
        });

    }
}
