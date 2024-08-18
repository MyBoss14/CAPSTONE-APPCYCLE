<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Models\ProductImageGallery;
use App\Http\Controllers\Controller;
use App\DataTables\ProductImageGalleryDataTable;

class ProductImageGalleryController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ProductImageGalleryDataTable $dataTable)
    {
        $product = Product::findOrFail($request->product); //grabbing the product value
        return $dataTable->render('admin.product.image-gallery.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>['required','image', 'max:2048'] //user image.*if multiple image ang e appload nako
        ]);

        // handle sa multiple upload if needed
        // $imagePaths = $this->uploadMultiImage($request, 'image', 'uploads');

        // foreach($imagePaths as $path){
        //     $productImageGallery = new ProductImageGallery();
        //     $productImageGallery->image = $path;
        //     $productImageGallery->product_id = $request->product;
        //     $productImageGallery->save();
        // }

        // ari gamiton for single upload
        $imagePaths= $this->uploadImage($request,'image','uploads');

            $productImageGallery = new ProductImageGallery();
            $productImageGallery->image = $imagePaths;
            $productImageGallery->product_id = $request->product;
            $productImageGallery->save();

        toastr('Uploaded Successfully', 'success');
        return  redirect()->back();
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
        $imageGallery = ProductImageGallery::findOrFail($id);

        $this->deleteImage($imageGallery->image);
        $imageGallery->delete();

        return response(['status' => 'success','message'=>'Deleted Successfully']);
    }
}
