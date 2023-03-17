@extends('layouts.dashboard')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{URl('dashboard/product/create')}}">
                <button type="button" class="btn btn-sm btn-dark">
                    Add
                </button>
            </a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Store</th>
                <th scope="col">Base Price</th>
                <th scope="col">Discount Price</th>
                <th scope="col">Sale</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td><img src="{{asset('storage/' . $product->image)}}" alt="Image" width="50" height="50"></td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->store->name}}</td>
                    <td>{{$product->base_price}}</td>
                    <td>{{$product->discount_price}}%</td>
                    <td>{{$product->sale}}</td>
                    <td>
                        <a href="{{URL('dashboard/product/' . $product->id . '/edit')}}">
                            <button type="button" class="btn btn-sm btn-success">
                                <span data-feather="edit" class="align-text-bottom"></span>
                            </button>
                        </a>
                    </td>
                    <td>
                        <form action="{{URL('dashboard/product/' . $product->id . '/delete')}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <span data-feather="trash-2" class="align-text-bottom"></span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-12">
            {{ $products->links() }}
        </div>
    </div>
@endsection
