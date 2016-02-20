<?php

namespace FRD\Http\Controllers;

use FRD\Order;
use Illuminate\Http\Request;
use FRD\Http\Requests;
use FRD\Http\Controllers\Controller;

class AdminOrdersController extends Controller
{
    private $orderModel;

    public function __construct(Order $order)
    {
        $this->orderModel = $order;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = $this->orderModel->paginate(5);

        return view('admin.orders.index', compact('orders'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->orderModel->find($id);

        return view('admin.orders.detail', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = $this->orderModel->find($id);

        if(is_null($request->get('status'))) {
            $order->status = 0;
            $order->save();

            return redirect()->route('orders.index');
        }

        $order->update($request->all(), $id);

        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = $this->orderModel->find($id);
        $this->orderModel->destroy($id);

        return redirect()->route('orders.index');
    }
}
