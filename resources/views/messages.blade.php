<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
</body>
</html>