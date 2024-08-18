@extends('frontend.home.layout.master')

@section('title')
{{$settings->site_name}} || Track Orders
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
                        <h4>order tracking</h4>
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>
                            <li><a href="javascipt:;">order tracking</a></li>
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
        TRACKING ORDER START
    ==============================-->
    <section id="wsus__login_register">
        <div class="container">
            <div class="wsus__track_area">
                <div class="row">
                    <div class="col-xl-5 col-md-10 col-lg-8 m-auto">

                        <form class="tack_form" action="{{route('product-tracking.index')}}" method="GET">

                            <h4 class="text-center">order tracking</h4>
                            <p class="text-center">tracking your order status</p>
                            <div class="wsus__track_input">
                                <label class="d-block mb-2">Invoice id*</label>
                                <input type="text" placeholder="A1130981275" name="tracker" value="{{@$order->invoice_id}}">
                            </div>

                            <button type="submit" class="common_btn">track</button>
                        </form>

                    </div>
                </div>
                @if (isset($order))
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="wsus__track_header">
                                <div class="wsus__track_header_text">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 col-lg-3">
                                            <div class="wsus__track_header_single">
                                                <h5>Order Date:</h5>
                                                <p>{{date('d M Y', strtotime(@$order->created_at))}}</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-lg-3">
                                            <div class="wsus__track_header_single">
                                                <h5>shopping by:</h5>
                                                <p>{{@$order->user->name}}</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-lg-3">
                                            <div class="wsus__track_header_single">
                                                <h5>status:</h5>
                                                <p>{{$order->order_status}}</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-lg-3">
                                            <div class="wsus__track_header_single border_none">
                                                <h5>tracking:</h5>
                                                <p>{{@$order->invoice_id}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <ul class="progtrckr" data-progtrckr-steps="4">

                            @if (@$order->order_status == 'pending')
                            <li class="progtrckr_done icon_one check_mark">Pending</li>
                            @elseif (@$order->order_status == 'cancel')
                                <li class="icon_four red_mark">Order Cancelled</li>
                            @elseif (@$order->order_status == 'processed_and_ready_to_ship')
                                <li class="progtrckr_done icon_one check_mark">Pending</li>
                                <li class="progtrckr_done icon_two check_mark">Item packed and ready for shipment</li>
                            @elseif (@$order->order_status == 'out_for_delivery')
                                <li class="progtrckr_done icon_one check_mark">Pending</li>
                                <li class="progtrckr_done icon_two check_mark">Item received by logistics</li>
                                <li class="progtrckr_done icon_three check_mark">Out for Delivery</li>
                            @elseif (@$order->order_status == 'delivered')
                                <li class="progtrckr_done icon_one check_mark">Pending</li>
                                <li class="progtrckr_done icon_two check_mark">Item received by logistics</li>
                                <li class="progtrckr_done icon_three check_mark">Out for Delivery</li>
                                <li class="progtrckr_done icon_four check_mark">Delivered</li>
                            @elseif (@$order->order_status == 'dropped_off' || @$order->order_status == 'shipped')
                                <li class="progtrckr_done icon_one check_mark">Pending</li>
                                <li class="progtrckr_done icon_two check_mark">Item received by logistics</li>
                            @else
                                <li class="icon_two">Order is being Process</li>
                            @endif




                            </ul>
                        </div>
                        <div class="col-xl-12">
                            <a href="{{url('/')}}" class="common_btn"><i class="fas fa-chevron-left"></i> back to home</a>
                        </div>
                    </div>
                @endif


            </div>
        </div>
    </section>
    <!--============================
        TRACKING ORDER END
    ==============================-->
@endsection


