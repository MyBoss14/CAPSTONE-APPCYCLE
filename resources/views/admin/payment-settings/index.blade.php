@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
    <h1>Payment Settings</h1>

    </div>

    <div class="section-body">


    <div class="row">
        <div class="col-12 ">
        <div class="card">
            <div class="card">

                <div class="card-body">
                  <div class="row">
                    <div class="col-2">
                      <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab">Paypal</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab">Cash on Delivery</a>

                      </div>
                    </div>
                    <div class="col-10">
                      <div class="tab-content" id="nav-tabContent">
                        @include('admin.payment-settings.sections.paypal-setting')

                        @include('admin.payment-settings.sections.cod-setting')


                      </div>
                    </div>
                  </div>
                </div>
              </div>

        </div>
        </div>

    </div>

    </div>
</section>

@endsection


