@extends('frontend.dashboard.layouts.master')

@section('content')

<section id="wsus__dashboard">
    <div class="container-fluid">
        {{-- sidebar --}}
        @include('frontend.dashboard.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
              <div class="dashboard_content mt-2 mt-md-0">
                <h3><i class="far fa-star"></i>Message</h3>
                <div class="wsus__dashboard_review">
                  <div class="row">
                    <div class="col-xl-4 col-md-5">
                      <div class="wsus__chatlist d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                          aria-orientation="vertical">
                          <h2>Message List</h2>
                          <div class="wsus__chatlist_body">
                            <style>
                                .msg-notification {
                                    border: 5px solid #53bb00 !important;
                                }
                            </style>
                            @foreach ($chatUsers as $chatUser)
                            @php
                                $unseenMessage = \App\Models\Chat::where(['sender_id'=>$chatUser->receiverProfile->id, 'receiver_id'=> auth()->user()->id, 'seen'=>0])->exists();
                            @endphp
                                <button class="nav-link chat-user-profile"
                                        data-id="{{$chatUser->receiverProfile->id}}"
                                        data-bs-toggle="pill"
                                        data-bs-target="#v-pills-home"
                                        type="button"
                                        role="tab"
                                        aria-controls="v-pills-home"
                                        aria-selected="true">
                                    <div class="wsus_chat_list_img {{ $unseenMessage ? 'msg-notification' : '' }}" >

                                        <img src="{{asset($chatUser->receiverProfile->image)}}" alt="user" class="img-fluid">
                                    </div>
                                    <div class="wsus_chat_list_text">
                                        <h4>{{$chatUser->receiverProfile->name}}</h4>
                                    </div>
                                </button>
                            @endforeach
                        </div>
                          {{-- <div class="wsus__chatlist_body">
                            @foreach ($chatUsers as $chatUser)

                            <button class="nav-link chat-user-profile"
                            data-id="{{$chatUser->receiverProfile->id}}"
                            data-bs-toggle="pill"
                            data-bs-target="#v-pills-home"
                            type="button"
                            role="tab"
                            aria-controls="v-pills-home"
                            aria-selected="true">
                            <div class="wsus_chat_list_img msg-notification">
                              <img src="{{asset($chatUser->receiverProfile->image)}}" alt="user" class="img-fluid">
                            </div>
                            <div class="wsus_chat_list_text">
                              <h4>{{$chatUser->receiverProfile->name}}</h4>

                            </div>
                            </button>
                            @endforeach


                          </div> --}}
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-8 col-md-7">
                      <div class="wsus__chat_main_area">
                        <div class="tab-content" id="v-pills-tabContent">
                          <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="wsus__chat_area" style="position:relative;">
                              <div class="wsus__chat_area_header">
                                <h2 id="chat-inbox-title"></h2>
                              </div>
                              <div class="wsus__chat_area_body" style="height: 100% !important;" data-inbox="">




                              </div>
                              <div class="wsus__chat_area_footer" style="

                              width:100%;
                              ">
                                <form id="message-form">
                                    @csrf
                                  <input type="text"
                                  class="message_box"
                                  name="message"
                                  placeholder="Type Message"
                                  id="message"
                                  autocomplete="off">
                                  <input type="hidden"
                                  name="receiver_id"
                                  id="receiver_id"
                                  value=""
                                  >
                                  <button type="submit"><i class="fas fa-paper-plane send_button"></i></button>
                                </form>
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
    </div>
  </section>
@endsection

@push('scripts')
<script>
    // calling this class later para e append ang chat messages
    const mainChatInbox = $('.wsus__chat_area_body');

    // date
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
            let receiverId = $(this).data('id');
            let chatUserName = $(this).find('h4').text();
            let senderImage =$(this).find('img').attr('src');
            mainChatInbox.attr('data-inbox', receiverId);
            //delete ang boarder if e click
            $(this).find('.wsus_chat_list_img').removeClass('msg-notification');


            $('#receiver_id').val(receiverId);

            $.ajax({
                method:'GET',
                url:"{{route('user.get-messages')}}",
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
                        if(value.sender_id == USER.id){
                            var message =`<div class="wsus__chat_single single_chat_2">
                                    <div class="wsus__chat_single_img">
                                      <img src="${USER.image}" alt="user" class="img-fluid">
                                    </div>
                                    <div class="wsus__chat_single_text">
                                      <p>${value.message}</p>
                                      <span>${formatDateTime(value.created_at)}</span>
                                    </div>
                                </div>`
                        } else {
                            var message =`<div class="wsus__chat_single">
                                    <div class="wsus__chat_single_img">
                                      <img src="${senderImage}" alt="user" class="img-fluid">
                                    </div>
                                    <div class="wsus__chat_single_text">
                                      <p>${value.message}</p>
                                      <span>${formatDateTime(value.created_at)}</span>
                                    </div>
                                </div>`
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
                let message = `
                    <div class="wsus__chat_single single_chat_2">
                        <div class="wsus__chat_single_img">
                            <img src="${USER.image}" alt="user" class="img-fluid">
                        </div>
                        <div class="wsus__chat_single_text">
                            <p>${messageData}</p>
                            <span></span>
                        </div>
                    </div>`
                mainChatInbox.append(message);
                $('.message_box').val('');
                scrollToBottom();


                $.ajax({
                    method:'POST',
                    url: "{{route('user.send-message')}}",
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
