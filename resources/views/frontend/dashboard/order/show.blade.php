@php
    $address = json_decode($order->order_address);
    $shipping = json_decode($order->shipping_method);
@endphp

@extends('frontend.dashboard.layouts.master')
@section('title')
{{$settings->site_name}} || Orders
@endsection
@section('content')

<section id="wsus__dashboard">
    <div class="container-fluid">
      @include('frontend.dashboard.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> Order Details</h3>
            <div class="wsus__dashboard_profile">


                <!--============================
                    INVOICE PAGE START
                ==============================-->
                <section id="" class="">
                    <div class="invoice-print">
                        <div class="wsus__invoice_area">
                            <div class="wsus__invoice_header">
                                <div class="wsus__invoice_content">
                                    <div class="row">
                                        <div class="col-xl-4 col-md-4 mb-5 mb-md-0">
                                            <div class="wsus__invoice_single">
                                                <h5>Billing Information</h5>
                                                <b>Name: </b><p>{{$address->name}}</p>
                                                <b>Email: </b><p>{{$address->email}}</p>
                                                <b>Phone: </b><p>{{$address->phone}}</p>
                                                <b>address: </b><p>{{$address->address}}, {{$address->city}}, {{$address->zip}}
                                                </p>
                                                <p>{{$address->country}}</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4 mb-5 mb-md-0">
                                            <div class="wsus__invoice_single text-md-center">
                                                <h5>shipping information</h5>
                                                <b>Name: </b><p>{{$address->name}}</p>
                                                <b>Email: </b><p>{{$address->email}}</p>
                                                <b>Phone: </b><p>{{$address->phone}}</p>
                                                <b>address: </b><p>{{$address->address}}, {{$address->city}}, {{$address->zip}}
                                                </p>
                                                <p>{{$address->country}}</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4">
                                            <div class="wsus__invoice_single text-md-end">
                                                <h5>Order id: #{{$order->invoice_id}}</h5>
                                                <h6>order status: <p>{{config('order_status.order_status_admin')[$order->order_status]['status']}}</p></h6>
                                                <h6>Payment Method: <p>{{$order->payment_method}}</p></h6>
                                                <h6>Payment status: <p>{{$order->payment_status}}</p></h6>
                                                <h6>Transaction id: <p>{{$order->transaction->transaction_id}}</p></h6>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wsus__invoice_description">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th class="name">
                                                    product
                                                </th>

                                                <th class="amount">
                                                    Seller
                                                </th>

                                                <th class="amount">
                                                    amount
                                                </th>

                                                <th class="quentity">
                                                    quentity
                                                </th>
                                                <th class="total">
                                                    total
                                                </th>
                                            </tr>

                                            @foreach ($order->orderProducts as $product )

                                                @php
                                                    $category = json_decode($product->category);

                                                @endphp
                                                <tr>
                                                    <td class="name">
                                                        <p>{{$product->product_name}}</p>
                                                        <span>category : {{$category}}</span>

                                                    </td>
                                                    <td class="amount">
                                                        {{$product->seller->shop_name}}
                                                    </td>
                                                    <td class="amount">
                                                        {{$settings->currency_icon}}{{$product->unit_price}}
                                                    </td>

                                                    <td class="quentity">
                                                        {{$product->qty}}
                                                    </td>
                                                    <td class="total">
                                                        {{$settings->currency_icon}}{{$product->unit_price*$product->qty}}
                                                    </td>
                                                </tr>

                                            @endforeach



                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="wsus__invoice_footer">

                                <p><span>Sub Amount:</span>{{$settings->currency_icon}} {{$order->sub_total}} </p>
                                <p><span>Shipping Fee (+):</span>{{$settings->currency_icon}}{{$shipping->cost}}  </p>
                                <p><span>Total Amount:</span>{{$settings->currency_icon}}{{$order->amount}}  </p>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="">
                    <div class="mt-3 float-end">
                        <button class="btn btn-warning print_invoice"> print</button>
                    </div>
                </div>
                <!--============================
                    INVOICE PAGE END
                ==============================-->


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
@push('scripts')
<script>
    $('.print_invoice').on('click', function(){
                let printBody =$('.invoice-print');
                let originalContents = $('body').html();

                $('body').html(printBody.html());

                window.print();

                $('body').html(originalContents);
            })
</script>

@endpush


