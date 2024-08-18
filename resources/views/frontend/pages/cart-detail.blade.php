@extends('frontend.home.layout.master')

@section('title')
{{$settings->site_name}} || Cart Detail
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
                        <h4>cart View</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">product</a></li>
                            <li><a href="#">cart view</a></li>
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
        CART VIEW PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="wsus__cart_list">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    {{-- header --}}
                                    <tr class="d-flex">
                                        <th class="wsus__pro_img">
                                            product item
                                        </th>

                                        <th class="wsus__pro_name" style="width: 285px;">
                                            product details
                                        </th>

                                        <th class="wsus__pro_tk">
                                            price
                                        </th>

                                        <th class="wsus__pro_select">
                                            quantity
                                        </th>

                                        <th class="wsus__pro_tk">
                                            Total
                                        </th>

                                        <th class="wsus__pro_icon">
                                            <a href="#" class="common_btn clear_cart">clear cart</a>
                                        </th>
                                    </tr>
                                    {{-- content --}}
                                    @foreach ($cartItems as $item)
                                    <tr class="d-flex">
                                        <td class="wsus__pro_img"><img src="{{asset($item->options->image)}}" alt="product"
                                                class="img-fluid w-100">
                                        </td>

                                        <td class="wsus__pro_name" >
                                            <p>{!!$item->name!!}</p>
                                            <span>{!!$item->options->category!!}</span>

                                        </td>

                                        <td class="wsus__pro_tk">
                                            <h6>{{$settings->currency_icon.$item->price}}</h6>
                                        </td>

                                        <td class="wsus__pro_select ">
                                            <div class="">
                                                <button class="btn btn-warning product-decrement">-</button>
                                                <input style="text-align-last: center ;
                                                height: 35px ;
                                                width: 43px ;"
                                                class="product-qty"
                                                data-rowid="{{$item->rowId}}"
                                                type="text" min="1" value="{{$item->qty}}" />
                                                <button class="btn btn-success product-increment">+</button>
                                            </div>
                                        </td>

                                        <td class="wsus__pro_tk">
                                            <h6 id="{{$item->rowId}}">{{$settings->currency_icon.$item->price * $item->qty}}</h6>
                                        </td>



                                        <td class="wsus__pro_icon">
                                            <a href="{{route('cart.remove-product', $item->rowId)}}"><i class="common_btn ">Remove</i></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                    @if (count($cartItems)==0)
                                        <tr class="d-flex">
                                            <td class="wsus__pro_icon" rowspan="2" style="width: 100%;">
                                                Your Cart is Empty!
                                            </td>
                                        </tr>
                                    @endif


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="wsus__cart_list_footer_button" id="sticky_sidebar">
                        <h6>total cart</h6>
                        <p>subtotal: <span id="sub_total fs-6"> {{$settings->currency_icon}}{{getCartTotal()}}</span></p>
                        <p>Delivery: <span class="text-warning"> go to checkout</span></p>

                        <p class="total"><span>total:</span> <span>---</p>


                        <a class="common_btn mt-4 w-100 text-center" href="{{route('user.checkout')}}" >checkout</a>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
        // add qnty
        $('.product-increment').on('click', function(){
            let input =$(this).siblings('.product-qty');
            let quantity = parseInt(input.val())+1;
            let rowId = input.data('rowid');
            input.val(quantity);


            $.ajax({
                url:"{{route('cart.update-quantity')}}",
                method:'POST',
                data:{
                    rowId:rowId,
                    quantity: quantity
                },
                success: function(data){
                    if(data.status=='success'){
                        let productId='#'+rowId;
                        let totalAmount = "{{$settings->currency_icon}}"+data.product_total;
                        $(productId).text(totalAmount)
                        renderCartSubTotal()

                        toastr.success(data.message)
                        window.location.reload();
                    }
                },
                error: function(data){

                }
            })
        })

        // minus qty
        $('.product-decrement').on('click', function(){
            let input =$(this).siblings('.product-qty');
            let quantity = parseInt(input.val())-1;
            let rowId = input.data('rowid');
            if(quantity <1){
                quantity=1;
            }
            input.val(quantity);


            $.ajax({
                url:"{{route('cart.update-quantity')}}",
                method:'POST',
                data:{
                    rowId:rowId,
                    quantity: quantity
                },
                success: function(data){
                    if(data.status=='success'){
                        let productId='#'+rowId;
                        let totalAmount = "{{$settings->currency_icon}}"+data.product_total;
                        $(productId).text(totalAmount)
                        toastr.success(data.message)
                        window.location.reload();
                    }
                },
                error: function(data){

                }
            })
        })

        // remove all cart
        $('.clear_cart').on('click', function(e){
            e.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to CLEAR your CART?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, clear it!"
                }).then((result) => {
                if (result.isConfirmed) {
                    // route for delete using ajax

                    $.ajax({
                        type: 'get',
                        url: "{{route('clear.cart')}}",

                        success: function(data){
                            if(data.status=='success'){
                                window.location.reload();
                            }

                        },
                        error: function(xhr, status, error){
                            console.log(error);
                        }

                    })






            }
        });

        })


        // get subtotal
        function renderCartSubTotal(){
            $.ajax({
                    method:'GET',
                    url:"{{route('cart.sidebar-products-total')}}",

                    success:function(data){
                        $('#sub_total').text("{{$settings->currency_icon}}"+data);
                    },
                    error:function(data){
                        console.log(data);
                    }
                })
        }

    })
</script>

@endpush
