@extends('seller.layouts.master')
@section('title')
{{$settings->site_name}} || Dashboard
@endsection
@section('content')

<section id="wsus__dashboard">
    <div class="container-fluid">
        {{-- sidebar --}}
        @include('seller.layouts.sidebar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content">
            <div class="wsus__dashboard">
              <div class="row">
                 <div class=" col-md-12">
                  <a class="wsus__dashboard_item orange" href="{{route('seller.seller-profile.index')}}">
                    <i class="fas fa-user-shield"></i>
                    <p>Shop profile</p>
                  </a>
                </div>
                <div class="col-md-4">
                  <a class="wsus__dashboard_item red" href="{{route('seller.orders')}}">
                    <i class="far fa-address-book"></i>
                    <p>Orders</p>
                  </a>
                </div>
                <div class=" col-md-4">
                  <a class="wsus__dashboard_item green" href="{{route('seller.products.index')}}">
                    <i class="fal fa-cloud-download"></i>
                    <p>Products</p>
                  </a>
                </div>
                
                <div class=" col-md-4">
                  <a class="wsus__dashboard_item blue" href="{{route('seller.message.index')}}">
                    <i class="far fa-heart"></i>
                    <p>Message</p>
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
