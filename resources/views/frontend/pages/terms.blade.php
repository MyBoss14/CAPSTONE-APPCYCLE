@extends('frontend.home.layout.master')

@section('title')
{{$settings->site_name}} || Terms and Conditions
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
                        <h4>terms & condition</h4>
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>
                            <li><a href="javascript:;">terms & condition</a></li>
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
        TERMS & CONDITION START
    ==============================-->
    <section id="wsus__terms_condition">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <h2>terms and condition</h2>
                </div>
                <div class="col-xl-12">
                    <div class="wsus__terms_text">
                       {!!@$terms->content!!}
                       <p> If you have any questions about these terms and conditions, please <a href="{{route('contact')}}">contact us</a> </p>
                       <p>Last Updated: {!!@$terms->created_at->format('F j, Y')!!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        TERMS & CONDITION END
    ==============================-->


@endsection




