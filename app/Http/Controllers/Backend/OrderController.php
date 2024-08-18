<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\cancelledOrderDataTable;
use App\DataTables\deliveredOrderDataTable;
use App\Models\Order;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use App\DataTables\OrderDataTable;
use App\Http\Controllers\Controller;
use App\DataTables\PendingOrderDataTable;
use App\DataTables\shippedOrderDataTable;
use App\DataTables\processedOrderDataTable;
use App\DataTables\droppedOffOrderDataTable;
use App\DataTables\outForDeliveryOrderDataTable;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.index');
    }

    /**
     * pending orders
     */
    public function pendingOrders(PendingOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.pending-order');
    }

    public function processedOrders(processedOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.processed-order');
    }

    public function droppedOffOrders(droppedOffOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.dropped-off');
    }

    public function shippedOrders(shippedOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.shipped-order');
    }

    public function outForDelivery(outForDeliveryOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.out-for-delivery-order');
    }

    public function deliveredOrders(deliveredOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.delivered-orders');
    }

    public function cancelledOrders(cancelledOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.cancelled-orders');
    }








    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        //delete order product
        $order->orderProducts()->delete();
        //delete transaction
        $order->transaction()->delete();
        //delete order
        $order->delete();

        return response(['status'=>'success', 'message'=> 'Deleted Successfully']);

    }

    public function changeOrderStatus(Request $request){

        $order = Order::findOrFail($request->id);
        $order->order_status = $request->status;
        $order->save();

        return response(['status'=>'success', 'message'=>'Updated Order Status']);
    }

    public function changePaymentStatus(Request $request){
        $paymentStatus = Order::findOrFail($request->id);
        $paymentStatus->payment_status = $request->status;
        $paymentStatus->save();

        return response(['status'=>'success', 'message'=>'Updated Payment Status']);
    }
}
