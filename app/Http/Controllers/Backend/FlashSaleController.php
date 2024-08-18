<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\FlashSale;
use Illuminate\Http\Request;
use App\Models\FlashSaleItem;
use App\Http\Controllers\Controller;
use App\DataTables\FlashSaleItemDataTable;

class FlashSaleController extends Controller
{
    public function index(FlashSaleItemDataTable $dataTable){
        $flashSaleDate = FlashSale::first();
        //only get the approved and status is on na product
        $products = Product::where('is_approved', 1)->where('status',1)->orderBy('id','DESC')->get();
        return $dataTable->render('admin.flash-sale.index', compact('flashSaleDate','products'));
    }

    public function update(Request $request){

        $request->validate([
            'end_date'=>['required']

        ]);

        FlashSale::updateOrCreate([
            'id'=>1
        ],
        ['end_date'=>$request->end_date]
    );

    toastr('Updated Successfully!');
    return redirect()->back();


    }

    public function addProduct(Request $request){
        $request->validate([
            'product'=>['required','unique:flash_sale_items,product_id'],
            'show_at_home'=>['required'],
            'status'=>['required']
        ],[
            // custom error
            'product.unique'=>'The product is ALREADY FEATURED!'
        ]);
        $flashSaleDate = FlashSale::first();

        $flashSaleItem = new FlashSaleItem();
        $flashSaleItem->product_id=$request->product;
        $flashSaleItem->flash_sale_id = $flashSaleDate->id;
        $flashSaleItem->show_at_home = $request->show_at_home;
        $flashSaleItem->status = $request->status;
        $flashSaleItem->save();

        toastr('Product Added Successfully');
        return redirect()->back();
    }

    public function changeShowAtHomeStatus(Request $request){
        $product = FlashSaleItem::findOrFail($request->id);
        $product->show_at_home = $request->status== 'true' ? 1 : 0;//string the true since boolean ang mag result
        $product->save();

        return response(['message'=>'Show at Home Status Updated']);
    }

    public function changeStatus(Request $request){
        $product = FlashSaleItem::findOrFail($request->id);
        $product->status = $request->status== 'true' ? 1 : 0;//string the true since boolean ang mag result
        $product->save();

        return response(['message'=>' Featured Product Status  Updated']);

    }

    public function destroy(string $id)
    {
        $product = FlashSaleItem::findorFail($id);
        $product -> delete();

        return response(['status'=>'success','Deleted Successfully']);
    }
}
