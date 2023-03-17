@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Product</h1>
    </div>
    <div class="row">
        <div class="col-12">
            @if(session()->has('status'))
                @if(session()->get('status'))
                    <div class="alert alert-success" role="alert">
                        The Product has Updated Successfully
                    </div>
                @endif
            @endif
            <form action="{{URl('dashboard/product/' . $product->id . '/update')}}" method="POST" enctype='multipart/form-data'>
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$product->name}}">
                    @error('name')
                    <div id="emailHelp" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{$product->description}}">
                    @error('description')
                    <div id="emailHelp" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="store_id" class="form-label">Select Store</label>
                    <select class="form-select" aria-label="Default select example" name="store_id">
                        @foreach($stores as $store)
                            <option value="{{$store->id}}" @if($store->id == $product->store_id) selected  @endif>{{$store->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="base_price" class="form-label">Base Price</label>
                    <input type="number" class="form-control @error('base_price') is-invalid @enderror" id="base_price" name="base_price" value="{{$product->base_price}}">
                    @error('base_price')
                    <div id="emailHelp" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="discount_price" class="form-label">Discount Price</label>
                    <input type="number" class="form-control @error('discount_price') is-invalid @enderror" id="discount_price" name="discount_price" value="{{$product->discount_price}}">
                    @error('discount_price')
                    <div id="emailHelp" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input multiple type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                    @error('image')
                    <div id="emailHelp" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="sale" name="sale" @if ($product->sale == 1) checked @endif>
                    <label class="form-check-label" for="sale">
                        Sale
                    </label>
                </div>
                <br>

                <button class="btn btn-dark" type="submit" id="liveToastBtn">Add</button>
            </form>
        </div>
    </div>
</div>
@endsection
