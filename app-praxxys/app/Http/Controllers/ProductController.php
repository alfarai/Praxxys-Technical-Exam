<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all(); #retrieve all contents of product table
        return view('products.index',['products'=> $product]); #pass it to view
    }
    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
        /*
        #dd($request->name); #helper function dd = dump and die
        $data = $request->validate([ #validate data submitted first
            'Name' => 'required|string',
            'Category' => 'required|string',
            'Description'=> 'required|string',
            'Date and Time' => 'nullable',
        ]);

        #connect to model
        #"Product" here is the Product model
        $newProduct = Product::create($data);
        $newProduct -> save();

        return redirect(route('product.index'));
        */
        //dd($request);
        $request->validate([
            'Name' => 'required|string',
            'Category' => 'required|string',
            'Description'=> 'required|string',
            'Date' => 'required|date',
            'Time' => 'required'
        ]);

        $newProduct = Product::create([
            'Name' => $request->input('Name'),
            'Category' => $request->input('Category'),
            'Description' => $request->input('Description'),
            'Date_and_Time' => sprintf('%s-%s',$request->input('Date'),$request->input('Time'))
        ]);
        

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }
    public function edit(Product $product){
        //dd($product);
        return view('products.edit',['product'=>$product]);
    }
    public function update(Product $product, Request $request){
        $data = $request->validate([
            'Name' => 'required|string',
            'Category' => 'required|string',
            'Description'=> 'required|string',
            'Date' => 'required|date',
            'Time' => 'required'
        ]);
        
        $product->Name = $request->input('Name');
        $product->Category = $request->input('Category');
        $product->Description = $request->input('Description');
        $product->Date_and_Time= sprintf('%s-%s',$request->input('Date'),$request->input('Time'));
        
        $product->save();
        
        
        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }
    public function delete(Product $product){
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
        
}
