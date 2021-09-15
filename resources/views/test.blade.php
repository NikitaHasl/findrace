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
    <form action="{{route('testScript')}}" method="get">
        <p>Moscow<input type="checkbox" name="id city1" value="1"></p>
        <p>Peter<input type="checkbox" name="id city2" value="2"></p>
        <p>Kazan<input type="checkbox" name="id city3" value="3"></p>
        <p>Run<input type="checkbox" name="id type1" value="1"></p>
        <p>Swim<input type="checkbox" name="id type2" value="2"></p>
        <p>Cycle<input type="checkbox" name="id type3" value="3"></p>
        <p>Triathlon<input type="checkbox" name="id type4" value="4"></p>
        <input type="submit" value="submit">
    </form>
</body>
</html>
