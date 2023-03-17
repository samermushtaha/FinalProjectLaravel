<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    function index(){
        $products = Product::with('store')->paginate(2);
        return view('layout.dashboard.product.index')->with('products', $products);
    }

    function show($id){
        $product = Product::find($id);
        return redirect()->back()->with('product' ,$product);
    }

    function create(){
        $stores = Store::all();
        return view("layout.dashboard.product.create")->with('stores', $stores);
    }

    function store(Request $request){

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'store_id' => 'required',
            'base_price' => 'required',
            'discount_price' => 'required|numeric|min:0|max:100',
            'image' => 'required',
        ]);

        // Store data in database
        $product = new Product;
        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->store_id = $request['store_id'];
        $product->base_price = $request['base_price'];
        $product->discount_price = $request['discount_price'];
        $product->sale = $this->get_check_box_value($request['sale']);
        $product->image = $this->upload_image($request->file('image'));
        $status = $product->save();

        return redirect()->back()->with('status',$status);
    }

    function edit($id){
        $product = Product::where('id',$id)->first();
        $stores = Store::all();
        return view('layout.dashboard.product.edit')->with('product', $product)->with('stores', $stores);
    }

    function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'store_id' => 'required',
            'base_price' => 'required',
            'discount_price' => 'required|numeric|min:0|max:100',
        ]);

        $product = Product::find($id);
        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->store_id = $request['store_id'];
        $product->base_price = $request['base_price'];
        $product->discount_price = $request['discount_price'];
        $product->sale = $this->get_check_box_value($request['sale']);
        if($request['logo'] != null){
            $product->image = $this->upload_image($request->file('image'));
        }
        $status = $product->update();

        return redirect()->back()->with('status' ,$status);
    }

    function destroy($id){
        $store = Product::find($id);
        $store->delete();
        return redirect()->back()->with('success' ,'Product Deleted Successfully');
    }

    function upload_image($file){
        $file_name = time() . rand(1, 1000000);
        $ext = $file->getClientOriginalExtension();
        $path = "uploads/products/$file_name.$ext";
        Storage::disk('public')->put($path, file_get_contents($file));
        return $path;
    }

    function get_check_box_value($value){
        if($value == null){
            return 0;
        }else{
            return 1;
        }
    }
}
