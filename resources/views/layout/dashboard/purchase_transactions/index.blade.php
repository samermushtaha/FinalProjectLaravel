@extends('layouts.dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Purchase Transactions</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Purchase Price</th>
                <th scope="col">Created At</th>
            </tr>
            </thead>
            <tbody>
            @for($i = 0; $i < count($purchase_transactions); $i++)
                <tr>
                    <td><img src="{{asset('storage/' . $products[$i]->image)}}" alt="" width="50" height="50"></td>
                    <td>{{$products[$i]->name}}</td>
                    <td>{{$purchase_transactions[$i]->purchase_price}}</td>
                    <td>{{$purchase_transactions[$i]->created_at}}</td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-12">
            {{ $purchase_transactions->links() }}
        </div>
    </div>
@endsection
