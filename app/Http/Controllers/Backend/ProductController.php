<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Category;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Str;
class ProductController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
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
            'video_link'=>['required','url'],
            'is_featured'=>['required'],
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
        $product->is_approved =1;
        $product->seo_title=$request->seo_title;
        $product->seo_description=$request->seo_description;
        $product->save();

        toastr('Creation Success','success');

        return redirect()->route('admin.products.index');

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
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
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
            'is_featured'=>['required'],
            'video_link'=>['required','url'],
            'status'=>['required'],
            'seo_title'=>['nullable','max:200'],
            'seo_description'=>['nullable','max:250'],
            'remark'=>['nullable','max:200'],
        ]);
        $product = Product::findOrFail($id);
        // handle the upload image

        $imagePath= $this->updateImage($request,'image','uploads',$product->thumb_image);


        $product->thumb_image = empty(!$imagePath) ? $imagePath : $product->thumb_image;
        $product->name=$request->name;
        $product->slug=Str::slug($request->name);
        //delete ni ang line para dli ma overwrite ang seller name if mag update
        // $product->seller_id = Auth::user()->seller->id;
        $product->category_id=$request->category;
        $product->qty=$request->qty;
        $product->short_description=$request->short_description;
        $product->long_description=$request->long_description;
        $product->is_featured=$request->is_featured;
        $product->status=$request->status;
        $product->video_link=$request->video_link;
        $product->price=$request->price;
        //delete ni kay may changing feature na sa approve product sa front end ni admin
        // $product->is_approved =1;
        $product->seo_title=$request->seo_title;
        $product->remark =$request->remark;
        $product->seo_description=$request->seo_description;
        $product->save();

        toastr('Update Success','success');

        return redirect()->route('admin.products.index');
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

    public function changeFeature(Request $request){
        $product = Product::findOrFail($request->id);
        $product->is_featured = $request->feature== 'true' ? 1 : 0;//string the true since boolean ang mag result
        $product->save();

        return response(['message'=>'Feature Updated']);
    }


}
