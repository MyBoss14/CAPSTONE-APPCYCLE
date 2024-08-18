<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\CustomerListDataTable;

class CustomerListController extends Controller
{
    public function index(CustomerListDataTable $dataTable){
        return $dataTable->render('admin.customer-list.index');
    }
    public function changeStatus(Request $request){
        $customer = User::findOrFail($request->id);
        $customer->status = $request->status== 'true' ? 'active' : 'inactive';//string the true since boolean ang mag result
        $customer->save();

        return response(['message'=>'Status Updated']);
    }
}
