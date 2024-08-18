@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
    <h1>Slider</h1>

    </div>

    <div class="section-body">


    <div class="row">
        <div class="col-12 ">
        <div class="card">
            <div class="card-header">
            <h4>Create Slider</h4>

            </div>
            <div class="card-body">
                {{-- form --}}
                <form action="{{route('admin.slider.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Banner Image</label>
                    <input name="banner" type="File" class="form-control">
                </div>

                <div  class="form-group">
                    <label>Type</label>
                    <input name="type" type="text" class="form-control" value="{{old('type')}}">
                </div>

                <div class="form-group">
                    <label>Title</label>
                    <input name="title" type="text" class="form-control"
                    value="{{old('title')}}"
                    >
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input name="starting_price" type="text" class="form-control"
                    value="{{old('starting_price')}}"
                    >
                </div>

                <div class="form-group">
                    <label>Button Url</label>
                    <input name="btn_url" type="text" class="form-control"
                    value="{{old('btn_url')}}"
                    >
                </div>

                <div class="form-group">
                    <label>Serial #</label>
                    <input name="serial" type="text" class="form-control"
                    value="{{old('serial')}}"
                    >
                </div>

                <div class="form-group">
                    <label for="inputState">Status</label>
                    <select name="status" id="inputState" class="form-control">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>

                <button type="submit" class="btn btn-primary" > Add</button>

                </form>

            </div>

        </div>
        </div>

    </div>

    </div>
</section>

@endsection
