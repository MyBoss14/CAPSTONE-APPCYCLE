@extends('frontend.dashboard.layouts.master')

@section('content')

<section id="wsus__dashboard">
    <div class="container-fluid">
        {{-- sidebar --}}
        @include('frontend.dashboard.layouts.sidebar')
        <form action="{{route('user.address.update', $address->id)}}" method="POST">
            @csrf
            @method('PUT')

        <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="fal fa-gift-card"></i>EDIT address</h3>
            <div class="wsus__dashboard_add wsus__add_address">
              <form>
                <div class="row">
                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>name <b>*</b></label>
                      <input name="name" type="text" placeholder="Name" value="{{$address->name}}">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>email</label>
                      <input name="email" type="email" placeholder="Email" value="{{$address->email}}">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>phone <b>*</b></label>
                      <input name="phone" type="text" placeholder="Phone" value="{{$address->phone}}">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>country <b>*</b></label>
                      <div class="wsus__topbar_select">
                        <select class="select_2" name="country" >
                          <option selected>Philippines</option>

                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>City <b>*</b></label>
                      <input name="city" type="text" placeholder="City" value="{{$address->city}}">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>zip code <b>*</b></label>
                      <input name="zip" type="text" placeholder="Zip Code" value="{{$address->zip}}">
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-6">
                    <div class="wsus__add_address_single">
                      <label>address <b>*</b></label>
                      <input name="address" type="text" placeholder="Address" value="{{$address->address}}">
                    </div>
                  </div>


                  <div class="">
                    <button type="submit" class="common_btn">Update</button>
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
