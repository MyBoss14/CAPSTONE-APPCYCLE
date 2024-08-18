@extends('seller.layouts.master')
@section('title')
{{$settings->site_name}} || Profile
@endsection
@section('content')

<section id="wsus__dashboard">
    <div class="container-fluid">
      @include('seller.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> profile</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <h4>basic information</h4>

                    <form action="{{route('seller.profile.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                            <div class="col-md-2">
                                <div class="wsus__dash_pro_img mb-5 ">
                                <img src="{{Auth::user()->image ? asset(Auth::user()->image) : asset('frontend/images/ts-2.jpg')}}" alt="img" class="img-fluid w-100">
                                <input type="file" name="image">
                                </div>
                        </div>


                            <div class="col-md-12 mt-5">
                                <div class="wsus__dash_pro_single">
                                <i class="fas fa-user-tie"></i>
                                <input type="text"  name="name" value="{{Auth::user()->name}}">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="wsus__dash_pro_single">
                                <i class="fal fa-envelope-open"></i>
                                <input type="email" name="email" value="{{Auth::user()->email}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <button class="common_btn mb-4 mt-2" type="submit">Update</button>
                        </div>

                        </form>


                        <div class="wsus__dash_pass_change mt-2">
                            <form action="{{route('seller.profile.update.password')}}" method="POST">
                                @csrf
                            <div class="row">
                                <h4 class="mb-4">Update Password</h4>
                            <div class="col-xl-4 col-md-6">
                                <div class="wsus__dash_pro_single">
                                <i class="fas fa-unlock-alt"></i>
                                <input type="password" placeholder="Current Password" name="current_password">
                                </div>
                        </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="wsus__dash_pro_single">
                                <i class="fas fa-lock-alt"></i>
                                <input type="password" placeholder="New Password" name="password">
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="wsus__dash_pro_single">
                                <i class="fas fa-lock-alt"></i>
                                <input type="password" placeholder="Confirm Password" name="password_confirmation">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <button class="common_btn" type="submit">Update Password</button>
                            </div>
                    </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
