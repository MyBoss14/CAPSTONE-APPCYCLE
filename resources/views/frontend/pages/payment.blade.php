@extends('frontend.home.layout.master')

@section('title')
{{$settings->site_name}} || Payment
@endsection
@section('content')
    <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>payment</h4>
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>

                            <li><a href="javascript:;">payment</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        PAYMENT PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <div class="wsus__pay_info_area">
                <div class="row">
                    <div class="col-md-6">
                        <div class="wsus__pay_booking_summary mb-5" id="sticky_sidebar2">
                            @php
                                $cartItems = Cart::content();
                                $product = App\Models\Product::with(['seller','category'])->first();
                            @endphp


                            <h5>Order Summary</h5>
                            <p>subtotal: <span>{{$settings->currency_icon}}{{getCartTotal()}}</span></p>
                            <p>Delivery fee(+): <span>{{$settings->currency_icon}}{{getShippingFee()}}</span></p>

                            <h6>total <span>{{$settings->currency_icon}}{{getTotalPayable()}}</span></h6>
                            @foreach ($cartItems as $cartItem)

                            <p><span><b>Item details</b></span></p>
                            <p><span>Item :</span>{!!$cartItem->name!!}</p>
                            <p> <span>Category : </span>{!!$cartItem->options->category!!}</p>
                            <p> <span>Price :</span> {!!$settings->currency_icon.$cartItem->price!!}</p>
                            <p> <span>Qty :</span> {!!$cartItem->qty!!}</p>
                            <p>Delivery fee(+): <span>{{$settings->currency_icon}}{{getShippingFee()}}</span></p>
                            <p><span>TOTAL :</span> {!! $settings->currency_icon . ($cartItem->price * $cartItem->qty + getShippingFee()) !!}

                            </p>

                            <p> <span>Payment Method : </span>---</p>
                            <p> <span>Payment Status : </span>---</p>
                            <p><span>Address:</span> {{ session('address')->address }}, <br> {{ session('address')->city }}, {{ session('address')->zip }}, <br>{{ session('address')->country }}</p>
                            <br>
                            <p><span><b>Shop info</b></span></p>
                            <p<span>Store Name:</span> {{$product->seller->shop_name}}</p>
                            <p><span>Address:</span>{{$product->seller->address}}</p>
                            <p><span>Phone:</span> {{$product->seller->phone}}</p>
                            <p><span>mail:</span> {{$product->seller->email}}</p>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="col-md-12 mb-5">
                            <div class="wsus__payment_menu" id="sticky_sidebar">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">

                                        <button class="nav-link common_btn active" id="v-pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-paypal" type="button" role="tab" aria-controls="v-pills-paypal"
                                        aria-selected="true">Paypal</button>


                                    <button class="nav-link common_btn" id="v-pills-settings-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-settings" type="button" role="tab"
                                        aria-controls="v-pills-settings" aria-selected="false">Cash on Delivery</button>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="tab-content" id="v-pills-tabContent" id="sticky_sidebar">




                                <div class="tab-pane fade show active" id="v-pills-paypal" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">
                                    <div class="row">
                                        <div class="col-xl-12 m-auto">
                                            <div class="wsus__pay_booking_summary">


                                                <p> <span>Payment Method : </span>Paypal</p>
                                                <p> <span>Payment Status : </span>payment status will be <b>PAID</b> if you use paypal</p>
                                                <br>
                                                <a
                                                 href="{{route('user.paypal.payment')}}"
                                                class="nav-link text-center common_btn"> Pay with Paypal</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                    <div class="row">
                                        <div class="col-xl-12 m-auto">
                                            <div class="wsus__pay_booking_summary">
                                                <p> <span>Payment Method : </span>COD</p>
                                                <p> <span>Payment Status : </span>payment status will be <b>PENDING</b> if you use COD</p>
                                                <p><span></span>The status will be marked as 'paid' once the item is paid for</p>
                                                <br>
                                                <a
                                                 href="{{route('user.cod.payment')}}"
                                                class="nav-link text-center common_btn"> Cash on Delivery</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </section>
    <!--============================
        PAYMENT PAGE END
    ==============================-->
@endsection


