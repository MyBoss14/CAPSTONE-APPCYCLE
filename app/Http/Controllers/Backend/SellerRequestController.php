<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\SellerRequestDataTable;

class SellerRequestController extends Controller
{
    public function index(SellerRequestDataTable $dataTable){

        return $dataTable->render('admin.seller-request.index');
    }

    public function show(string $id){
        $seller = Seller::findOrFail($id);
        return view('admin.seller-request.show', compact('seller'));
    }

    public function changeStatus(Request $request, string $id){
        $seller = Seller::findOrFail($id);
        $seller->status =$request->status;
        $seller->save();

        $user = User::findOrFail($seller->user_id);
        $user->role = 'seller';
        $user->save();

        toastr('Status Updated!');
        return redirect()->route('admin.seller-request.index');

    }
}
