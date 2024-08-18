<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\FlashSaleItem;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){

        $sliders = Slider::where('status',1)->orderBy('serial', 'asc')->get();
        $flashSaleItems = FlashSaleItem::where('show_at_home', 1)->where('status',1)->get();




        return view('frontend.home.home',
        // pass this variable sa front end
        compact(
            'sliders',
            'flashSaleItems'
        )
    );
    }
}
