<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="../{{$article->id}}" method="post" enctype="multipart/form-data" >
    {{method_field('put')}}
    {{csrf_field()}}

    title : <input type="text" name="title" value="{{$article->title}}">
    <br><br>
    body : <textarea name="body" >{{$article->body}} </textarea>
    <br><br>
    source : <input  type="text" name="source" value="{{$article->source}}">
    <br><br>
    image: <input type="file" name="image" id="image">

    <br><br>
    <select name="categories[]" id="" multiple>
        @foreach($categories as $category)
            <option value=" {{$category->id}}"
                    @if($article->hasCategory($category->id)) selected @endif> {{$category->title}}</option>

        @endforeach
    </select>

    <input type="submit">


</form>
</body>
</html>