@php
// display only mga status is active,, the rest dli e fetch ang data
    $categories = \App\Models\Category::where('status', 1)->get();

@endphp

<nav class="wsus__main_menu d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="relative_contect d-flex">
                    <div class="wsus_menu_category_bar" hidden>
                        <i class="far fa-bars"></i>
                    </div>
                    <ul class="wsus_menu_cat_item show_home toggle_menu" hidden>
                        @foreach ($categories as $category)
                        <li><a class="wsus__droap_arrow" href="#"><i class="{{$category->icon}}"></i> {{$category->name}} </a>
                            <ul class="wsus_menu_cat_droapdown">
                                <li><a href="#">Check Newly Uploaded <i class="fas "></i></a>

                                </li>
                                <li><a href="#">View all {{$category->name}} <i class="fas "></i></a>

                                </li>

                            </ul>
                        </li>
                        @endforeach



                        <li><a href="#"><i class="fal fa-gem"></i> View All Categories</a></li>
                    </ul>

                    <ul class="wsus__menu_item">
                        <li><a class="active" href="{{route('home')}}">home</a></li>
                        <li><a href="javascript:;" hidden>shop <i class="fas fa-caret-down"></i></a>
                            <div class="wsus__mega_menu">
                                <div class="row">


                                    <div class="col-xl-3 col-lg-3">
                                        <div class="wsus__mega_menu_colum">
                                            <h4>category</h4>
                                            @foreach ( $categories as $category)
                                                <ul class="wsis__mega_menu_item">
                                                    <li><a href="#"> {{$category->name}}</a></li>

                                                </ul>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </li>




                    </ul>
                    <ul class="wsus__menu_item wsus__menu_item_right">
                        <li><a href="{{route('product-tracking.index')}}">Track your Order</a></li>
                        <li><a href="{{route('contact')}}">contact</a></li>
                        @if (auth()->check())
                            <li><a href="{{route('user.dashboard')}}">my account</a></li>
                        @endif

                        @if (!auth()->check())
                            <li><a href="{{route('login')}}">login</a></li>
                        @endif


                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>


{{-- mobile menu --}}
<section id="wsus__mobile_menu">
    <span class="wsus__mobile_menu_close"><i class="fal fa-times"></i></span>
    <ul class="wsus__mobile_menu_header_icon d-inline-flex">

        <li><a href="wishlist.html"><i class="far fa-heart"></i> <span>2</span></a></li>

        <li><a href="compare.html"><i class="far fa-random"></i> </i><span>3</span></a></li>
    </ul>
    <form>
        <input type="text" placeholder="Search">
        <button type="submit"><i class="far fa-search"></i></button>
    </form>

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                role="tab" aria-controls="pills-home" aria-selected="true">Categories</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                role="tab" aria-controls="pills-profile" aria-selected="false">main menu</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="wsus__mobile_menu_main_menu">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <ul class="wsus_mobile_menu_category">

                        @foreach ($categories as $category )
                        <li><a href="javascript:;" class="accordion-button collapsed" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThreew-{{$loop->index}}" aria-expanded="false"
                            aria-controls="flush-collapseThreew-{{$loop->index}}"><i class="{{$category->icon}}"></i> {{$category->name}}</a>
                        <div id="flush-collapseThreew-{{$loop->index}}" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul>
                                    <li><a href="javascript:;">Check Newly Uploaded</a></li>
                                    <li><a href="javascript:;">View all {{$category->name}}</a></li>

                                </ul>
                            </div>
                        </div>
                        </li>
                        @endforeach
                        <li><a href="javascript:;"><i class="fal fa-gem"></i> View All Categories</a></li>

                    </li>

                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>
