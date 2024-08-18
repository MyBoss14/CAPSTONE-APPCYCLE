<section id="wsus__banner">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__banner_content">
                    <div class="row banner_slider">
                        @foreach ( $sliders as $slider)


                        <div class="col-xl-12">
                            <div class="wsus__single_slider" style="background: url({{$slider->banner}});">
                                <div class="wsus__single_slider_text">
                                    <h3 style="
                                    border-radius: 2px;
                                    width: fit-content;
                                    background-color: #4b0303;
                                    color: #FFFFFF;
                                    ">{!!$slider->type!!}</h3>
                                    <h1 style="border-radius: 2px;
                                    width: fit-content;
                                    background-color: #4b0303;
                                    color: #FFFFFF;">{!!$slider->title!!}</h1>
                                    {{-- <h6 style="color:#FFFFFF;">{{$slider->starting_price}}</h6> --}}
                                    <a class="common_btn" href="{{$slider->btn_url}}">Visit</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
