<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PurchaseTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Sodium\add;

class PurchaseTransactionsController extends Controller
{
    function index()
    {
        $purchase_transactions = PurchaseTransaction::with('product')->paginate(2);
        $products = collect();
        foreach ($purchase_transactions as $purchase_transaction) {
            $products->push(Product::withTrashed('store')->where('id', $purchase_transaction->product_id)->first());
        }
        return view('layout.dashboard.purchase_transactions.index')->with('purchase_transactions', $purchase_transactions)->with('products', $products);
    }

    function store(Request $request)
    {
        $purchase_transaction = new PurchaseTransaction;
        $purchase_transaction->product_id = $request['product_id'];
        $purchase_transaction->purchase_price = $request['purchase_price'];
        $status = $purchase_transaction->save();
        return redirect()->back()->with('status', $status);
    }

    function report()
    {
        $purchase_transactions = PurchaseTransaction::with('product')
            ->select(DB::raw('SUM(purchase_price) AS total_price, product_id'))
            ->groupBy('product_id')->paginate(2);

        $products = collect();
        foreach ($purchase_transactions as $purchase_transaction) {
            $products->push(Product::withTrashed('store')->where('id', $purchase_transaction->product_id)->first());
        }

        return view('layout.dashboard.purchase_transactions.report')
            ->with('purchase_transactions', $purchase_transactions)
            ->with('products', $products);
    }
}
