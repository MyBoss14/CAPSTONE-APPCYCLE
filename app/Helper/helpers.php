<?php

// function in here are acceessible all of the project file

// sidebar active element

function setActive(array $route){
    if(is_array($route)){
        foreach($route as $r){
            if(request()->routeIs($r)){
                return 'active';
            }

        }
    }
}

// get total cart amount

function getCartTotal(){
    $total=0;
    foreach(Cart::content() as $product){
        $total +=($product->price*$product->qty);
    }
    return $total;

}

// get selected shipping fee in session

function getShippingFee(){
    if(Session::has('shipping_method')){
        return Session::get('shipping_method')['cost'];
    }else {
        return 0;
    }
}
// total payment payable

function getTotalPayable(){
    return getShippingFee() + getCartTotal();
}
