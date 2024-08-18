<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\UserOrderDataTable;

class UserOrderController extends Controller
{
    public function index(UserOrderDataTable $dataTable)  {

        return $dataTable->render('frontend.dashboard.order.index');

    }

    public function show(string $id){
        $order =Order::findOrFail($id);
        return view('frontend.dashboard.order.show', compact('order'));
    }
}
