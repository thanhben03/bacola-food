<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Log;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        // session()->put('observe', true);
        $order_id = $order->id;
        $cart_session = session()->get('cart') ?: null;
        try {
            foreach ($cart_session->products as $product) {
                OrderItem::create([
                    'order_id' => $order_id,
                    'product_id' => $product['product_info']->id,
                    'qty' => $product['qty'],
                    'sub_total' => $product['price']
                ]);
            }
            session()->forget('cart', 'dataOrder');
            session()->save();
        } catch (\Throwable $th) {
            session()->put('error',$th->getMessage());
        }
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
