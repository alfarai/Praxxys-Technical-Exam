<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
        </ul>
        @endif
    @if(Session::has('fail'))
    <div>
        {{Session::get('fail')}}
    </div>
    @endif
    <div>
        <form method=post action="{{route('user.login')}}">
            @csrf
            @method('post')
            Username <input type="text" name="username"/>
            Password <input type="password" name="password"/>
            <input type="checkbox" name="remember" />Remember Me
            <input type="submit" value="LOGIN"/>
        </form>
    </div>
</body>
</html>