<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    function getLimitStores()
    {
        $stores = Store::all()->take(3);
        return view('layout.public.home')->with('stores', $stores);
    }

    function getStores()
    {
        $stores = Store::paginate(3);
        return view('layout.public.store')->with('stores', $stores);
    }

    function getStoreProducts($id)
    {
        $products = Product::with('store')->where('store_id', $id)->paginate(3);
        return view('layout.public.product')->with('products', $products)->with('title', $products[0]->store->name);
    }

    function getProducts()
    {
        $products = Product::with('store')->paginate(3);
        return view('layout.public.product')->with('products', $products)->with('title', 'All Products');
    }

    function getSingleProduct($id)
    {
        $product = Product::find($id);
        return view('layout.public.single_product')->with('product', $product);
    }

    public function search()
    {
        $search = $_GET['search'];

        $products = Product::with('store')
                    ->where('name', 'like', '%' . $search . '%')
                    ->paginate(3);

        return view('layout.public.product')->with('products', $products)->with('title', 'Search Result');
    }
}
