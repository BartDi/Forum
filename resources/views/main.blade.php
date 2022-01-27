<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{URL::to('create')}}"><h2>Stwórz post</h2></a>
    <h1>Main</h1>
    @foreach ($posts as $post)
    {{$post}}

    @endforeach
</body>
</html>