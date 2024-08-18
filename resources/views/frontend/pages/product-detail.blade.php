@extends('frontend.home.layout.master')

@section('title')
{{$settings->site_name}} || Product Detail
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
                        <h4>products details</h4>
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>

                            <li><a href="#">product details</a></li>
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
        PRODUCT DETAILS START
    ==============================-->
    <section id="wsus__product_details">
        <div class="container">
            <div class="wsus__details_bg">
                <div class="row">
                    <div class="col-xl-4 col-md-5 col-lg-5 "  style="z-index:999 !important;">
                        <div id="sticky_pro_zoom">
                            <div class="exzoom hidden" id="exzoom">
                                <div class="exzoom_img_box">
                                    @if ($product->video_link)
                                        <a class="venobox wsus__pro_det_video" data-autoplay="true" data-vbtype="video"
                                            href="{{$product->video_link}}" hidden>
                                            <i class="fas fa-play"></i>
                                        </a>
                                    @endif

                                    <ul class='exzoom_img_ul'>
                                        <li><img class="zoom ing-fluid w-100" src="{{asset($product->thumb_image)}}" alt="product"></li>
                                        @foreach ($product->productImageGalleries as $productGallery)
                                        <li><img class="zoom ing-fluid w-100" src="{{asset($productGallery->image)}}" alt="product"></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="exzoom_nav"></div>
                                <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn"> <i
                                            class="far fa-chevron-left"></i> </a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn"> <i
                                            class="far fa-chevron-right"></i> </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class=" col-xl-7 col-md-7 col-lg-7">
                        <div class="wsus__pro_details_text">
                            <a class="title" href="#">{{$product->name}}</a>
                            <br>
                            <p class="wsus__stock_area"><span class="in_stock">in stock</span>({{$product->qty}})</p>

                            <form action="" class="shopping-cart-form">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <!-- Add hidden input fields for other product attributes -->
                                <input type="hidden" name="name" value="{{ $product->name }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <input type="hidden" name="slug" value="{{ $product->slug }}">
                                <!-- Add more hidden input fields for other attributes as needed -->
                                <h4>{{$settings->currency_icon}}{{$product->price}}</h4>

                                <select name="category_name" id="inputState" class="form-control rounded-pill border-0 " style="margin-left: -10px !important; ">

                                    <option class="" value="{{$product->category->name}}"> <h5>Category :</h5>{{$product->category->name}}</option>

                                </select>
                                <div class="wsus__quentity my-5">
                                    <h5>quantity :</h5>
                                    <div class="select_number">
                                        <input name="qty" class="number_area" type="text" min="1" max="100" value="1" />
                                    </div>
                                    <h3></h3>
                                </div>





                                <ul class="wsus__button_area ">
                                    <li><button type="submit" class="add_cart" href="#" onclick="clickCartLink()">Add to cart</button></li>


                                    <li>
                                        <a href="" class="mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-comment-alt fa-lg" style="color: #188c3e;"></i> chat</a>
                                    </li>





                                </ul>
                            </form>

                            <br>
                            <b>Description: </b>
                            <p class="description">{!!$product->short_description!!}</p>


                            <a href="{{route('contact')}}" class="wsus__pro_report"><i class="fal fa-comment-alt-smile"></i>Report incorrect
                                product information</a>

                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__pro_det_description">
                        <div class="wsus__details_bg">
                            <ul class="nav nav-pills mb-3" id="pills-tab3" role="tablist">


                                <li class="nav-item active" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Seller Info</button>
                                </li>


                            </ul>
                            <div class="tab-content" id="pills-tabContent4">

                                <div class="tab-pane fade show active" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <div class="wsus__pro_det_vendor">
                                        <div class="row">
                                            <div class="col-xl-6 col-xxl-5 col-md-6">
                                                <div class="wsus__vebdor_img">
                                                    <img src="{{asset($product->seller->banner)}}" alt="vensor" class="img-fluid w-100">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-xxl-7 col-md-6 mt-4 mt-md-0">
                                                <div class="wsus__pro_det_vendor_text">
                                                    <h4>{{$product->seller->user->name}}</h4>

                                                    <p><span>Store Name:</span> {{$product->seller->shop_name}}</p>
                                                    <p><span>Address:</span>
                                                        {{$product->seller->address}}</p>
                                                    <p><span>Phone:</span> {{$product->seller->phone}}</p>
                                                    <p><span>mail:</span> {{$product->seller->email}}</p>
                                                    <br>
                                                    <p><span>Shop Description:</span> {{$product->seller->description}}</p>
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
        </div>
    </section>

    {{-- MODAL SA CHAT --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" tyle="z-index:9999 !important;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Send a message</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form action="" class="message_modal">
                @csrf
                <div class="form-group">
                    <label for="">message </label>
                    <textarea name="message" class="form-control mt-2 message_box" ></textarea>
                    <input type="hidden" name="receiver_id" value="{{$product->seller->user_id}}">
                   </div>

                   <button type="submit" class=" btn btn-primary mt-3 send_button">Send</button>

               </form>

            </div>

          </div>
        </div>
      </div>
@endsection

@push('scripts')
<script>
    // Function to trigger click event on the cart icon link
    function clickCartLink() {
        document.getElementById("cartLink").click();
    }
</script>


      <script>
        $(document).ready(function(){
            $('.message_modal').on('submit', function(e){
                e.preventDefault();
                let formDaTA = $(this).serialize();

                $.ajax({
                    method:'POST',
                    url: "{{route('user.send-message')}}",
                    data: formDaTA,
                    // spinner
                    beforeSend: function() {
                        // append this to button
                        let html = `<span class="spinner-border spinner-border-sm text-light" role="status" aria-hidden="true mr-2"></span>Sending...`
                        // class button
                        $('.send_button').html(html);
                        $('.send_button').prop('disabled',true);
                    },
                    success: function(response){
                        $('.message_box').val('');
                        $('.modal-body').append(`<div class="alert alert-success mt-3"> <a href="{{route('user.message.index')}}"><b class="text-primary">Click here</b> </a> to go to CHATS</div>`)
                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error){

                        toastr.error(xhr.responseJSON.message);


                        $('.send_button').prop('disabled',false);
                    },
                    complete: function(){

                        $('.send_button').html('Send');

                    }
                })
            })
        })
      </script>

@endpush


