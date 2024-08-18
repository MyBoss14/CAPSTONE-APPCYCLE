@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Product Image Gallery</h1>
    </div>

    <div class="section-body">

        <a href="{{route('admin.products.index')}}" class="btn btn-warning mb-5"> Return</a>
        <div class="row">
            <div class="col-12 ">
                <div class="card">

                    <div class="card-header">
                        <h4>Product: {{$product->name}}</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.products-image-gallery.store')}}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="">Image <code>(Add one Image at a time)</code></label> <br>
                            <input type="file" name="image" class="form-controller" >
                            {{-- FOR MULTIPLE PRODUCT UPLOAD ARI GAMITON --}}
                            {{-- <input type="file" name="image[]" class="form-controller" multiple> --}}
                            <input type="hidden" name="product" value="{{$product->id}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>

                        </form>
                    </div>

                 </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4>All images</h4>

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
