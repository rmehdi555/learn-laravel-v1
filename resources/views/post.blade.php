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

<form action="testpost" method="post">
   {{ csrf_field() }}
    name : <input type="text" name="name">
    <br>
    <br>
    emall: <input type="email" name="email">
    <br>
    <br>
    <input type="submit">
</form>

</form>
</body>
</html>