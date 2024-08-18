@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
    <h1>Seller Shop Profile</h1>

    </div>

    <div class="section-body">


    <div class="row">
        <div class="col-12 ">
        <div class="card">
            <div class="card-header">
            <h4>Update Seller Shop Profile</h4>

            </div>
            <div class="card-body">
                {{-- form --}}
                <form action="{{route('admin.seller-profile.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Preview</label>
                    <br>
                    <img width="250px" src="{{asset($profile->banner)}}" alt="">
                </div>

                <div class="form-group">
                    <label>Banner Image</label>
                    <input name="banner" type="File" class="form-control">
                </div>

                <div  class="form-group">
                    <label>Shop Name</label>
                    <input name="shop_name" type="text" class="form-control" value="{{$profile->shop_name}}">
                </div>

                <div  class="form-group">
                    <label>Phone</label>
                    <input name="phone" type="text" class="form-control" value="{{$profile->phone}}">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="email" class="form-control"
                    value="{{$profile->email}}"
                    >
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <input name="address" type="text" class="form-control"
                    value="{{$profile->address}}"
                    >
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="summernote" name="description">{{$profile->description}}</textarea>
                </div>

                <div class="form-group">
                    <label>Facebook</label>
                    <input name="fb_link" type="text" class="form-control"
                    value="{{$profile->fb_link}}"
                    >
                </div>

                <div class="form-group">
                    <label>Twitter</label>
                    <input name="tw_link" type="text" class="form-control"
                    value="{{$profile->tw_link}}"
                    >
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
