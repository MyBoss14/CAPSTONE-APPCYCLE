@php
    $categories=\App\Models\Category::where('status',1)->get();

@endphp
@foreach ($categories as $category )

<section id="wsus__electronic">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header">
                    <h3>{{$category->name}}</h3>
                    <a class="see_btn" href="javascript:;" hidden>see more <i class="fas fa-caret-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row flash_sell_slider">
            @php
                $productsInCategory = \App\Models\Product::where('category_id', $category->id)
                ->where('status', 1)
                ->get();
            @endphp


            @foreach ($productsInCategory as $product)
            {{-- product items --}}
            <div class="col-xl-3 col-sm-6 col-lg-4">
                <div class="wsus__product_item">

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
                    >
                    <div class="wsus__product_details">
                        <a class="wsus__category" href="javascript:;">{{ $product->category->name }} </a>
                        </p>
                        <a class="wsus__pro_name" href="javascript:;">{{$product->name}}</a>
                        <p class="wsus__price">{{$settings->currency_icon}}{{$product->price}}</p>
                        <a class="add_cart" href="{{route('product-detail',$product->slug )}}">add to cart</a>
                    </div>
                </div>
            </div>

            @endforeach







        </div>
    </div>
</section>

@endforeach
