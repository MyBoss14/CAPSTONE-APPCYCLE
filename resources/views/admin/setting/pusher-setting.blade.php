<div class="tab-pane fade" id="pusher-setting" role="tabpanel" aria-labelledby="list-pusher-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.pusher-setting-update')}}" method="POST">
                @csrf
                @method('PUT')



                <div  class="form-group">
                    <label>APP ID (<code>PUSHER</code>)</label>
                    <input name="pusher_app_id" type="text" class="form-control" value="{{$pusherSetting?->pusher_app_id}}">
                </div>

                <div  class="form-group">
                    <label>Key (<code>PUSHER</code>)</label>
                    <input name="pusher_key" type="text" class="form-control" value="{{$pusherSetting?->pusher_key}}">
                </div>

                <div  class="form-group">
                    <label>SECRET (<code>PUSHER</code>)</label>
                    <input name="pusher_secret" type="text" class="form-control" value="{{$pusherSetting?->pusher_secret}}">
                </div>

                <div  class="form-group">
                    <label>CLUSTER (<code>PUSHER</code>)</label>
                    <input name="pusher_cluster" type="text" class="form-control" value="{{$pusherSetting?->pusher_cluster}}">
                </div>






                <button type="submit" class="btn btn-primary mt-4">Save</button>
            </form>
        </div>
    </div>
   </div>
