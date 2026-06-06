@extends('layout.master')

@section('title')
{{ $title }}
@endsection

@section('main_content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h3>Chat App</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            <i data-feather="home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">Chat</li>
                    <li class="breadcrumb-item active">Chat App</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <!-- Chat Sidebar -->
        <div class="col call-chat-sidebar">
            <div class="card">
                <div class="card-body chat-body">
                    <div class="chat-box">
                        <!-- Chat left side Start -->
                        <div class="chat-left-aside">
                            <div class="d-flex">
                                @if (!empty(\App\Models\User::getUserInfo($user_session->id)->profile_photo))
                                    <img src="{{ asset('profile_photo/') }}<?php    echo '/' . \App\Models\User::getUserInfo($user_session->id)->profile_photo; ?>"
                                        class="personal-avatar rounded-circle" width="50px" height="50px" alt="avatar"
                                        id="profileImagePreview">
                                @else
                                    <img src="{{ asset('149071.png') }}" alt="dummy-avatar"
                                        style="width: 50px; height: 50px;">
                                @endif
                                <div class="flex-grow-1">
                                    <div class="about">
                                        <div class="name f-w-600">
                                            <a href="#">{{ $user_session->name }}</a>
                                        </div>
                                        <div class="status">Status...</div>
                                    </div>
                                </div>
                            </div>
                            <div class="people-list" id="people-list">
                                <div class="search">
                                    <form class="theme-form">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input class="form-control" type="text" placeholder="Search">
                                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <ul class="list custom-scrollbar">
                                    @foreach ($users as $user)
                                        <li class="clearfix"
                                            onclick="openChat('{{ $user->id }}', '{{ $user->name }}', '{{ !empty(\App\Models\User::getUserInfo($user->id)->profile_photo) ? asset('profile_photo/' . \App\Models\User::getUserInfo($user->id)->profile_photo) : asset('149071.png') }}','{{ $user->last_seen }}');">
                                            <div class="d-flex align-items-center">
                                                @if (!empty(\App\Models\User::getUserInfo($user->id)->profile_photo))
                                                    <img src="{{ asset('profile_photo/') }}<?php        echo '/' . \App\Models\User::getUserInfo($user->id)->profile_photo; ?>"
                                                        class="rounded-circle user-image" width="50px" height="50px"
                                                        alt="{{ $user->name }}">
                                                @else
                                                    <img src="{{ asset('149071.png') }}" alt="dummy-avatar"
                                                        style="width: 50px; height: 50px;">
                                                @endif
                                                <div class="status-circle {{ $user->status }}"></div>
                                                <div class="flex-grow-1">
                                                    <div class="about">
                                                        <div class="name">{{ $user->name }}</div>
                                                        <div class="status">{{ $user->message }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- Chat left side Ends -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Chat Body -->
        <div class="col call-chat-body">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row chat-box">
                        <!-- Chat right side Start -->
                        <div class="col chat-right-aside">
                            <div class="chat">
                                <div class="d-flex chat-header clearfix align-items-start">
                                    <img class="rounded-circle" src="{{ asset('149071.png') }}" alt="avatar">
                                    <div class="flex-grow-1">
                                        <div class="about">
                                            <div class="name chat-header-name">User Name</div>
                                            <div class="status digits chat-header-status">Last Seen 3:55 PM</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Chat history -->
                                <div class="chat-history chat-msg-box custom-scrollbar">
                                    <ul></ul>
                                </div>
                                <!-- Chat message box -->
                                <div class="chat-message clearfix">
                                    <form id="chat-form">
                                        <div class="row">
                                            <div class="col-xl-12 d-flex">
                                                <div class="smiley-box bg-primary">
                                                    <div class="picker">
                                                        <img src="{{ asset('assets/images/smiley.png') }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="input-group text-box">
                                                    <input class="form-control input-txt-bx" id="message" type="text"
                                                        name="message" placeholder="Type a message......">
                                                    <button class="btn btn-primary input-group-text"
                                                        type="submit">SEND</button>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" class="receiver_id" name="receiver_id" value="">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Chat right side Ends -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
    $(document).ready(function () {
    // Submit chat message form using AJAX
    $('#chat-form').submit(function (e) {
        e.preventDefault();
        sendMessage();
    });
});

function fetchChatMessages() {
    let receiverId = $('.receiver_id').val();
    let senderId = "{{ Session::get('LoggedIn') }}";
    $.ajax({
        url: "{{ route('chat.messages') }}",
        method: "GET",
        data: {
            sender_id: senderId,
            receiver_id: receiverId
        },
        success: function (response) {
            console.log(response);
            displayMessages(response.messages, senderId);

            // Update messages as seen after fetching them
            updateMessagesAsSeen(response.messages);

            setTimeout(fetchChatMessages, 5000);  // Poll every 5 seconds
        },
        error: function (xhr) {
            console.log(xhr.responseText);
            setTimeout(fetchChatMessages, 5000);  // Retry after 5 seconds
        }
    });
}

function updateMessagesAsSeen(messages) {
    messages.forEach(function (message) {
        if (message.is_seen === 0) {
            $.ajax({
                url: "{{ route('chat.updateSeen') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    message_id: message.id  // Send the message ID to mark as seen
                },
                success: function (response) {
                    console.log('Message marked as seen:', message.id);
                },
                error: function (xhr) {
                    console.log("Error marking message as seen", xhr.responseText);
                }
            });
        }
    });
}

function openChat(receiverId, receiverName, receiverImage, lastSeen) {
    $('.chat').show();
    $('.receiver_id').val(receiverId);
    $('.chat-header .name').text(receiverName);

    if (receiverImage && receiverImage.trim() !== '') {
        $('.chat-header img').attr('src', receiverImage).css({ width: '40px', height: '40px' });
    } else {
        $('.chat-header img').attr('src', '{{ asset('149071.png') }}').css({ width: '40px', height: '40px' });
    }

    var lastSeenDate = new Date(lastSeen);
    var lastSeenFormatted = formatDate(lastSeenDate);
    $('.chat-header .status.digits').text('Última vez ' + lastSeenFormatted);

    fetchChatMessages();
}

function formatDate(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12 || 12;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    return date.toLocaleDateString() + ' ' + hours + ':' + minutes + ' ' + ampm;
}

function sendMessage() {
    let message = $('#message').val();
    let receiverId = $('.receiver_id').val();

    $.ajax({
        url: "{{ route('chat.send') }}",
        method: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            sender_id: "{{ Session::get('LoggedIn') }}",
            receiver_id: receiverId,
            message: message
        },
        success: function () {
            $('#message').val('');
            fetchChatMessages(receiverId);  // Refresh chat after sending message
        },
        error: function (xhr) {
            console.log(xhr.responseText);
        }
    });
}

function displayMessages(messages, senderId) {
    $('.chat-history ul').empty();

    messages.forEach(function (message) {
        let messageClass = message.sender_id == senderId ? 'my-message' : 'other-message';
        let positionClass = message.sender_id == senderId ? 'float-start' : 'float-end';
        let bgColorClass = message.sender_id == senderId ? 'bg-primary' : 'bg-secondary';
        let messageTime = new Date(message.created_at).toLocaleTimeString([], {
            hour: '2-digit',
            minute: '2-digit'
        });

        let profilePhotoUrl = message.sender_photo
            ? '{{ asset('profile_photo/') }}' + '/' + message.sender_photo
            : '{{ asset('149071.png') }}';

        let messageHtml = `
<li>
<div class="message ${messageClass} ${bgColorClass}">
<img class="rounded-circle chat-user-img img-30 ${positionClass}" src="${profilePhotoUrl}" alt="" style="width: 40px; height: 40px;">
<div class="message-data ${message.sender_id != senderId ? 'pull-right' : 'text-end'}">
  <span class="message-data-time">${messageTime}</span>
</div>
<div class="message-content">
  ${message.message}
</div>
</div>
</li>`;

        $('.chat-history ul').append(messageHtml);
    });
}

</script>
@endsection
