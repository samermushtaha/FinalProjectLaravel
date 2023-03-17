@extends('layouts.dashboard')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Stores</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{URl('dashboard/store/create')}}">
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
                <th scope="col">Logo</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($stores as $store)
                <tr>
                    <td><img src="{{asset('storage/' . $store->logo)}}" alt="Image" width="50" height="50"></td>
                    <td>{{$store->name}}</td>
                    <td>{{$store->address}}</td>
                    <td>
                        <a href="{{URL('dashboard/store/' . $store->id . '/edit')}}">
                            <button type="button" class="btn btn-sm btn-success">
                                <span data-feather="edit" class="align-text-bottom"></span>
                            </button>
                        </a>
                    </td>
                    <td>
                        <form action="{{URL('dashboard/store/' . $store->id . '/delete')}}" method="POST">
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
@endsection
