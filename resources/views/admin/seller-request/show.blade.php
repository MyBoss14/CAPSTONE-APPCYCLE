

@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
    <h1>Seller Request Details</h1>

    </div>
    <div class="section-body">
        <div class="invoice">
          <div class="invoice-print">


            <div class="row mt-4">
              <div class="col-md-12">

                <div class="table-responsive">
                  <table class="table table-striped table-hover table-md">
                    <tr>
                        <td>User Name: </td>
                        <td>{{$seller->user->name}}</td>
                    </tr>
                    <tr>
                        <td>User Email: </td>
                        <td>{{$seller->user->email}}</td>
                    </tr>
                    <tr>
                        <td>Shop Name: </td>
                        <td>{{$seller->shop_name}}</td>
                    </tr>

                    <tr>
                        <td>Shop Email: </td>
                        <td>{{$seller->email}}</td>
                    </tr>

                    <tr>
                        <td>Shop Phone: </td>
                        <td>{{$seller->phone}}</td>
                    </tr>

                    <tr>
                        <td>Shop Address: </td>
                        <td>{{$seller->address}}</td>

                    </tr>

                    <tr>
                        <td>Description: </td>
                        <td>{{$seller->description}}</td>
                    </tr>


                  </table>
                </div>
                <div class="row mt-4">
                  <div class="col-lg-8">
                    <div class="col-md-4">

                        <form action="{{route('admin.seller-request.change-status', $seller->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Status Action</label>
                                <select name="status" class="form-control" >
                                    <option {{$seller->status == 0 ? 'selected' : ''}} value="0">Pending</option>
                                    <option {{$seller->status == 1 ? 'selected' : ''}} value="1">Approve</option>
                                </select>
                            </div>

                            <button class="btn btn-primary">Save</button>
                        </form>

                    </div>
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
    <script>
        $(document).ready(function(){


            $('#order_status').on('change', function(){
                let status = $(this).val();
                let id = $(this).data('id');

                $.ajax({
                    method: 'GET',
                    url:"{{route('admin.order.status')}}",
                    data:{status: status, id:id},
                    success: function(data){
                        if(data.status== 'success'){
                            toastr.success(data.message)
                        }
                    },
                    error: function(data){
                        console.log(data);
                    }
                })
            })

            $('#payment_status').on('change', function(){
                let status = $(this).val();
                let id = $(this).data('id');

                $.ajax({
                    method: 'GET',
                    url:"{{route('admin.payment.status')}}",
                    data:{status: status, id:id},
                    success: function(data){
                        if(data.status== 'success'){
                            toastr.success(data.message)
                        }
                    },
                    error: function(data){
                        console.log(data);
                    }
                })
            })

            $('.print_invoice').on('click', function(){
                let printBody =$('.invoice-print');
                let originalContents = $('body').html();

                $('body').html(printBody.html());

                window.print();

                $('body').html(originalContents);
            })


        })
    </script>
@endpush

