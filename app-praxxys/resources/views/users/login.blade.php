<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <form method=get action="{{route('product.index')}}">
            Username <input type="text" name="username"/>
            Password <input type="password" name="password"/>
            <input type="submit" value="LOGIN"/>
        </form>
    </div>
</body>
</html>