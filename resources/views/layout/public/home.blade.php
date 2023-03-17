@extends('layouts.public2')

@section('header')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="text-homeimage">
                    <div class="maintext-image" data-scrollreveal="enter top over 1.5s after 0.1s">
                        Samer Mushtaha
                    </div>
                    <div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.3s">
                        E-commerce
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="item content">
        <div class="container">
            <div class="underlined-title">
                <div class="editContent">
                    <h1 class="text-center latestitems">LATEST ITEMS</h1>
                </div>
                <div class="wow-hr type_short">
				<span class="wow-hr-h">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				</span>
                </div>
            </div>
            <div class="row">
                @foreach($stores as $store)
                    <div class="col-md-4">
                        <div class="productbox">
                            <div class="fadeshop">
                                <span class="maxproduct"><img src="{{asset('storage/' . $store->logo)}}" alt=""
                                                              width="350" height="200"></span>
                            </div>
                            <div class="product-details">
                                <a href="{{URL('public/store/' . $store->id)}}">
                                    <h1>{{$store->name}}</h1>
                                </a>
                                <span class="price">
						            <span class="edd_price">{{$store->address}}</span>
						        </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>

    <div class="item content">
        <div class="container text-center">
            <a href="{{URL('public/store')}}" class="homebrowseitems">All Stores
                <div class="homebrowseitemsicon">
                    <i class="fa fa-star fa-spin"></i>
                </div>
            </a>
        </div>
    </div>
    <br/>
@endsection
