<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\DisapproveProductsDataTable;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\PendingProductsDataTable;
use App\DataTables\SellerSProductsDataTable;

class SellerSProductController extends Controller
{
    public function index(SellerSProductsDataTable $dataTable){

        return $dataTable->render('admin.product.sellers-product.index');
    }

    public function pendingProducts(PendingProductsDataTable $dataTable){
        return $dataTable->render('admin.product.pending-product.index');

    }

    public function changeApproveStatus(Request $request){
        $product = Product::findOrFail($request->id);
        $product->is_approved = $request->value;
        $product->save();

        return response(['message'=>'Approve Status change successfully']);


    }

    public function disapprovedProducts(DisapproveProductsDataTable $dataTable){

        return $dataTable->render('admin.product.disapproved-product.index');

    }
    public function disapprovedProductsRemark(string $id){
        $product = Product::findOrFail($id);

        return view('admin.product.disapproved-product.remark', compact('product'));
    }

    public function productRemark(Request $request, $productId){


        $product = Product::findOrFail($productId);

        // Update the attributes
        $product->is_approved = $request->is_approved;
        $product->remark = $request->remark;

        // Save the changes
        $product->save();
        toastr('Approve status changed!', 'REMARK SENT', 'success');
        return redirect()->route('admin.disapproved-product.index');

    }
}
