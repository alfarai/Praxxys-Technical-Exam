<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/js/app.js'])
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    
    @if(Session::has('success'))
        <div>
            {{Session::get('success')}}
        </div>
    @endif
    <h1>Product</h1>
    <div>
        <a href="{{route('product.create')}}">Create a Product</a>
    </div>

    <div>
        
        {{-- <table border="2">
            <tr>
                
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Product Image</th>
                    <th>Date and Time</th>
                    <th>Edit</th>
                    <th>Delete</th>
                @foreach($products as $product) <!--from controller-->
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->Name}}</td>
                        <td>{{$product->Category}}</td>
                        <td>{{$product->Description}}</td>
                        <td><img src="{{$product->Image}}" width="200" height="112"/></td>
                        <td>{{$product->Date_and_Time}}</td>
                        <td>
                            <!--'product' is the parameter passed in url-->
                            <a href="{{route('product.edit',['product'=>$product])}}">Edit</a>
                        </td>
                        
                        <td>
                            <form method="post" action="{{route('product.delete',['product'=>$product])}}">
                                @csrf
                                @method('delete')
                                <input type="submit" value="DELETE"/>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tr>
        </table>
    </div>
--}}
    <div>
        <form method="POST" action="{{route('user.logout')}}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div> 

    <div id="app"><Products/></div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>