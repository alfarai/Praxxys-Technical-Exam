<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $product = Product::latest(); #retrieve all contents of product table
        
        return view('products.index',compact('product')); #pass it to view

        
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
            'Image' => 'required|image|mimes:jpg,jpeg,png',
            'Date' => 'required|date',
            'Time' => 'required'
        ]);
        

        //dd($request->all());
        $newProduct = new Product();
        $newProduct->Name = $request->input('Name');
        $newProduct->Category = $request->input('Category');
        $newProduct->Description = $request->input('Description');
        $newProduct->Date_and_Time = sprintf('%s %s', $request->input('Date'), $request->input('Time'));
    

        
        $file = $request->file('Image'); #contains an array of images
        
        $extension=$file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $path = $file->storeAs('images',$filename,'public');
        //$file->storeAs('images',$filename,'public');
        $imagePath = '/storage/'.$path;


        $newProduct->Image = $imagePath;
            
        
        
        $newProduct->save();

        // $newProduct = Product::create([
        //     'Name' => $request->input('Name'),
        //     'Category' => $request->input('Category'),
        //     'Description' => $request->input('Description'),
        //     'Date_and_Time' => sprintf('%s-%s',$request->input('Date'),$request->input('Time'))
        // ]);
        
        

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }
    public function edit(Product $product){
        //dd($product);
        return view('products.edit',['product'=>$product]);
    }
    
        
    public function update(Product $product, Request $request){
        $request->validate([
            'Name' => 'required|string',
            'Category' => 'required|string',
            'Description'=> 'required|string',
            'Image'=> 'required|image|mimes:jpeg,png',
            'Date' => 'required|date',
            'Time' => 'required'
        ]);
        
        
        
        $product->Name = $request->input('Name');
        $product->Category = $request->input('Category');
        $product->Description = $request->input('Description');
        $product->Date_and_Time= sprintf('%s-%s',$request->input('Date'),$request->input('Time'));

        $file = $request->file('Image'); #contains an array of images
        
        $extension=$file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $path = $file->storeAs('images',$filename,'public');
        //$file->storeAs('images',$filename,'public');
        $imagePath = '/storage/'.$path;


        $product->Image = $imagePath;

        $product->save();
        
        
        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }
    public function delete(Product $product){
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
        
}
