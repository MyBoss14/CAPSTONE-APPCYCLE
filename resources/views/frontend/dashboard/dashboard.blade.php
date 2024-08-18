@extends('frontend.dashboard.layouts.master')
@section('title')
{{$settings->site_name}} || Dashboard
@endsection
@section('content')

<section id="wsus__dashboard">
    <div class="container-fluid">
        {{-- sidebar --}}
        @include('frontend.dashboard.layouts.sidebar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content">
            <div class="wsus__dashboard">
              <div class="row">
                <div class="col-md-4">
                  <a class="wsus__dashboard_item red" href="{{route('user.orders')}}">
                    <i class="far fa-address-book"></i>
                    <p>order</p>
                  </a>
                </div>
                
                
                
                <div class="col-md-4">
                  <a class="wsus__dashboard_item orange" href="{{route('user.profile')}}">
                    <i class="fas fa-user-shield"></i>
                    <p>profile</p>
                  </a>
                </div>
                <div class="col-md-4">
                  <a class="wsus__dashboard_item purple" href="{{route('user.address.index')}}">
                    <i class="fal fa-map-marker-alt"></i>
                    <p>address</p>
                  </a>
                </div>
              </div>



            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection
