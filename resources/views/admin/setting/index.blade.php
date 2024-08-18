@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
    <h1>General Settings</h1>

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
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab">General Setting</a>

                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab">Email Configuration</a>

                        <a class="list-group-item list-group-item-action" id="list-pusher-list" data-toggle="list" href="#pusher-setting" role="tab">Message Setting (Pusher)</a>


                        {{-- <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab">Settings</a> --}}
                      </div>
                    </div>
                    <div class="col-10">
                      <div class="tab-content" id="nav-tabContent">
                        @include('admin.setting.general-setting')



                        @include('admin.setting.email-configuration')

                        @include('admin.setting.pusher-setting')



                        <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                          Lorem ipsum culpa in ad velit dolore anim labore incididunt do aliqua sit veniam commodo elit dolore do labore occaecat laborum sed quis proident fugiat sunt pariatur. Cupidatat ut fugiat anim ut dolore excepteur ut voluptate dolore excepteur mollit commodo.
                        </div>
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


