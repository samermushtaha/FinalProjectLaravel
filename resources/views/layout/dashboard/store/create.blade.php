@extends('layouts.dashboard')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Store</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                @if(session()->has('status'))
                    @if(session()->get('status'))
                        <div class="alert alert-success" role="alert">
                            The Store has Added Successfully
                        </div>
                    @endif
                @endif
                <form action="{{URl('dashboard/store/store')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name">
                        @error('name')
                        <div id="emailHelp" class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address">
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

                    <button class="btn btn-dark" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
