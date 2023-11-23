@extends('layouts.app')
@section('content')
    <div>
        <h1>Camera Feed</h1>
        <img id="camera-feed" alt="Camera Feed" data-video-feed-url="{{ $videoFeedUrl }}">
        <button id="camera-btn">Start Camera</button>
    </div>
   
@endsection