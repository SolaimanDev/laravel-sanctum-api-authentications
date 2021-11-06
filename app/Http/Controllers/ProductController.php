<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $products=Product::latest()->paginate(15);

         return view('product.index',compact('products'));
    }

    
    public function create()
    {
        return view('product.create');
    }

   
    public function store(Request $request)
    {
       // $products=Product::find($request->id);
        // dd($request);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'uploads/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Product::create($input);
     
        return redirect()->route('items.index')
                        ->with('success','Product created successfully.');
    }

    
    public function show($id)
    {
        $product=Product::find($id);
       return view('product.show',compact('product'));
    }

    
    public function edit($id)
    {
        $product=Product::find($id);
         return view('product.edit',compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product=Product::find($id);
          $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'            
        ]);
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'uploads/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $product->update($input);
        return redirect()->route('items.index')
                        ->with('success','Product deleted successfully');
    }

   
    public function destroy($id)
    {
        $product=Product::find($id);
         $product->delete();    
        return redirect()->route('items.index')
                        ->with('success','Product deleted successfully');
    }
}
