<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    function index(){
        $stores = Store::all();
        return view('layout.dashboard.store.index')->with('stores', $stores);
    }

    function show($id){
        $store = Store::find($id);
        return redirect()->back()->with('store' ,$store);
    }

    function create(){
        return view("layout.dashboard.store.create");
    }

    function store(Request $request){

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'logo' => 'required',
        ]);

        // Store data in database
        $store = new Store;
        $store->name = $request['name'];
        $store->address = $request['address'];
        $store->logo = $this->upload_image($request->file('logo'));
        $status = $store->save();

        return redirect()->back()->with('status',$status);
    }

    function edit($id){
        $store = Store::where('id',$id)->first();
        return view('layout.dashboard.store.edit')->with('store', $store);
    }

    function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        $store = Store::find($id);
        $store->name = $request['name'];
        $store->address = $request['address'];
        if($request['logo'] != null){
            $store->logo = $this->upload_image($request->file('logo'));
        }
        $status = $store->update();

        return redirect()->back()->with('status' ,$status);
    }

    function destroy($id){
        $store = Store::find($id);
        $status = Product::with('store')->where('store_id', $store->id)->delete();
        $store->delete();
        return redirect()->back()->with('success' ,'Store Deleted Successfully');
    }

    function upload_image($file){
        $file_name = time() . rand(1, 1000000);
        $ext = $file->getClientOriginalExtension();
        $path = "uploads/stores/$file_name.$ext";
        Storage::disk('public')->put($path, file_get_contents($file));
        return $path;
    }
}
