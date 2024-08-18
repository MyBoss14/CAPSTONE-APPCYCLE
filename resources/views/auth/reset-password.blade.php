@extends('frontend.home.layout.master')
@section('title')
{{$settings->site_name}} || RESET PASSWROD
@endsection

@section('content')
<!--============================
    BREADCRUMB START
==============================-->
<section id="wsus__breadcrumb">
    <div class="wsus_breadcrumb_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Reset password</h4>
                    <ul>
                        <li><a href="#">login</a></li>
                        <li><a href="#">reset password</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============================
    BREADCRUMB END
==============================-->


<!--============================
    CHANGE PASSWORD START
==============================-->
<section id="wsus__login_register">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-md-10 col-lg-7 m-auto">
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <div class="wsus__change_password">
                        <h4>Reset password</h4>
                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        {{-- email --}}
                        <div class="wsus__single_pass">
                            <label>email</label>
                            <input type="email"
                            id="email"
                            name="email"
                            value="{{old('email',$request->email)}}"
                            placeholder="email">
                        </div>
                        {{-- new password --}}
                        <div class="wsus__single_pass">
                            <label>new password</label>
                            <input type="password"
                            id="password"
                            name="password"
                            placeholder="New Password">
                        </div>
                        {{-- confirm password --}}
                        <div class="wsus__single_pass">
                            <label>confirm password</label>
                            <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            placeholder="Confirm Password">
                        </div>
                        <button class="common_btn" type="submit">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--============================
    CHANGE PASSWORD END
==============================-->
@endsection
