@extends('frontend.home.layout.master')

@section('title')
{{$settings->site_name}} || LogIn
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
                        <h4>login / register</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">login / register</a></li>
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
       LOGIN/REGISTER PAGE START
    ==============================-->
    <section id="wsus__login_register">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__login_reg_area">
                        <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab2" data-bs-toggle="pill"
                                    data-bs-target="#pills-homes" type="button" role="tab" aria-controls="pills-homes"
                                    aria-selected="true">login</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab2" data-bs-toggle="pill"
                                    data-bs-target="#pills-profiles" type="button" role="tab"
                                    aria-controls="pills-profiles" aria-selected="true">signup</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent2">
                            <div class="tab-pane fade show active" id="pills-homes" role="tabpanel"
                                aria-labelledby="pills-home-tab2">
                                <div class="wsus__login">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        {{-- email --}}
                                        <div class="wsus__login_input">
                                            <i class="fas fa-user-tie"></i>
                                            <input name="email" id="email" value="{{old('email')}}" type="text" placeholder="email ">
                                        </div>

                                        {{-- password --}}
                                        <div class="wsus__login_input">
                                            <i class="fas fa-key"></i>
                                            <input id="password"
                                            type="password"
                                            name="password"
                                            placeholder="Password">
                                        </div>

                                        <div class="wsus__login_save">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                    id="remember_me"
                                                    name="remember">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Remember
                                                    me</label>
                                            </div>
                                            <a class="forget_p" href="{{ route('password.request') }}">forget password ?</a>
                                        </div>

                                        <button class="common_btn " type="submit">login</button>
                                        
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profiles" role="tabpanel"
                                aria-labelledby="pills-profile-tab2">
                                <div class="wsus__login">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        {{-- name --}}
                                        <div class="wsus__login_input">
                                            <i class="fas fa-user-tie"></i>
                                            <input id="name"
                                            name="name"
                                            value="{{old('name')}}" type="text" placeholder="Name">
                                        </div>
                                        {{-- email --}}
                                        <div class="wsus__login_input">
                                            <i class="far fa-envelope"></i>
                                            <input
                                            id="email"
                                            value="{{old('email')}}"
                                            name="email"
                                            type="text" placeholder="Email">
                                        </div>

                                        {{-- password --}}
                                        <div class="wsus__login_input">
                                            <i class="fas fa-key"></i>
                                            <input placeholder="Password"
                                            id="password"
                                            type="password"
                                            name="password"
                                            >
                                        </div>


                                        {{-- confirm password --}}
                                        <div class="wsus__login_input">
                                            <i class="fas fa-key"></i>
                                            <input placeholder="Confirm Password"
                                            id="password_confirmation"
                                            type="password"
                                            name="password_confirmation"
                                            >
                                        </div>

                                        <button class="common_btn mt-5" type="submit">signup</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
    LOGIN/REGISTER PAGE END
    ==============================-->

@endsection
