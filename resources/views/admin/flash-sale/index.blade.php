@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
    <h1>Feature Product</h1>

    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12 ">
            <div class="card">
                <div class="card-header">
                <h4>Featured Products End Date</h4>

                </div>
                <div class="card-body">
                    <form action="{{route('admin.flash-sale.update')}}" method="POST" hidden>
                        @csrf
                        @method('PUT')
                        <div  class="form-group">
                            <label>End Date</label>
                            <input type="text" class="form-control datepicker" name="end_date" value="{{@$flashSaleDate->end_date}}">
                        </div>
                        <button type="submit" class="btn btn-primary" > Save</button>
                    </form>
                </div>

                </div>
            </div>
            </div>
        </div>

    <div class="row">
        <div class="col-12 ">
        <div class="card">
            <div class="card-header">
            <h4>Add Feature Products</h4>
            <h5></h5>

            </div>
                <div class="card-body">
                    <form action="{{route('admin.flash-sale.add-product')}}" method="POST">
                        @csrf

                        <div  class="form-group">
                            <label>Add Product</label>
                            <select name="product" id="" class="form-control select2">
                                @foreach ($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div  class="form-group">
                                    <label>Show at Home?</label>
                                    <select name="show_at_home" id="" class="form-control select2">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="o">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div  class="form-group">
                                    <label>Status?</label>
                                    <select name="status" id="" class="form-control select2">
                                        <option value="">Select</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" > Save</button>
                    </form>
                </div>
            </div>
        </div>
        </div>

        <div class="row">
            <div class="col-12 ">
            <div class="card">
                <div class="card-header">
                <h4>Featured Products</h4>

                </div>
                <div class="card-body">
                {{-- datatable --}}
                    {{ $dataTable->table()}}
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
{{-- change status --}}
    <script>
        $(document).ready(function(){
            $('body').on('click', '.change-status', function(){
                let isChecked = $(this).is(':checked'); //check if toggle button is hcek or not
                let id = $(this).data('id');

                $.ajax({
                    url:"{{route('admin.flash-sale.change-status')}}",
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
    {{-- change show at home --}}
    <script>
        $(document).ready(function(){
            $('body').on('click', '.change-at-home-status', function(){
                let isChecked = $(this).is(':checked'); //check if toggle button is hcek or not
                let id = $(this).data('id');

                $.ajax({
                    url:"{{route('admin.flash-sale.show-at-home.change-status')}}",
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
@endpush
