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

<form method="get" action="/article" >


    <input type="text" name="q">
    <input type="submit" value="search">

</form>

<table border="2">
    @foreach($articles as $article)
        <tr>

            <td>{{$article->id}}</td>
            <td>{{$article->title}}</td>
            <td>{{$article->body}}</td>
            <td>{{$article->source}}</td>
            <td><a href="article/{{$article->id}}">show</a></td>
            <td><a href="article/{{$article->id}}/edit">edit</a></td>
            <td>
                <form action="article/{{$article->id}}" method="post">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <input type="submit" value="delete">
                </form>
            </td>

        </tr>
        @endforeach
</table>

{{$articles->fragment('foo')->links()}}
</body>
</html>