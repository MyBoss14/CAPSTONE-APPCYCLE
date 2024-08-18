<section id="wsus__flash_sell" class="wsus__flash_sell_2">
        <div class=" container">
            <div class="col-xl-12 col-lg-12">
                <div class="wsus__monthly_top_banner">
                    <div class="wsus__monthly_top_banner_img">
                        <img src="{{asset('frontend/images/slider_4.jpg')}}" alt="img" class="img-fluid w-100">
                        <span></span>
                    </div>
                    <div class="wsus__monthly_top_banner_text">

                        <h3>Check these <span>REUSABLE SCRAPS</span> waiting for you</h3>

                        <a class="shop_btn" href="#">view all</a>
                    </div>
                </div>
            </div>
            <div class="row flash_sell_slider">
                @foreach ($flashSaleItems as $item )
                @php
                    $product=\App\Models\Product::find($item->product_id);
                @endphp
                <div class="col-xl-3 col-sm-6 col-lg-4">

                    <div class="wsus__product_item">
                        <span class="wsus__new">New</span>

                        <a class="wsus__pro_link" href="{{route('product-detail',$product->slug )}}">
                            <img src="{{asset($product->thumb_image)}}" alt="product" class="img-fluid w-100 img_1" />
                            {{-- hover image --}}
                            {{-- if may gallery image e display , if wala display ang thumb --}}
                            <img src="
                            @if (isset($product->productImageGalleries[0]->image))
                            {{asset($product->productImageGalleries[0]->image)}}
                            @else
                            {{asset($product->thumb_image)}}
                            @endif
                            " alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="">
                            <li><a href="{{route('product-detail',$product->slug )}}" ></a></li>
                            {{-- <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a> --}}
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="{{route('product-detail',$product->slug )}}">{{$product->category->name}} </a>

                            <a class="wsus__pro_name" href="{{route('product-detail',$product->slug )}}">{{$product->name}}</a>
                            <p class="wsus__price">₱{{$product->price}}</p>
                            {{-- not yet working --}}
                            {{-- <form action="" class="shopping-cart-form">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <select name="category_name" id="inputState" class="form-control rounded-pill border-0 d-none" >

                                    <option class="" value="{{$product->category->name}}"> <h5>Category :</h5>{{$product->category->name}}</option>

                                </select>
                                <input name="qty" class="" type="hidden" min="1" max="100" value="1" />
                                <button type="submit" class="add_cart border-0" href="#" >Add to cart</button>
                            </form> --}}

                            <a class="add_cart" href="{{route('product-detail',@$product->slug )}}">add to cart</a>
                        </div>
                    </div>


                </div>
                @endforeach




            </div>
        </div>
    </section>
