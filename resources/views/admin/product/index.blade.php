@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
    <h1>Product </h1>

    </div>

    <div class="section-body">


    <div class="row">
        <div class="col-12 ">
        <div class="card">
            <div class="card-header">
            <h4>All Products</h4>
            <div class="card-header-action">
                <a href="{{route('admin.products.create')}}" class="btn btn-primary">Add new</a>
            </div>
            </div>
            <div class="card-body">
{{-- datatable --}}
                {{ $dataTable->table()}}
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
                    url:"{{route('admin.product.change-product-status')}}",
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
                    url:"{{route('admin.product.change-feature')}}",
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
