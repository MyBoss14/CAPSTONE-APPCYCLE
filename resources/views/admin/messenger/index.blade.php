@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
      <h1>Messages</h1>

    </div>

    <div class="section-body">



      <div class="row align-items-center justify-content-center">
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">
              <h4>Who's Online?</h4>
            </div>
            <style>
                .msg-notification {
                    border: 5px solid #53bb00 !important;
                }
            </style>
            <div class="card-body " style="height: 63vh;">
              <ul class="list-unstyled list-unstyled-border">
                @foreach ($chatUsers as $chatUser )
                @php
                    $unseenMessage = \App\Models\Chat::where(['sender_id'=>$chatUser->senderProfile->id, 'receiver_id'=> auth()->user()->id, 'seen'=>0])->exists();
                @endphp
                <li class="media chat-user-profile " data-id="{{$chatUser->senderProfile->id}}">
                    <img alt="image" class="mr-3 rounded-circle {{ $unseenMessage ? 'msg-notification' : '' }}" width="50" height="45" src="{{asset($chatUser->senderProfile->image)}}" >
                    <div class="media-body">
                      <div class="mt-0 mb-1 font-weight-bold chat-user-name">{{$chatUser->senderProfile->name}}</div>
                      {{-- <div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i> Online</div> --}}
                    </div>
                  </li>
                @endforeach


              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="card chat-box" id="mychatbox" style="height: 70vh;">
            <div class="card-header">
              <h4 id="chat-inbox-title"> </h4>
            </div>
            <div class="card-body chat-content overflow-auto" data-inbox="" >

            </div>
            <div class="card-footer chat-form">
              <form id="message-form">
                @csrf
                <input type="text" class="form-control message_box" placeholder="Type a message" name="message">
                <input type="hidden" name="receiver_id" id="receiver_id">

                <button class="btn btn-primary">
                  <i class="far fa-paper-plane"></i>
                </button>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

@endsection
@push('scripts')
  <script>
    const mainChatInbox = $('.chat-content');

    // format sa time
    function formatDateTime(dateTimeString){
        const options = {
            year: 'numeric',
            month: 'short',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit'
        }

        const formatedDateTime = new Intl.DateTimeFormat('en-Us', options).format(new Date(dateTimeString));

        return formatedDateTime;
    }

    // scroll to bottom
    function scrollToBottom(){
        mainChatInbox.scrollTop(mainChatInbox.prop("scrollHeight"));
    }

    $(document).ready(function(){
        // chat users
        $('.chat-user-profile').on('click', function(){
            let receiverId = $(this).data('id'); //set the data id
            let chatUserName = $(this).find('.chat-user-name').text();
            mainChatInbox.attr('data-inbox', receiverId);
            $(this).find('img').removeClass('msg-notification');

            // get user image
            let receiverImage = $(this).find('img').attr('src')


            $('#receiver_id').val(receiverId); //set the vlue base on data id

            $.ajax({
                method:'GET',
                url:"{{route('admin.get-messages')}}",
                data:{
                    receiver_id: receiverId
                },
                beforeSend: function(){
                    mainChatInbox.html("");
                    // chat box title
                    $('#chat-inbox-title').text(`${chatUserName}`)

                },
                success:function(response){
                    //  create and append chat messages
                    $.each(response, function(index,value){
                        //set if ikaw ang sender sa right imo message,, if not sa left
                        if(value.sender_id == USER.id){
                            var message =`
                                    <div class="chat-item chat-right" style=""><img
                                        style="height:50px;
                                        object-fit:cover;" src="${USER.image}"><div class="chat-details"><div class="chat-text">${value.message}</div><div class="chat-time">${formatDateTime(value.created_at)}</div></div>
                                    </div>
                                    `
                        } else {
                            var message =`
                                    <div class="chat-item chat-left" style=""><img
                                        style="height:50px;
                                        object-fit:cover;" src="${receiverImage}"><div class="chat-details"><div class="chat-text">${value.message}</div><div class="chat-time">${formatDateTime(value.created_at)}</div></div>
                                    </div>
                                    `
                                }

                        mainChatInbox.append(message);
                    });
                    // scroll to bottom
                    scrollToBottom();



                },
                error: function(xhr, status, error){

                },
                complete: function(){

                }
            })
        })

        // sending message
        $('#message-form').on('submit', function(e){
                e.preventDefault();
                let formDaTA = $(this).serialize();
                let messageData =$('.message_box').val();

                var formSubmitting = false;

                if(formSubmitting  || messageData === ""){
                    return;
                }

                // meesage inbox
                let message =`<div class="chat-item chat-right" style=""><img style="height:50px;
                            object-fit:cover;" src="${USER.image}"><div class="chat-details"><div class="chat-text">${messageData}</div><div class="chat-time"></div></div></div>`



                mainChatInbox.append(message);
                $('.message_box').val('');
                scrollToBottom();

                $.ajax({
                    method:'POST',
                    url: "{{route('admin.send-message')}}",
                    data: formDaTA,
                    // spinner
                    beforeSend: function() {

                        $('.send_button').prop('disabled',true);
                        formSubmitting = true;
                    },
                    success: function(response){


                    },
                    error: function(xhr, status, error){

                        $('.send_button').prop('disabled',false);
                        formSubmitting = false;
                    },
                    complete: function(){

                        $('.send_button').prop('disabled', false);
                        formSubmitting = false;

                    }
                })
        })
    })
  </script>



@endpush


