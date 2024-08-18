<?php

namespace App\Http\Controllers\Backend;

use App\Models\Seller;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SellerShopProfileController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Seller::where('user_id', Auth::user()->id)->first();
        return view('seller.seller-profile.index', compact('profile'));
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
            'banner'=>['nullable','image','max:3000'],
            'shop_name'=>['required','max:200'],
            'phone'=>['required','max:50'],
            'email'=>['required','email','max:200'],
            'address'=>['required'],
            'description'=>['required'],
            'fb_link'=>['nullable','url'],
            'tw_link'=>['nullable','url'],

        ]);

        $seller = Seller::where('user_id', Auth::user()->id)->first();
        $bannerPath=$this->updateImage($request, 'banner','uploads', $seller->banner);
        $seller->banner=empty(!$bannerPath) ? $bannerPath : $seller->banner;
        $seller->shop_name=$request->shop_name;
        $seller->phone=$request->phone;
        $seller->email=$request->email;
        $seller->address=$request->address;
        $seller->description=$request->description;
        $seller->fb_link=$request->fb_link;
        $seller->tw_link=$request->tw_link;
        $seller->save();
        toastr('Updated Successfully','success');
        return redirect()->back();
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
        //
    }
}
