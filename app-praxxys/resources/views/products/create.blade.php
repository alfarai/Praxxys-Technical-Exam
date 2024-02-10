<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create a product</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div>
            <label>Name</label>
            <input type="text" name="Name" placeholder="Name"/>
        </div>

        <div>
            <label for="products">Category</label>
            <select id="products" name="Category">
                <option value="Fruits">Fruits</option>
                <option value="Vegetables">Vegetables</option>
                <option value="Meat">Meats</option>
                <option value="Chicken">Chicken</option>
                <option value="Beef">Beef</option>
                <option value="Other">Others</option>
            </select>
        </div>

        <div>
            <label>Description</label>
            <input type="text" name="Description" placeholder="Description"/>
        </div>

        <div>
            <label>Image</label>
            <input type="file" name="Image" multiple/>
        </div>
        
        <div>
            <label>Date</label>
            <input type="date" name="Date" placeholder="Date"/>
        </div>

        <div>
            <label>Time</label>
            <input type="time" name="Time" placeholder="Time"/>
        </div>

        <div>
            <input type="submit" value="SAVE">
        </div>
    </form>
</body>
</html>