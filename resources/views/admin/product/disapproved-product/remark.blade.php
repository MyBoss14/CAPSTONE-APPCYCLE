@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
    <h1>Product Remark </h1>

    </div>

    <div class="section-body">


    <div class="row">
        <div class="col-12 ">
        <div class="card">
            <div class="card-header">
            <h4>Product: {{$product->name}}</h4>

            </div>
            <div class="card-body">
                {{-- form --}}
                <form action="{{route('admin.product-remark', $product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label><b>Seller:</b> {{$product->seller->shop_name}}</label>
                    <br>
                    <label for=""><b>Category: </b>{{$product->category->name}}</label>

                    <br>
                    <br>
                    <img src="{{asset($product->thumb_image)}}" alt="" style="width: 200px;">
                </div>

                <div  class="form-group">
                    <label>Remark</label>
                    <input name="remark" type="text" class="form-control" value="{{$product->remark}}">
                    <input name="is_approved" type="hidden" value="2">





                </div>

                <button type="submit" class="btn btn-primary" > Save </button>

                </form>

            </div>

        </div>
        </div>

    </div>

    </div>
</section>

@endsection
