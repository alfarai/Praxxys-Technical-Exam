<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .container-center {
            width: 640px; /* Can be in percentage also. */
    height: auto;
    margin: 0 auto;
    top:50px;  
    padding: 10px;
    position: relative;
    background-color:#353334;
    border-radius:10px;
    color:white;
        }
    </style>
</head>


<body style="background-color:#211f20;">



    <div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
    </div>
    <div class="text-light">
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <div class="container-fluid container-center">

        <h1 class="display-3 font-weight-bold text-center">Edit a product</h1>
        <form method="post" action="{{route('product.update',['product'=>$product])}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input class="form-control" type="text" name="Name" placeholder="Name" value="{{$product->Name}}" />
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <input class="form-control" type="text" name="Category" placeholder="Category"
                    value="{{$product->Category}}" />
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <input class="form-control" type="text" name="Description" placeholder="Description"
                    value="{{$product->Description}}" />
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input class="form-control" type="file" name="Image" multiple />
            </div>

            <div class="mb-3">
                <label class="form-label">Date</label>
                <input class="form-control" type="date" name="Date" placeholder="Date"
                    value="{{$date = explode(' ',$product->Date_and_Time)[0]}}" />
            </div>

            <div class="mb-3">
                <label class="form-label">Time</label>
                <input class="form-control" type="time" name="Time" placeholder="Time"
                    value="{{$date = explode(' ',$product->Date_and_Time)[1]}}" />
            </div>

            <div class="mb-3 text-center">
                <button class="btn btn-success" type="submit">UPDATE</button>
            </div>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>