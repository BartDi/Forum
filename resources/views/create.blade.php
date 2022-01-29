<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{URL::to('create')}}" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{$user_id}}">
    <input type="hidden" name="user_name" value="{{$user_name}}">
    <div>
    <label for="title">Title</label>
    <input type="text" id="title" name="title">
    <label for="topic">Topic:</label>
    <select id="topic" name="topic">
        <option selected disabled>Choose one</option>
        @foreach ($categories as $category)
        <option>{{$category['name']}}</option>
        @endforeach 
    </select>
    </div>
    <div>
    <label for="textarea" >Content:</label><br>
    <textarea rows="5" cols="70" id="textarea" name="content"></textarea>
    </div>
    <input type="submit">
    </form>
<h4><a href="{{URL::to('addCat')}}">Do you want to add Category?</a></h4>
</body>
</html>