@extends('frontend.home.layout.master')

@section('title')
{{$settings->site_name}} || Check Out
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
                        <h4>check out</h4>
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>

                            <li><a href="javascript:;">check out</a></li>
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
        CHECK OUT PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container ">

                <div class="row">
                    <div class="col-md-12 mb-5" style="
                    margin-left: 10%;
                ">
                        <div class="wsus__check_form  col-md-10 ">
                            <h5 class="text-center mb-0">Order Details:</h5> <br>


                                <div class="row ">
                                    @foreach ($cartItems as $cartItem)
                                        <div class="wsus__checkout_single_address col-md-12 " style="border:;">
                                            <ul>
                                                <li><span><b>Item details</b></span></li>
                                                <li><span>Item :</span>{!!$cartItem->name!!} </li>
                                                <li><span>Price :</span> {!!$settings->currency_icon.$cartItem->price!!} </li>
                                                <li><span>Qty :</span> {!!$cartItem->qty!!} </li>
                                                <li><span>Subtotal :</span> {!!$settings->currency_icon.$cartItem->price*$cartItem->qty!!} </li>
                                                <li><span>Category : </span>{!!$cartItem->options->category!!} </li>
                                                <li><span>Payment Method : </span>---</li>
                                                <li><span>Payment Status : </span>---</li>
                                                <li><span>Address : </span> (select billing address)</li>
                                                <br>
                                                <li><span><b>Shop info</b></span></li>
                                                <li><span>Store Name:</span> {{$product->seller->shop_name}}</li>
                                                <li><span>Address:</span>{{$product->seller->address}}</li>
                                                <li><span>Phone:</span> {{$product->seller->phone}}</li>
                                                <li><span>mail:</span> {{$product->seller->email}}</li>
                                            </ul>
                                        </div>

                                    @endforeach
                                </div>






                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="wsus__check_form ">
                            <h5>Billing Details <br> <a class="btn btn-primary mt-3" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" >add
                                    new address</a></h5>

                            <div class="row">
                                @foreach ($addresses as $address)
                                <div class="col-xl-6">
                                    <div class="wsus__checkout_single_address">
                                        <div class="form-check">
                                            <input class="form-check-input shipping_address " type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1" data-id="{{$address->id}}">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Select Address
                                            </label>
                                        </div>
                                        <ul>
                                            <li><span>Name :</span> {{$address->name}}</li>
                                            <li><span>Phone :</span> {{$address->phone}}</li>
                                            <li><span>Email :</span> {{$address->email}}</li>
                                            <li><span>Country :</span> {{$address->country}}</li>
                                            <li><span>City :</span> {{$address->city}}</li>
                                            <li><span>Zip Code :</span> {{$address->zip}}</li>

                                            <li><span>Address :</span> {{$address->address}}</li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach


                            </div>

                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="wsus__order_details" id="sticky_sidebar">
                            <p class="wsus__product">shipping Details</p>
                            @foreach ($shippingMethods as $method)
                                @if ($method->type == 'min_cost' && getCartTotal() >= $method->min_cost)
                                <div class="form-check">
                                    <input class="form-check-input shipping_method" type="radio" name="exampleRadios" id="exampleRadios2"
                                        value="{{$method->id}}" data-id="{{$method->cost}}">
                                    <label class="form-check-label" for="exampleRadios2">
                                        {{$method->name}}
                                        <span>cost: ({{$settings->currency_icon}}{{$method->cost}}) </span>
                                    </label>
                                </div>
                                @elseif ($method->type == 'flat_cost')
                                <div class="form-check">
                                    <input class="form-check-input shipping_method" type="radio" name="exampleRadios" id="exampleRadios2"
                                        value="{{$method->id}}" data-id="{{$method->cost}}">
                                    <label class="form-check-label" for="exampleRadios2">
                                        {{$method->name}}
                                        <span>cost: ({{$settings->currency_icon}}{{$method->cost}}) </span>
                                    </label>
                                </div>
                                @endif

                            @endforeach


                            <div class="wsus__order_details_summery">
                                <p>subtotal: <span>{{$settings->currency_icon}}{{getCartTotal()}}</span></p>
                                <p>Delivery fee(+): <span id="shipping_fee">{{$settings->currency_icon}}</span></p>

                                <p><b>total:</b> <span><b id="total_amount" data-id="{{getCartTotal()}}">{{$settings->currency_icon}}{{getCartTotal()+getCartTotal()}}</b></span></p>
                            </div>
                            <div class="terms_area">
                                <div class="form-check">
                                    <input class="form-check-input agree_term" type="checkbox" value="" id="flexCheckChecked3"
                                        >
                                    <label class="form-check-label" for="flexCheckChecked3">
                                        I have read and agreed to the website <a href="{{route('terms-and-conditions')}}">terms and conditions *</a>
                                    </label>
                                </div>
                            </div>
                            <form action="" id="checkOutForm">
                                <input type="hidden" name="shipping_method_id" value="" id="shipping_method_id">
                                <input type="hidden" name="shipping_address_id" value="" id="shipping_address_id">
                            </form>
                            <a href="#" id="submitCheckoutForm" class="common_btn">Place Order</a>
                        </div>
                    </div>
                </div>

        </div>
    </section>

    <div class="wsus__popup_address">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title " id="exampleModalLabel">add new address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="wsus__check_form p-3">
                            <div class="row">
                                <form action="{{route('user.checkout.create-address')}}" method="POST" class="row">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="wsus__check_single_form">
                                            <input name="name" type="text" placeholder="Name" value="{{old('name')}}">
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input name="phone" type="text" placeholder="Phone *" value="{{old('phone')}}" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input name="email" type="email" placeholder="Email *" value="{{old('email')}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <select class="select_2" name="country" >
                                                <option selected>Philippines</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input name="city" type="text" placeholder="Town / City *" value="{{old('city')}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input name="zip" type="text" placeholder="Zip *" value="{{old('zip')}}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="wsus__check_single_form">
                                            <input name="address" type="text" placeholder="Address" value="{{old('address')}}">
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="wsus__check_single_form">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
        $('#shipping_address_id').val("");
        $('#shipping_method_id').val("");
        $('input[type="readio"]').prop('checked', false);


        $('.shipping_method').on('click', function(){
            let shippingFee = $(this).data('id');
            let currentTotalAmount = $('#total_amount').data('id')
            let totalAmount = currentTotalAmount + shippingFee;
            $('#shipping_method_id').val($(this).val());
            $('#shipping_fee').text("{{$settings->currency_icon}}"+$(this).data('id'));
            $('#total_amount').text("{{$settings->currency_icon}}"+totalAmount);

        })
        $('.shipping_address').on('click', function(){
            $('#shipping_address_id').val($(this).data('id'));
        })

        // submit check out form
        // validation
        $('#submitCheckoutForm').on('click', function(e){
            e.preventDefault();
            if($('#shipping_method_id').val()==""){
                toastr.error('Shipping Method is Required!');

            } else if ($('#shipping_address_id').val()=="")
            {
                toastr.error('Shipping Address is Required!');
            }else if(!$('.agree_term').prop('checked'))
            {
                toastr.error('Please Read the Term Agreement!');
            }
            else
            {$.ajax({
                url:"{{route('user.checkout.form-submit')}}",
                method:'POST',
                data:$('#checkOutForm').serialize(), //grab all input and put it all tghe data
                beforeSend: function(){
                    $('#submitCheckoutForm').html('<i class="spinner-border text-light" role="status"></i>')
                },
                success: function(data){
                    if(data.status == 'success'){
                        $('#submitCheckoutForm').text('Success')

                        // redirect to payment page
                        window.location.href = data.redirect_url;
                    }
                },
                error:function(data){
                    console.log(data);
                }
            })
            }
        })
    })
</script>

@endpush


