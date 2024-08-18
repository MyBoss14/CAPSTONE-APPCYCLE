<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\DataTables\SellerProductDataTable;
use App\DataTables\SellerTransactionDataTable;
use App\DataTables\SellerDisapprovedProductDataTable;
Use Str;
class SellerProductController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(SellerProductDataTable $dataTable)
    {
        return $dataTable->render('seller.product.index');

    }
    // transaction
    public function transaction(SellerTransactionDataTable $dataTable){
        return $dataTable->render('seller.transaction.index');
    }

    // transaction filter
    public function filter(Request $request, SellerTransactionDataTable $dataTable) {
        // Store old input values in session flash data
        $request->session()->flashInput($request->input());

        $start_date=$request->start_date;
        $end_date = $request->end_date;

        // Make sure dates are properly formatted for MySQL
        $start_date = date('Y-m-d', strtotime($start_date));
        $end_date = date('Y-m-d', strtotime($end_date));

        // Filter transactions based on date range
        $transactions = Transaction::whereDate('created_at', '>=', $start_date)
                                    ->whereDate('created_at', '<=', $end_date)
                                    ->get();

        // Pass the filtered transactions to the view
        return $dataTable->render('seller.transaction.index', compact('transactions'));

     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('seller.product.create', compact('categories'));
    }

    public function createWithAi()
    {
        $categories = Category::all();

        return view('seller.product.create-with-ai', compact('categories'));
    }

    // store with AI

    public function storeWithAI(Request $request)
    {


        $request->validate([
            'image' =>['required','image','max:3000'],
            'name'=>['required','max:200'],
            'category'=>['required'],
            'price'=>['required'],
            'qty'=>['required'],
            'short_description'=> ['required', 'max:600'],
            'long_description'=> ['required'],
            'is_featured'=>['nullable'],
            'video_link'=>['required','url'],
            'status'=>['required'],
            'seo_title'=>['nullable','max:200'],
            'seo_description'=>['nullable','max:250']

        ]);

        // handle the upload image

        $imagePath= $this->uploadImage($request,'image','uploads');


        $product = new Product();
        $product->thumb_image = $imagePath;
        $product->name=$request->name;
        $product->slug=Str::slug($request->name);
        $product->seller_id = Auth::user()->seller->id;
        $product->category_id=$request->category;
        $product->qty=$request->qty;
        $product->short_description=$request->short_description;
        $product->long_description=$request->long_description;
        $product->is_featured=$request->is_featured;
        $product->status=$request->status;
        $product->video_link=$request->video_link;
        $product->price=$request->price;
        $product->is_approved =1;
        $product->seo_title=$request->seo_title;
        $product->seo_description=$request->seo_description;
        $product->save();

        toastr('Creation Success','success');

        return redirect()->route('seller.products.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'image' =>['required','image','max:3000'],
            'name'=>['required','max:200'],
            'category'=>['required'],
            'price'=>['required'],
            'qty'=>['required'],
            'short_description'=> ['required', 'max:600'],
            'long_description'=> ['required'],
            'is_featured'=>['nullable'],
            'video_link'=>['required','url'],
            'status'=>['required'],
            'seo_title'=>['nullable','max:200'],
            'seo_description'=>['nullable','max:250'],


        ]);

        // handle the upload image

        $imagePath= $this->uploadImage($request,'image','uploads');


        $product = new Product();
        $product->thumb_image = $imagePath;
        $product->name=$request->name;
        $product->slug=Str::slug($request->name);
        $product->seller_id = Auth::user()->seller->id;
        $product->category_id=$request->category;
        $product->qty=$request->qty;
        $product->short_description=$request->short_description;
        $product->long_description=$request->long_description;
        $product->is_featured=$request->is_featured;
        $product->status=$request->status;
        $product->video_link=$request->video_link;
        $product->price=$request->price;
        $product->is_approved =0; //0 by default,, dri i integrate ang AI if scraps 1 if not then 0
        $product->seo_title=$request->seo_title;
        $product->seo_description=$request->seo_description;
        $product->save();

        toastr('Creation Success','success');

        return redirect()->route('seller.products.index');
    }
    // disapptoved products

    public function editDisapprovedProducts(string $id)
    {
        $product = Product::findOrFail($id);
        //  authentication para ma avoid ang Broken Access Control
        //if dli mag match ang id sa seller ug product e abort
        if($product->seller_id !== Auth::user()->seller->id){
            abort(404);
        }

        $categories = Category::all();
        return view('seller.product.edit-disapproved', compact('product', 'categories'));
    }

    public function updateDisapprovedProducts(Request $request, string $id){

        $request->validate([
            'image' =>['nullable','image','max:3000'],
            'name'=>['required','max:200'],
            'category'=>['required'],
            'price'=>['required'],
            'qty'=>['required'],
            'short_description'=> ['required', 'max:600'],
            'long_description'=> ['required'],
            'is_featured'=>['nullable'],
            'video_link'=>['required','url'],
            'status'=>['required'],
            'seo_title'=>['nullable','max:200'],
            'seo_description'=>['nullable','max:250']
        ]);
        $product = Product::findOrFail($id);

        //  authentication para ma avoid ang Broken Access Control
        //if dli mag match ang id sa seller ug product e abort
        if($product->seller_id !== Auth::user()->seller->id){
            abort(404);
        }
        // handle the upload image
        $imagePath= $this->updateImage($request,'image','uploads',$product->thumb_image);


        $product->thumb_image = empty(!$imagePath) ? $imagePath : $product->thumb_image;
        $product->name=$request->name;
        $product->slug=Str::slug($request->name);
        $product->seller_id = Auth::user()->seller->id;
        $product->category_id=$request->category;
        $product->qty=$request->qty;
        $product->short_description=$request->short_description;
        $product->long_description=$request->long_description;
        $product->is_featured=$request->is_featured;
        $product->status=$request->status;
        $product->video_link=$request->video_link;
        $product->price=$request->price;
        $product->is_approved = 0;
        $product->seo_title=$request->seo_title;
        $product->seo_description=$request->seo_description;
        $product->save();

        toastr('Update Success','success');

        return redirect()->route('seller.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        //  authentication para ma avoid ang Broken Access Control
        //if dli mag match ang id sa seller ug product e abort
        if($product->seller_id !== Auth::user()->seller->id){
            abort(404);
        }

        $categories = Category::all();
        return view('seller.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {



        $request->validate([
            'image' =>['nullable','image','max:3000'],
            'name'=>['required','max:200'],
            'category'=>['required'],
            'price'=>['required'],
            'qty'=>['required'],
            'short_description'=> ['required', 'max:600'],
            'long_description'=> ['required'],
            'is_featured'=>['nullable'],
            'video_link'=>['required','url'],
            'status'=>['required'],
            'seo_title'=>['nullable','max:200'],
            'seo_description'=>['nullable','max:250']
        ]);
        $product = Product::findOrFail($id);

        //  authentication para ma avoid ang Broken Access Control
        //if dli mag match ang id sa seller ug product e abort
        if($product->seller_id !== Auth::user()->seller->id){
            abort(404);
        }
        // handle the upload image
        $imagePath= $this->updateImage($request,'image','uploads',$product->thumb_image);


        $product->thumb_image = empty(!$imagePath) ? $imagePath : $product->thumb_image;
        $product->name=$request->name;
        $product->slug=Str::slug($request->name);
        $product->seller_id = Auth::user()->seller->id;
        $product->category_id=$request->category;
        $product->qty=$request->qty;
        $product->short_description=$request->short_description;
        $product->long_description=$request->long_description;
        $product->is_featured=$request->is_featured;
        $product->status=$request->status;
        $product->video_link=$request->video_link;
        $product->price=$request->price;
        $product->is_approved = $product->is_approved;
        $product->seo_title=$request->seo_title;
        $product->seo_description=$request->seo_description;
        $product->save();

        toastr('Update Success','success');

        return redirect()->route('seller.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findorFail($id);
        $product -> delete();

        return response(['status'=>'success','Deleted Successfully']);
    }

    public function changeStatus(Request $request){
        $product = Product::findOrFail($request->id);
        $product->status = $request->status== 'true' ? 1 : 0;//string the true since boolean ang mag result
        $product->save();

        return response(['message'=>'Status Updated']);
    }

    public function disapproveProducts(SellerDisapprovedProductDataTable $dataTabale){

        return $dataTabale->render('seller.product.disapproved-product');

    }
}
