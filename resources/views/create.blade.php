<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{URL::to('create')}}" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{$user_id}}">
    <input type="hidden" name="user_name" value="{{$user_name}}">
    
    <label>Title: </label>
    <input type="text" name="title"><br>
    <label>Topic: </label>
    <select>
    @foreach ($categories as $category)
    <option>{{$category['name']}}</option>
    @endforeach 
    </select><br>
    <label>Content: </label>
    <input type="text" name="content"><br>
    <input type="submit">
    </form>
</body>
</html>