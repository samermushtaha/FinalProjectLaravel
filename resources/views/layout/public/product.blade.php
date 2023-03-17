@extends('layouts.public2')

@section('header')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="text-pageheader">
                    <div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.1s">
                        {{$title}}
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
                    <h1 class="text-center latestitems">OUR PRODUCTS</h1>
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
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="productbox">
                            <div class="fadeshop">
                                <span class="maxproduct"><img src="{{asset('storage/' . $product->image)}}" alt=""
                                                              width="350" height="200"></span>
                            </div>
                            <div class="product-details">
                                <a href="{{URL('public/product/' . $product->id)}}">
                                    <h1>{{$product->name}}</h1>
                                </a>
                                <span class="price">
					<span class="edd_price">
                        @if($product->sale == 1)
                            {{$product->base_price - (($product->discount_price / 100) * $product->base_price)}}$
                        @else
                            {{$product->base_price}}$
                        @endif
                    </span>
					</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
