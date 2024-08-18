<script>
    $(document).ready(function(){

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

            });
            // add product cart
            $('.shopping-cart-form').on('submit', function(e){
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    method:'POST',
                    data:formData,
                    url:'{{route('add-to-cart')}}',

                    success:function(data){
                        getCartCount()
                        fetchSideBarCartProducts()
                        $('.mini_cart_actions').removeClass('d-none');
                        toastr.success(data.message);

                    },
                    error:function(data){

                    }
                })
            })

            function getCartCount(){
                $.ajax({
                    method:'Get',
                    url:"{{route('cart-count')}}",

                    success:function(data){
                        $('#cart-count').text(data);

                    },
                    error:function(data){

                    }
                })
            }

            function fetchSideBarCartProducts(){
                $.ajax({
                    method:'get',

                    url:"{{route('cart-products')}}",

                    success:function(data){
                        console.log(data);
                        $('.mini_cart_wrapper').html("");
                        var html = '';
                        for(let item in data){
                            let product = data[item];
                            html +=`
                            <li id="mini_cart_${product.rowId}">
                                <div class="wsus__cart_img">
                                    <a href="{{url('product-detail')}}/${product.options.slug}"><img src="{{asset('/')}}${product.options.image}" alt="product" class="img-fluid w-100"></a>
                                    <a class="wsis__del_icon remove_sidebar_product" data-id="${product.rowId}" href=""><i class="fas fa-minus-circle"></i></a>
                                </div>
                                <div class="wsus__cart_text">
                                    <a class="wsus__cart_title" href="{{url('product-detail')}}/${product.options.slug}">${product.name}</a>
                                    <p>{{$settings->currency_icon}}${product.price}</p>
                                </div>
                            </li>
                            `
                        }
                        $('.mini_cart_wrapper').html(html);

                        getSideBarCartSubTotal();

                    },
                    error:function(data){

                    }
                })
            }

            // remove from cart sidebar
            $('body').on('click', '.remove_sidebar_product', function(e){
                e.preventDefault()
                let rowId = $(this).data('id');

                $.ajax({
                    method:'POST',
                    url:"{{route('cart.remove-sidebar-products')}}",
                    data:{
                        rowId: rowId
                    },

                    success:function(data){
                        let productId = '#mini_cart_'+rowId;
                        $(productId).remove()
                        if($('.mini_cart_wrapper').find('li').length == 0){
                            $('.mini_cart_actions').addClass('d-none');
                            $('.mini_cart_wrapper').html('<li class="text-center"><code>Your Cart is Empty!</code></li>');
                        }
                        toastr.success(data.message)

                    },
                    error:function(data){

        }
    })

})

// Side cart total price

            function getSideBarCartSubTotal(){
                $.ajax({
                    method:'GET',
                    url:"{{route('cart.sidebar-products-total')}}",

                    success:function(data){
                        $('#mini_cart_subtotal').text("{{$settings->currency_icon}}"+data);
                    },
                    error:function(data){

                    }
                })
            }



            })

</script>
