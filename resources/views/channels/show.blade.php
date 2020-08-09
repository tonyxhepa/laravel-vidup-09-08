@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">

                        {{ $channel->name }}

                        <a href="{{ route('channels.upload', $channel->id) }}">Upload videos</a>
                    </div>

                    <div class="card-body">
                        @if($channel->editable())
                        <form id="update-channel-form" action="{{ route('channels.update', $channel->id) }}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            @endif

                            <div class="form-group row justify-content-center">
                                <div class="channel-avatar" onclick="document.getElementById('image').click()">
                               <img src="{{ $channel->image() }}" alt="image">
                                </div>
                            </div>
                            <div class="form-group">
                                <h4 class="text-center">{{ $channel->name }}</h4>
                                <p class="text-center">{{ $channel->description }}</p>
                            </div>

                            @if($channel->editable())
                            <input onchange="document.getElementById('update-channel-form').submit()" type="file" id="image" name="image" style="display: none;">
                            <div class="form-group">
                                <label for="name" class="label">
                                    Name
                                </label>
                                <input type="text" value="{{ $channel->name }}" id="name" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description" class="label">
                                    Description
                                </label>
                                <textarea name="description" id="description" class="form-control">{{ $channel->description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Update Channel
                            </button>
                            @endif
                            @if($channel->editable())
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
