@extends('seller.layouts.master')
@section('title')
{{$settings->site_name}} || Transactions
@endsection
@section('content')

<section id="wsus__dashboard">
    <div class="container-fluid">
      @include('seller.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> Transactions</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">

                <form action="{{route('seller.transaction.filter')}}" method="GET">
                    @csrf
                    <div class="col-md-3">
                        <label>Start Date: </label>
                        <input name="start_date" type="date" class="form-control" value="{{ old('start_date') }}">
                    </div>

                    <div class="col-md-3">
                        <label>End Date: </label>
                        <input name="end_date" type="date" class="form-control" value="{{ old('end_date') }}">
                    </div>

                    <div class="col-md-2 pt-4">
                        <button type="submit" class="btn- btn-success form-control"> Filter </button>
                    </div>

                </form>

                <form action="{{route('seller.transaction.index')}}" method="GET" >
                    @csrf
                    <div class="col-md-2 pt-4">
                        <button type="submit" class="btn- btn-warning form-control mb-4 "> remove filter </button>
                    </div>
                </form>

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
@endpush

