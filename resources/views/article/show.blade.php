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
<tr>

    <td>{{$article->id}}</td>
    <td>
        <img src="/images/{{$article->image}}" alt="">
    </td>
    <td>{{$article->title}}</td>
    <td>{{$article->body}}</td>
    <td>{{$article->source}}</td>




    <hr>
    <ul>

        @foreach($article->categories as $category)
            <li>{{$category->id}}:{{$category->title}}</li>
        @endforeach
    </ul>

    <hr>

    <form method="post" action="{{$article->id}}/comment">
        {{csrf_field()}}
        name:<input name="author">
        comment<textarea name="body"></textarea>
        <input type="submit">
    </form>

</tr>

<hr>
<br>
<ul>

    @foreach($article->comments as $comment)
        <li>{{$comment->author}}:{{$comment->body}}</li>
    @endforeach
</ul>

</body>
</html>