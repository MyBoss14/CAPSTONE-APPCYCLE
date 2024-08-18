<div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.email-setting-update')}}" method="POST">
                @csrf
                @method('PUT')



                <div  class="form-group">
                    <label>Email (<code>reciever email</code>)</label>
                    <input name="email" type="text" class="form-control" value="{{$emailSettings->email}}">
                </div>


                <div class="form-group">
                    <label>Mail Host </label>
                    <input name="host" type="text" class="form-control" value="{{$emailSettings->host}}">
                </div>




                <div class="row">
                    <div class="col-md-6">
                        <label>SMTP username</label>
                        <input name="username" type="text" class="form-control" value="{{$emailSettings->username}}">
                    </div>

                    <div class="col-md-6">
                        <label>SMTP password</label>
                        <input name="password" type="text" class="form-control" value="{{$emailSettings->password}}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Mail port</label>
                        <input name="port" type="text" class="form-control" value="{{$emailSettings->port}}">
                    </div>

                    <div class="col-md-6">
                        <label>Mail Encryption</label>
                        <select name="encryption" id="" class="form-control">
                           <option {{$emailSettings->encryption == 'tls' ? 'selected' : ''}} value="tls">TLS</option>
                           <option {{$emailSettings->encryption == 'ssl' ? 'selected' : ''}} value="ssl">SSL</option>
                        </select>
                    </div>
                </div>



                <button type="submit" class="btn btn-primary mt-4">Update</button>
            </form>
        </div>
    </div>
   </div>
