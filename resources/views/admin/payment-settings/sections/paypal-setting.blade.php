<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.paypal-setting.update', 1)}}" method="POST">
                @csrf
                @method('PUT')
                <div  class="form-group">
                    <label>Paypal Status</label>
                    <select name="status" id="" class="form-control">
                        <option {{$paypalSetting->status == 1 ? 'selected' : ''}} value="1">Enable</option>
                        <option {{$paypalSetting->status == 0 ? 'selected' : ''}} value="0">Disable</option>
                    </select>
                </div>

                <div  class="form-group">
                    <label>Account Mode</label>
                    <select name="mode" id="" class="form-control">
                        <option {{$paypalSetting->mode == 0 ? 'selected' : ''}} value="0">Sandbox</option>
                        <option {{$paypalSetting->mode == 1 ? 'selected' : ''}} value="1">Live</option>
                    </select>
                </div>

                <div  class="form-group">
                    <label>Country</label>
                    <select name="country_name" id="" class="form-control">
                        <option selected >Philippines</option>
                        <option> United States of America</option>
                    </select>
                </div>


                <div  class="form-group">
                    <label>Currency Name</label>
                    <select name="currency_name" id="" class="form-control select2">
                        <option value="">Select</option>
                            @foreach ( config('settings.currency_list') as $currency ) //access settings config file
                            <option {{$currency == $paypalSetting->currency_name ? 'selected' : ''}} value="{{$currency}}">{{$currency}}</option>
                            @endforeach
                    </select>
                </div>

                <div  class="form-group">
                    <label>Currency rate (Per {{$paypalSetting->currency_name}})</label>
                    <input name="currency_rate" type="text" class="form-control" value="{{$paypalSetting->currency_rate}}">
                </div>

                <div  class="form-group">
                    <label>Paypal Client Id</label>
                    <input name="client_id" type="text" class="form-control" value="{{$paypalSetting->client_id}}">
                </div>

                <div  class="form-group">
                    <label>Paypal Secret Key</label>
                    <input name="secret_key" type="text" class="form-control" value="{{$paypalSetting->secret_key}}">
                </div>


                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
