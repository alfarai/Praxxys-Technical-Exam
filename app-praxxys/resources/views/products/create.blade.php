<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .container-center {
            width: 640px;
            /* Can be in percentage also. */
            height: auto;
            margin: 0 auto;
            top: 50px;
            padding: 10px;
            position: relative;
            background-color: #353334;
            border-radius: 10px;
            color: white;
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
    <div class="container container-center">
        <h1 class="display-3 font-weight-bold text-center">Create a product</h1>

        
        <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input class="form-control" type="text" name="Name" placeholder="Name" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="products">Category</label>
                <select class="form-control" id="products" name="Category">
                    <option value="Fruits">Fruits</option>
                    <option value="Vegetables">Vegetables</option>
                    <option value="Meat">Meat</option>
                    <option value="Chicken">Chicken</option>
                    <option value="Beef">Beef</option>
                    <option value="Other">Others</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <input class="form-control" type="text" name="Description" placeholder="Description" />
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input class="form-control" type="file" name="Image" multiple />
            </div>

            <div class="mb-3">
                <label class="form-label">Date</label>
                <input class="form-control" type="date" name="Date" placeholder="Date" />
            </div>

            <div class="mb-3">
                <label class="form-label">Time</label>
                <input class="form-control" type="time" name="Time" placeholder="Time" />
            </div>

            <div class="mb-3 text-center">
                <button class="btn btn-success" type="submit">SAVE</button>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>