<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .container-center {
            width: 520px;
            /* Can be in percentage also. */
            height: auto;
            margin: 0 auto;
            top: 110px;
            padding: 20px;
            position: relative;
            background-color: #353334;
            border-radius: 10px;
            color: white;
        }
    </style>
</head>
<body style="background-color:#211f20;">
    @if(Session::has('fail'))
        <div>
            {{Session::get('fail')}}
        </div>
    @endif
    <div class="container container-center">
        <div class="mb-3">
            <h1 class="display-3 font-weight-bold text-center">Register</h1>

            <form method=post action="{{route('user.register')}}">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input class="form-control" type="text" name="username"/>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="text" name="email"/>
                </div>
                 
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="password" name="password" />
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input class="form-control" type="password" name="confirmpassword" />
                </div>

                <div class="mb-3 text-center">

                    <div style="margin-bottom:10px;">
                        <a href="{{route('user.login')}}" class="">Already have an account?</a>
                    </div>
                    <button class="btn btn-success" type="submit">REGISTER</button>
                </div>
                
            </form>
        </div>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>