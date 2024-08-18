@extends('seller.layouts.master')
@section('title')
{{$settings->site_name}} || Image Gallery
@endsection
@section('content')

<section id="wsus__dashboard">
    <div class="container-fluid">
      @include('seller.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
            <a href="{{route('seller.products.index')}}" class="btn btn-primary mb-5">Return</a>
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> Product: {{$product->name}}</h3>
            <div class="form-group wsus__input mb-2">

                <img src="{{asset($product->thumb_image)}}" alt="" style="width: 200px;">
            </div>
            <div class="wsus__dashboard_profile">

              <div class="wsus__dash_pro_area">

                <form action="{{route('seller.products-image-gallery.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf

                    @include('seller.product.image-gallery.model')



                    </form>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> Product Images</h3>
            <div class="wsus__dashboard_profile">

              <div class="wsus__dash_pro_area">

                {{ $dataTable->table()}}


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
@push('scripts')

{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

@endpush
