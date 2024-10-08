<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.general-setting-update')}}" method="POST">
                @csrf
                @method('PUT')

                <div  class="form-group">
                    <label>Site Name</label>
                    <input name="site_name" type="text" class="form-control" value="{{$generalSettings->site_name}}">
                </div>

                <div  class="form-group">
                    <label>Nav Bar Layout</label>
                    <select name="layout" id="" class="form-control">
                        <option {{$generalSettings->layout == 'LTR' ? 'selected': ''}} value="LTR">Left To Right</option>
                        <option {{$generalSettings->layout == 'RTL' ? 'selected': ''}} value="RTL">Right To Left</option>
                    </select>
                </div>

                <div  class="form-group">
                    <label>Contact Email</label>
                    <input name="contact_email" type="text" class="form-control" value="{{$generalSettings->contact_email}}">
                </div>

                <div  class="form-group">
                    <label>Contact Phone</label>
                    <input name="contact_phone" type="text" class="form-control" value="{{$generalSettings->contact_phone}}">
                </div>

                <div  class="form-group">
                    <label>Contact Address</label>
                    <input name="contact_address" type="text" class="form-control" value="{{$generalSettings->contact_address}}">
                </div>

                <div  class="form-group">
                    <label>Google Map Url</label>
                    <input name="map" type="text" class="form-control" value="{{$generalSettings->map}}">
                </div>

                <div  class="form-group">
                    <label>Currency Name</label>
                    <select name="currency_name" id="" class="form-control select2">
                        <option value="">Select</option>
                            @foreach ( config('settings.currency_list') as $currency ) //access settings config file
                            <option {{@$generalSettings->currency_name == $currency ? 'selected' : ''}} value="{{$currency}}">{{$currency}}</option>
                            @endforeach

                    </select>
                </div>

                <div  class="form-group">
                    <label>Currency Icon</label>
                    <input name="currency_icon" type="text" class="form-control" value="{{@$generalSettings->currency_icon}}">
                </div>



                <div  class="form-group">
                    <label>Timezone</label>
                    <select name="time_zone" id="" class="form-control select2">
                        <option value="">Select</option>
                        @foreach ( config('settings.time_zone') as $key => $timeZone ) //access settings config file
                            <option {{@$generalSettings->time_zone == $key ? 'selected' : ''}} value="{{$key}}">{{$key}}</option>
                            @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
