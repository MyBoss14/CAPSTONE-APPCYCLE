@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
    <h1>Edit Shipping Rule</h1>

    </div>

    <div class="section-body">


    <div class="row">
        <div class="col-12 ">
        <div class="card">
            <div class="card-header">
            <h4>Editing Shipping Rule ...</h4>

            </div>
            <div class="card-body">
                {{-- form --}}
                <form action="{{route('admin.shipping-rule.update', $shipping->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div  class="form-group">
                    <label>Name</label>
                    <input name="name" type="text" class="form-control" value="{{$shipping->name}}">
                </div>

                <div class="form-group">
                    <label for="inputState">Type</label>
                    <select name="type" id="inputState" class="form-control shipping-type">
                      <option {{$shipping->type == 'flat_cost' ? 'selected' :''}} value="flat_cost">Flat Cost</option>
                      <option {{$shipping->type == 'min_cost' ? 'selected' :''}} value="min_cost">Min Order Ammount</option>
                    </select>
                </div>

                <div  class="form-group min_cost {{$shipping->type == 'min_cost' ? '':'d-none'}}">
                    <label>Minimum Amount</label>
                    <input name="min_cost" type="text" class="form-control" value="{{$shipping->min_cost}}">
                </div>

                <div  class="form-group">
                    <label>Cost Amount</label>
                    <input name="cost" type="text" class="form-control" value="{{$shipping->cost}}">
                </div>

                <div class="form-group">
                    <label for="inputState">Status</label>
                    <select name="status" id="inputState" class="form-control">
                      <option {{$shipping->status == '1' ? 'selected' : ''}} value="1">Active</option>
                      <option {{$shipping->status == '0' ? 'selected' : ''}} value="0">Inactive</option>
                    </select>
                </div>


                <button type="submit" class="btn btn-primary" > Update </button>

                </form>

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
        $('body').on('change','.shipping-type', function(){
            let value = $(this).val();

             if(value !=='min_cost'){
                $('.min_cost').addClass('d-none')
             }
             else{
                $('.min_cost').removeClass('d-none')
             }
        })
    })
</script>

@endpush
