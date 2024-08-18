@extends('seller.layouts.master')
@section('title')
{{$settings->site_name}} || Product
@endsection
@section('content')

<section id="wsus__dashboard">
    <div class="container-fluid">
      @include('seller.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> Products</h3>
            <div class="wsus__dashboard_profile">
                <div class="text-end mb-3">
                    <b>Submit for Admin Approval </b>
                    <a href="{{route('seller.products.create')}}" class="btn btn-warning"><i class="fas fa-plus"></i> Upload Product</a>
                </div>

                <div class="text-end mb-3">
                    <b>Product Authentication through Google Teachable Machine   </b>
                    <a href="{{route('seller.create-product.with-ai')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Upload Product </a>
                </div>
              <div class="wsus__dash_pro_area">


                {{$dataTable->table()}}

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

    <script>
        $(document).ready(function(){
            $('body').on('click', '.change-status', function(){
                let isChecked = $(this).is(':checked'); //check if toggle button is hcek or not
                let id = $(this).data('id');

                $.ajax({
                    url:"{{route('seller.product.change-product-status')}}",
                    method: 'PUT',
                    data: {
                        status: isChecked,
                        id: id,
                    },
                    success: function(data){
                        toastr.success(data.message)
                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
                })
            })
        })
    </script>
    <script>
        $(document).ready(function(){
            $('body').on('click', '.change-feature', function(){
                let isChecked = $(this).is(':checked'); //check if toggle button is hcek or not
                let id = $(this).data('id');

                $.ajax({
                    url:"{{route('seller.product.change-product-status')}}",
                    method: 'PUT',
                    data: {
                        feature: isChecked,
                        id: id,
                    },
                    success: function(data){
                        toastr.success(data.message)
                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush
