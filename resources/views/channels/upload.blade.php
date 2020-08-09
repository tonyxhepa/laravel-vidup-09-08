@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <channel-upload :channel="{{ $channel }}" inline-template>
                <div class="col-md-8">
                    <div class="card p-3 d-flex justify-content-center align-items-center" v-if="!selected">
                        <div class="form-group row justify-content-center">
                            <div onclick="document.getElementById('video-files').click()" class="channel-avatar">
                                <input type="file" multiple id="video-files" style="display: none;" ref="videos" @change="upload">
                            </div>
                        </div>
                    </div>
                    <div class="card p-3" v-else>
                        <div class="my-4" v-for="video in videos">
                            <div class="progress mb-3">
                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                     role="progressbar"
                                     :style="{width: `${video.percentage || progress[video.name]}%`}"
                                     aria-valuenow="50"
                                     aria-valuemin="0"
                                     aria-valuemax="100"
                                >
                                    @{{ video.percentage ? video.percentage === 100 ? 'Completed' : 'Processing' : 'Uploading' }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div v-if="!video.thumbnail" class="d-flex justify-content-center align-items-center"
                                         style="height: 180px; color: white; font-size: 18px;">
                                        Loading image...
                                    </div>
                                    <img :src="video.thumbnail" v-else style="width: 100px;" alt="">
                                </div>
                                <div class="col-md-4">
                                    <a :href="`/videos/${video.id}`"
                                       v-if="video.percentage && video.percentage === 100"
                                       target="_blank">
                                        @{{ video.title }}
                                    </a>
                                    <div v-else class="text-center"
                                         style="height: 180px; color: white; font-size: 18px;">
                                        @{{ video.title || video.name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </channel-upload>

        </div>
    </div>
@endsection
