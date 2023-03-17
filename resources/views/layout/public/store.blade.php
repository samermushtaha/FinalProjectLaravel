@extends('layouts.public2')

@section('header')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="text-pageheader">
                    <div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.1s">
                        Stores
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="item content">
        <div class="container toparea">
            <div class="underlined-title">
                <div class="editContent">
                    <h1 class="text-center latestitems">OUR STORES</h1>
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
            <div class="row">
                <div class="col-12">
                    {{ $stores->links() }}
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
