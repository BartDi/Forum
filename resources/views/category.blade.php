<head>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<x-Header id="{{auth()->id()}}"/>
@foreach($posts as $post)
<h1>{{$post->topic}}</h1>
<div class="container" style="padding:100px; border:1px solid black;">
        <div class="row justify-content-start">
            <div class="col-2">
                <h5><a href='{{url("users/{$post->user_id}")}}'>{{$post->user_name}}</a></h5>
            </div>
            <div class="col-5">
                <h4 style="float:left;">{{$post->likes}}</h4>
                <a href='{{url("like/{$post->id}")}}'><img src="{{URL('/images/heart.png')}}" alt="like"></a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col" style="text-align:center;">
                <a href='{{url("post/{$post->id}")}}'><h3><u>{{$post->title}}</u></h3></a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>{{$post->content}}</p>
            </div>
        </div>
    </div>
@endforeach