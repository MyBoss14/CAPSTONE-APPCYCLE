<?php

namespace App\Http\Controllers\Frontend;

use Cart;
use App\Models\Product;
use App\Models\UserAddress;
use App\Models\ShippingRule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{
    // check out

    public function index(){

        $cartItems = Cart::content();
        $product = Product::with(['seller','category'])->first();


        $addresses = UserAddress::where('user_id', Auth::user()->id)->get();
        $shippingMethods = ShippingRule::where('status',1)->get();
        return view('frontend.pages.checkout', compact('addresses','shippingMethods','cartItems','product'));
    }

    public function createAddress(Request $request){
        $request->validate([
            'name'=>['required','max:200'],
            'email'=>['required','max:200','email'],
            'phone'=>['required','max:200'],
            'country'=>['required','max:200'],
            'city'=>['required','max:200'],
            'zip'=>['required','integer'],
            'address'=>['required'],
        ]);

        $address = new UserAddress;
        $address->user_id= Auth::user()->id;
        $address->name=$request->name;
        $address->email=$request->email;
        $address->phone=$request->phone;
        $address->country=$request->country;
        $address->city=$request->city;
        $address->zip=$request->zip;
        $address->address=$request->address;
        $address->save();

        toastr('Address Added Successfully');

        return redirect()->back();
    }

    public function checkOutFormSubmit(Request $request){


        $request->validate([
            'shipping_method_id'=>['required','integer'],
            'shipping_address_id'=>['required','integer'],

        ]);

        $shippingMethod = ShippingRule::findOrFail($request->shipping_method_id);
        if($shippingMethod){
            Session::put('shipping_method', [
                'id'=>$shippingMethod->id,
                'name'=>$shippingMethod->name,
                'type'=>$shippingMethod->type,
                'cost'=>$shippingMethod->cost
            ]);
        }



        $address = UserAddress::findOrFail($request->shipping_address_id);
        if($address){
            Session::put('address', $address);
        }


        return response(['status'=>'success', 'redirect_url'=>route('user.payment')]);

    }
}
