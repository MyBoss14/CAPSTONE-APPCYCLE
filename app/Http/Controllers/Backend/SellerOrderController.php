<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\SellerOrderDataTable;

class SellerOrderController extends Controller
{
    public function index(SellerOrderDataTable $dataTable){

        return $dataTable->render('seller.order.index');
    }

    public function show(string $id) {
        $order = Order::with(['user'])->findOrFail($id); //load user and order table
        return view('seller.order.show', compact('order'));
    }

    public function orderStatus(Request $request,string $id)
    {
        $order = Order::findOrFail($id);
        $order->order_status = $request->status;
        $order->save();

        toastr('Status Updated Successfully!','success', 'Success');
        return redirect()->back();
    }
}
