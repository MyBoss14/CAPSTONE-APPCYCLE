<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Seller;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserSellerRequestController extends Controller
{
    use ImageUploadTrait;
    public function index(){
        return view('frontend.dashboard.seller-request.index');
    }

    public function create(Request $request){
        $request->validate([
            'shop_image'=>['required', 'image', 'max:3000'],
            'shop_name'=>['required', 'max:3000'],
            'shop_email'=>['required','email'],
            'shop_phone'=>['required', 'max:200'],
            'shop_address'=>['required'],
            'about'=>['required']
        ]);

        if(Auth::user()->role == 'seller'){
            return redirect()->back();
        }

        $imagePath = $this->uploadImage($request, 'shop_image', 'uploads');

        $seller = new Seller();

        $seller->banner = $imagePath;
        $seller->phone =$request->shop_phone;
        $seller->email =$request->shop_email;
        $seller->address =$request->shop_address;
        $seller->description =$request->about;
        $seller->shop_name =$request->shop_name;
        $seller->user_id =Auth::user()->id;
        $seller->status= 0;

        $seller->save();

        toastr('Success . Wait for approval', 'success','Success');
        return redirect()->back();
    }
}
