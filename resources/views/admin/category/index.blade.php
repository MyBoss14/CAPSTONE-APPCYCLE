@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
    <h1>CATEGORY</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active" ><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Components</a></div>
        <div class="breadcrumb-item">Category</div>
    </div>
    </div>

    <div class="section-body">


    <div class="row">
        <div class="col-12 ">
        <div class="card">
            <div class="card-header">
            <h4>All Categories</h4>
            <div class="card-header-action">
                <a href="{{route('admin.category.create')}}" class="btn btn-primary">Add new</a>
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
                    url:"{{route('admin.category.change-status')}}",
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
