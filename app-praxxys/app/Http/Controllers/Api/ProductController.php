<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request){
        $pagination = 4;
        #FILTERING IS DONE AT DATABASE LEVEL
        #if the incoming request contains a valid category that isnt none, then the database is filtered to only select
        #records with taht specific category, and the query result is paginated and stored in $products as a json response.
        #otherwise, if 'none' category, then paginate all records and store everything as json reponse
        $queryCategory = Product::query();
        $querySearch = Product::query();
        $products = Product::paginate(4); #default $product value incase no params 
        
        
        if($request->has('category')){
            $category = $request->input('category');
            
            if($category == 'none'){
                $products = Product::paginate($pagination);
                return response()->json($products);
            }
            $queryCategory->where('Category',$category);
            $products= $queryCategory->paginate($pagination);
            $products->appends(['category' => $category]);
            return response()->json($products);
        }
        
       
        if($request->has('search')){
            $search = $request->input('search');
            
            $querySearch->where('Name','like','%'.$search.'%')->orWhere('Description','like','%'.$search.'%');
            $products = $querySearch->paginate($pagination);
        }
        
        
        
        return response()->json($products);
    }
    public function delete(Product $product){
        $product->delete();
        return response()->json("Product Deleted");
    }
    public function getCount(){
        $count=Product::count();
        return response()->json(['count'=>$count]);
    }
    
}
