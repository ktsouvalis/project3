<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chat</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <div class="chat-box">
            <div class="messages">
                @foreach($messages as $message)
                    <div class="message">
                        <strong>{{ $message->user->name }}:</strong> {{ $message->content }}
                    </div>
                @endforeach
            </div>
            <div class="new-message">
                <form action="{{ route('messages.store') }}" method="POST">
                    @csrf
                    <textarea name="content" rows="3" placeholder="Type your message here..."></textarea>
                    <button type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        window.onload = function() {
            // Initialize Echo listener for incoming messages
            // console.log(window.Echo.channel('chatroom'));
            window.Echo.private('chatroom')
                .listen('MessageSent', (e) => {
                    alert('New message received!'); // Optional: Display an alert when a new message is received
                    console.log(e); // Log the entire event data for verification
    
                    // Access message and user details directly
                    let message = document.createElement('div');
                    message.classList.add('message');
                    message.innerHTML = `<strong>${e.user.name}:</strong> ${e.message}`;
                    document.querySelector('.messages').appendChild(message);
                });
    
            // let messages = document.querySelector('.messages');
            // let newMessage = document.querySelector('.new-message');
            // let form = newMessage.querySelector('form');
            // let textarea = form.querySelector('textarea');
    
            // form.onsubmit = function(event) {
            //     event.preventDefault();
    
            //     let content = textarea.value;
    
            //     if (content.trim() === '') {
            //         return;
            //     }
    
            //     fetch(form.action, {
            //         method: 'POST',
            //         headers: {
            //             'Content-Type': 'application/json',
            //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            //         },
            //         body: JSON.stringify({ content })
            //     })
            //     .then(response => response.json())
            //     .then(data => {
            //         let message = document.createElement('div');
            //         message.classList.add('message');
            //         message.innerHTML = `<strong>${data.user}:</strong> ${data.message}`;
            //         messages.appendChild(message);
            //         textarea.value = '';
            //     });
            // };
        };
    </script>
    
    
</body>
</html>