@extends('layouts.app')

@section('content')
    <video id="background-video" playsinline autoplay muted loop poster="#">
        <source src="{{ asset('storage/videos/theatre_chairs.mp4') }}" type="video/webm">
        Your browser doesnt support the video tag.
    </video>
@endsection
