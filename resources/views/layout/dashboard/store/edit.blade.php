@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Store</h1>
    </div>
    <div class="row">
        <div class="col-12">
            @if(session()->has('status'))
                @if(session()->get('status'))
                    <div class="alert alert-success" role="alert">
                        The Store has Updated Successfully
                    </div>
                @endif
            @endif
            <form action="{{URL('dashboard/store/' . $store->id . '/update')}}" method="POST" enctype='multipart/form-data'>
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$store->name}}">
                    @error('name')
                    <div id="emailHelp" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" value="{{$store->address}}" name="address">
                    @error('address')
                    <div id="emailHelp" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="logo" class="form-label">Image</label>
                    <input multiple type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
                    @error('logo')
                    <div id="emailHelp" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <button class="btn btn-dark" type="submit">Edit</button>
            </form>
        </div>
    </div>
</div>
@endsection
