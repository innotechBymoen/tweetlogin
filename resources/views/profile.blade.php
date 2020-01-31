@extends('layouts.app')

@section('content')
    @guest
        <p>No Tweets for you!</p>
    @else
        <h1>Welcome {{ Auth::user()->name }}</h1>
        <br><br>
        <div style="margin-left: 10vw">
        @foreach ($tweets as $tweet)
                <p><strong>{{ $tweet->author }}</strong></p>
                <div style="width: 75vw;">
                    <p style="word-break: break-all;">{{$tweet->content}}</p>
                </div>
                <p><strong>{{ $tweet->created_at }}</strong></p>
                @if ( Auth::user()->name == $tweet->author)
                    <form action="deleteTweet" method="post">
                        <button type="submit" name="delete" value="{{$tweet->id}}" >Delete Tweet</button>
                    </form>
                @endif
                <br>
                <br>
            @endforeach
        </div>
        <div style="margin-left: 25vw">
            <form action="/profile/postTweet" method="post">
                @csrf
                <input type="hidden" name="author" value="{{ Auth::user()->name }}">
                <textarea name="content" value="Content" style="width: 50vw; height: 20vh; display: block; resize: none;"></textarea>
                <input type="submit" value="Create Tweet">
            </form>
        </div>
    @endguest
@endsection
