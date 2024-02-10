<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(Session::has('fail'))
        <div>
            {{Session::get('fail')}}
        </div>
    @endif
    <div>
        <form method=post action="{{route('user.register')}}">
            @csrf
            @method('post')
            Username <input type="text" name="username"/>
            Email <input type="text" name="email"/>
            Password <input type="password" name="password"/>
            Confirm Password <input type="password" name="confirmpassword"/>
            <input type="submit" value="REGISTER"/>
        </form>
    </div>
</body>
</html>