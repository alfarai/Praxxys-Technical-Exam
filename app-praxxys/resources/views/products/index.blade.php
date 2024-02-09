<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Product</h1>
    <div>
<a href="{{route('product.create')}}">Create a Product</a>
    </div>
    <div>
        <table border="2">
            <tr>
                
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Date and Time</th>
                    <th>Edit</th>
                    <th>Delete</th>
                @foreach($products as $product) <!--from controller-->
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->Name}}</td>
                        <td>{{$product->Category}}</td>
                        <td>{{$product->Description}}</td>
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
</body>
</html>