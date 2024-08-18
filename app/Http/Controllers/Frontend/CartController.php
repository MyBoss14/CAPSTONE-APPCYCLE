<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;

class CartController extends Controller
{

    // cart details page

    public function cartDetails(){
        $cartItems = Cart::content();


        if(count($cartItems)==0){
            toastr('Your Cart is empty', 'warning','Warning');
            return redirect()->route('home');
        }
        foreach($cartItems as $cartItem) {
            $product = Product::findOrFail($cartItem->id);
            if($cartItem->qty > $product->qty) {
                toastr('Quantity of ' . $product->name . ' is greater than available stock:'.$product->qty, 'error', 'Error');
                // Optionally, you can remove the item from the cart if the quantity is greater than available stock.
                Cart::remove($cartItem->rowId);
            }
        }
        // dd($cartItems);
        return view('frontend.pages.cart-detail', compact('cartItems'));
    }

    // add item to cart

    public function addToCart(Request $request){

        $product = Product::findOrFail($request->product_id);
        if($product->qty == 0){
            return response(['status'=>'stock_out','message'=>'Product Out of Stock']);
        }


        $productName = $request->name;
        $price = $request->price;
        $qty = $request->qty;
        $categoryName = $request->category_name;



        $cartData=[];
        $cartData['id']=$product->id;
        $cartData['name']=$productName;
        $cartData['qty']=$qty;
        $cartData['price']=$price*$qty;
        $cartData['weight']=10;
        $cartData['options']['category']=$categoryName;
        $cartData['options']['image']=$product->thumb_image;
        $cartData['options']['slug']=$product->slug;


        // dd($cartData);
        Cart::add($cartData);

        return response(['status'=>'success','message'=>'Item ADDED To CART']);
    }


    // update product qty

    public function updateProductQty(Request $request){
        Cart::update($request->rowId, $request->quantity);
        $productTotal = $this->getProductTotal($request->rowId);

        return response(['status'=>'success','message'=>'Product Quantity Updated', 'product_total'=> $productTotal]);
    }

    // total amount of product
    public function getProductTotal($rowId){
        $product=Cart::get($rowId);
        $total = ($product->price)*$product->qty;
        return $total;
    }

    // sidebar cart total price

    public function cartTotal(){
        $total=0;

        foreach(Cart::content() as $product){
            $total += $this->getProductTotal($product->rowId);


        }

        return $total;
    }
    // remove all cart

    public function clearCart(){
        Cart::destroy();

        return response(['status'=>'success', 'message'=>'Cart CLEARED!']);


    }


    // remove product in cart
    public function removeProduct($rowId){
        Cart::remove($rowId);
            toastr('Product removed!','success','Success');
        return redirect()->back();
    }

    //  get cart count

    public function getCartCount(){
        return Cart::content()->count();
    }


    // get all cart products
    public function getCartProducts(){
        return Cart::content();

    }

    // remove side bar product

    public function removeSideBarProduct(Request $request){
        Cart::remove($request->rowId);

        return response(['status'=>'success','message'=>'Removed Successfully']);
    }





}
