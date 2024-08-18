@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
    <h1>Pending Request of Seller</h1>

    </div>

    <div class="section-body">


    <div class="row">
        <div class="col-12 ">
        <div class="card">
            <div class="card-header">
            <h4>All Pending</h4>
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

@endpush
