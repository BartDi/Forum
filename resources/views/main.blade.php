<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <a href="{{URL::to('create')}}"><h2>Create your post</h2></a>
    <h1>Posts:</h1>
    @foreach ($posts as $post)
    <div class="container" style="padding:100px; border:1px solid black;">
        <div class="row justify-content-start">
            <div class="col-2">
                <h5><a href='{{url("users/{$post->user_id}")}}'>{{$post->user_name}}</a></h5>
            </div>
            <div class="col-2">
                <h6 style="background-color:grey;border:1px solid black; text-align:center; border-radius:9%;">{{$post->topic}}</h6>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col" style="text-align:center;">
                <h3><u>{{$post->title}}</u></h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>{{$post->content}}</p>
            </div>
        </div>
    </div>
    @endforeach
</body>
</html>