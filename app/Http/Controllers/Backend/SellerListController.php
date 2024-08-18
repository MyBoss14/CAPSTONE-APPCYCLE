<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\SellerListDataTable;

class SellerListController extends Controller
{
    public function index(SellerListDataTable $dataTable){
        return $dataTable->render('admin.seller-list.index');
    }
    public function changeStatus(Request $request){
        $customer = User::findOrFail($request->id);
        $customer->status = $request->status== 'true' ? 'active' : 'inactive';//string the true since boolean ang mag result
        $customer->save();

        return response(['message'=>'Status Updated']);
    }
}
