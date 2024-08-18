<header style="background-color: #4E784F;">
    <div class="container">
        <div class="row">
            <div class="col-2 col-md-1 d-lg-none">
                <div class="wsus__mobile_menu_area">
                    <span class="wsus__mobile_menu_icon"><i class="fal fa-bars"></i></span>
                </div>
            </div>
            <div class="col-md-4 " style="
                margin-top: -10px;
                ">
                <div class="wsus_logo_area d-flex justify-content-center">
                    <a class="" href="javascript:;">
                        <img src="{{asset('frontend/images/logo4.png')}}" alt="logo" class="img-fluid w-100 ">
                    </a>
                </div>
            </div>
            {{-- search engine --}}
            <div class="col-md-4  d-none d-lg-block">
                <div class="wsus__search">
                    <form>
                        {{-- <input type="text" placeholder="Search...">
                        <button type="submit"><i class="far fa-search"></i></button> --}}
                    </form>
                </div>
            </div>

            <div class="col-md-4 ">
                <div class="wsus__call_icon_area flex-row-reverse">
                    {{-- <div class="wsus__call_area">
                        <div class="wsus__call">
                            <i class="fas fa-user-headset"></i>
                        </div>
                        <div class="wsus__call_text">
                            <small style="color:#FFFFFF;">{{$settings->contact_email}}</small>
                            <p>{{$settings->contact_phone}}</p>
                        </div>
                    </div> --}}
                    <ul class="wsus__icon_area mx-xl-5">
                        <li>
                            <a class="wsus__cart_icon" href="#" id="cartLink">
                                <i class="fal fa-shopping-bag"></i>
                                <span id="cart-count">{{Cart::content()->count()}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>


    <div class="wsus__mini_cart">
        <h4>shopping cart <span class="wsus_close_mini_cart"><i class="far fa-times"></i></span></h4>
        <ul class="mini_cart_wrapper">

            @foreach (Cart::content() as $sideBarCart)
            <li id="mini_cart_{{$sideBarCart->rowId}}">
                <div class="wsus__cart_img">
                    <a href="#"><img src="{{asset($sideBarCart->options->image)}}" alt="product" class="img-fluid w-100"></a>
                    <a class="wsis__del_icon" href="{{route('product-detail', $sideBarCart->options->slug)}}"><i class="fas fa-minus-circle remove_sidebar_product" data-id="{{$sideBarCart->rowId}}"></i></a>
                </div>
                <div class="wsus__cart_text">
                    <a class="wsus__cart_title" href="{{route('product-detail', $sideBarCart->options->slug)}}">{{$sideBarCart->name}}</a>
                    <p>{{$settings->currency_icon}} {{$sideBarCart->price}}</p>
                </div>
            </li>
            @endforeach

            @if (Cart::content()->count() == 0)
                <li class="text-center"><code>Your Cart is Empty!</code></li>
            @endif


        </ul>
        <div class="mini_cart_actions {{Cart::content()->count() == 0 ? 'd-none' : ''}} ">
            <h5>sub total <span id="mini_cart_subtotal"></span></h5>
            <div class="wsus__minicart_btn_area">
                <a class="common_btn" href="{{route('cart-details')}}">view cart</a>

            </div>
        </div>

</header>


