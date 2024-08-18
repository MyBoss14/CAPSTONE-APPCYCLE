@extends('seller.layouts.master')
@section('title')
{{$settings->site_name}} ||Shop Profile
@endsection
@section('content')

<section id="wsus__dashboard">
    <div class="container-fluid">
      @include('seller.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> Shop Profile</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">

                <form action="{{route('seller.seller-profile.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group wsus__input">
                        <label>Preview</label>
                        <br>
                        <img width="250px" src="{{asset($profile->banner)}}" alt="">
                    </div>

                    <div class="form-group wsus__input">
                        <label>Banner Image</label>
                        <input name="banner" type="File" class="form-control">
                    </div>

                    <div  class="form-group wsus__input">
                        <label>Shop Name</label>
                        <input name="shop_name" type="text" class="form-control" value="{{$profile->shop_name}}">
                    </div>

                    <div  class="form-group wsus__input">
                        <label>Phone</label>
                        <input name="phone" type="text" class="form-control" value="{{$profile->phone}}">
                    </div>

                    <div class="form-group wsus__input">
                        <label>Email</label>
                        <input name="email" type="email" class="form-control"
                        value="{{$profile->email}}"
                        >
                    </div>

                    <div class="form-group wsus__input">
                        <label>Address</label>
                        <input name="address" type="text" class="form-control"
                        value="{{$profile->address}}"
                        >
                    </div>

                    <div class="form-group wsus__input">
                        <label>Description</label>
                        <textarea class="summernote" name="description">{{$profile->description}}</textarea>
                    </div>

                    <div class="form-group wsus__input">
                        <label>Facebook</label>
                        <input name="fb_link" type="text" class="form-control"
                        value="{{$profile->fb_link}}"
                        >
                    </div>

                    <div class="form-group wsus__input">
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
      </div>
    </div>
</section>
@endsection
