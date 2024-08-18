@extends('frontend.dashboard.layouts.master')

@section('content')

<section id="wsus__dashboard">
    <div class="container-fluid">
        {{-- sidebar --}}
        @include('frontend.dashboard.layouts.sidebar')
        <form action="{{route('user.address.store')}}" method="POST">
            @csrf

        <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="fal fa-gift-card"></i>create address</h3>
            <div class="wsus__dashboard_add wsus__add_address">
              <form>
                <div class="row">
                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>name <b>*</b></label>
                      <input name="name" type="text" placeholder="Name">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>email</label>
                      <input name="email" type="email" placeholder="Email">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>phone <b>*</b></label>
                      <input name="phone" type="text" placeholder="Phone">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>country <b>*</b></label>
                      <div class="wsus__topbar_select">
                        <select class="select_2" name="country">
                          <option selected>Philippines</option>

                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>City <b>*</b></label>
                      <input name="city" type="text" placeholder="City">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>zip code <b>*</b></label>
                      <input name="zip" type="text" placeholder="Zip Code">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>address <b>*</b></label>
                      <input name="address" type="text" placeholder="Address">
                    </div>
                  </div>


                  <div class="">
                    <button type="submit" class="common_btn">Create</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

        </form>
    </div>
  </section>
@endsection
