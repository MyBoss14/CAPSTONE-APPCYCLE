<div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.cod-setting.ipdate', 1)}}" method="POST">
                @csrf
                @method('PUT')
                <div  class="form-group">
                    <label>Cash on Delivery Status</label>
                    <select name="status" id="" class="form-control">
                        <option {{$codSetting->status == 1 ? 'selected' : ''}} value="1">Enable</option>
                        <option {{$codSetting->status == 0 ? 'selected' : ''}} value="0">Disable</option>
                    </select>
                </div>



                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
  </div>
