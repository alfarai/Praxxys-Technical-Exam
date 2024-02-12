<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Edit a product</h1>
    
    <div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
    </div>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('product.update',['product'=>$product])}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label>Name</label>
            <input type="text" name="Name" placeholder="Name" value="{{$product->Name}}"/>
        </div>

        <div>
            <label>Category</label>
            <input type="text" name="Category" placeholder="Category" value="{{$product->Category}}"/>
        </div>

        <div>
            <label>Description</label>
            <input type="text" name="Description" placeholder="Description" value="{{$product->Description}}"/>
        </div>

        <div>
            <label>Image</label>
            <input type="file" name="Image" multiple/>
        </div>
        
        <div>
            <label>Date</label>
            <input type="date" name="Date" placeholder="Date" value="{{$date = explode(' ',$product->Date_and_Time)[0]}}"/>
        </div>

        <div>
            <label>Time</label>
            <input type="time" name="Time" placeholder="Time" value="{{$date = explode(' ',$product->Date_and_Time)[1]}}"/>
        </div>

        <div>
            <input type="submit" value="UPDATE">
        </div>
    </form>
</body>
</html>