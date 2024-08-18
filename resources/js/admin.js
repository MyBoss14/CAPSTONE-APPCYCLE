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


window.Echo.private('message.'+ USER.id).listen(
    "MessageEvent",
    (e)=>{

        let mainChatInbox = $('.chat-content');

        if(mainChatInbox.attr('data-inbox') == e.sender_id){
                var message =`
                    <div class="chat-item chat-left" style=""><img
                        style="height:50px;
                        object-fit:cover;" src="${e.sender_image}"><div class="chat-details"><div class="chat-text">${e.message}</div><div class="chat-time">${formatDateTime(e.date_time)}</div></div>
                    </div>
                    `
        }
        mainChatInbox.append(message);
        scrollToBottom();

        //add notification in profile
        $('.chat-user-profile').each(function(){
        let profileUserId = $(this).data('id');
        if(profileUserId == e.sender_id){
            $(this).find('img').addClass('msg-notification');

        }
    })

    }
)
