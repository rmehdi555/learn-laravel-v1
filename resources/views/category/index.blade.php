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

<form action="category" method="post">
    {{csrf_field()}}
    <input type="text" name="title">
    <input type="submit">
</form>

<table>
    @foreach($categories as $category)
       <tr>

           <td>{{$category->id}}</td>
           <td>{{$category->title}}</td>
           <td>
               <form action="category/{{$category->id}}" method="post">
                   {{method_field('delete')}}
                   {{csrf_field()}}
                   <input type="submit" value="delete">
               </form>
           </td>
       </tr>
    @endforeach
</table>

</body>
</html>