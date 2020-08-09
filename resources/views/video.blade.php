@extends('layouts.app')

@section('styles')
    <link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet" />
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <div class="card-header">{{ $video->title }}</div>

                <div class="card-body">
                    <video id="my-player"
                           class="video-js vjs-theme-city"
                              controls preload="auto"
                              width="640"
                              height="268">
                        <source
                            src="{{ asset(Storage::url("videos/{$video->id}/{$video->id}.m3u8")) }}"
                            type="application/x-mpegURl">
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="https://unpkg.com/video.js@7.8.2/dist/video.min.js"></script>
    <script>
        var options = {};

        var player = videojs('my-player', options, function onPlayerReady() {
            videojs.log('Your player is ready!');

            // In this context, `this` is the player that was created by Video.js.
            this.play();

            // How about an event listener?
            this.on('ended', function() {
                videojs.log('Awww...over so soon?!');
            });
        });
    </script>
@endsection
