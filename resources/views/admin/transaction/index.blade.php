@extends('admin.layouts.master')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .header {
        background-color: #007bff;
        color: #ffffff;
        text-align: center;
        padding: 20px 0;
    }
    .title {
        font-size: 24px;
        margin-bottom: 10px;
    }
    .subtitle {
        font-size: 18px;
    }
</style>

<section class="section">
    <div class="section-header">
        <h1>Transaction</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4>All Transactions</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{route('admin.transaction.filter')}}" method="GET">
                            @csrf
                            <div class="col-md-3">
                                <label>Start Date: </label>
                                <input name="start_date" type="date" class="form-control" value="{{ old('start_date') }}">
                            </div>

                            <div class="col-md-3">
                                <label>End Date: </label>
                                <input name="end_date" type="date" class="form-control" value="{{ old('end_date') }}" >
                            </div>

                            <div class="col-md-2 pt-4">
                                <button type="submit" class="btn- btn-success form-control"> Filter </button>
                            </div>

                        </form>

                        <form action="{{route('admin.transaction')}}" method="GET" >
                            @csrf
                            <div class="col-md-2 pt-4">
                                <button type="submit" class="btn- btn-warning form-control mb-4 "> Clear filter </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="invoice-print">
            <div class="header">
                <div class="title">Mindanao State University</div>
                <div class="subtitle">APPCYCLE</div>
                <div class="subtitle">Transaction Table</div>
                @if(isset($start_date) && isset($end_date))
                    <div class="subtitle">Start Date: {{ $start_date }} - End Date: {{ $end_date }}</div>
                @endif
            </div>

            {{ $dataTable->table() }}

        </div>

        <button class="btn btn-warning btn-icon icon-left print_invoice"><i class="fas fa-print"></i> Print</button>
    </div>
</section>

@endsection

@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script>
$(document).ready(function(){
    $('.print_invoice').on('click', function(){
        let printBody = $('.invoice-print').clone(); // Cloning to avoid manipulating the original content
        printBody.find('#transaction-table_length, #transaction-table_filter, #transaction-table_info, #transaction-table_paginate').remove(); // Removing unnecessary elements

        let originalContents = $('body').html();

        $('body').html(printBody.html());

        window.print();

        $('body').html(originalContents);
    });
});
</script>
@endpush
