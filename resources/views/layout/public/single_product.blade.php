@extends('layouts.public2')

@section('header')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="text-pageheader">
                    <div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.1s">
                        {{$product->store->name}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="item content">
        <div class="container toparea">
            <div class="row">
                <div class="col-md-6">
                    <div class="productbox">
                        <img src="{{asset('storage/' . $product->image)}}" alt="">
                        <div class="clearfix">
                        </div>
                        <br/>
                    </div>
                </div>
                <div class="col-md-6">
                    @if(session()->has('status'))
                        @if(session()->get('status'))
                            <div class="alert alert-success" role="alert">
                                {{$product->name}} has Ordered Successfully
                            </div>
                        @endif
                    @endif
                    <form id="purchase-form" action="{{URL('dashboard/purchase_transactions/store')}}" method="POST" class="d-none">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="purchase_price" value="
                        @if($product->sale == 1)
                            {{$product->base_price - (($product->discount_price / 100) * $product->base_price)}}
                        @else
                            {{$product->base_price}}
                        @endif
                        ">
                    </form>
                    <a href="{{URL('dashboard/purchase_transactions/store')}}" class="btn btn-buynow" onclick="event.preventDefault(); document.getElementById('purchase-form').submit();">
                        @if($product->sale == 1)
                            After discount
                            {{$product->base_price - (($product->discount_price / 100) * $product->base_price)}}
                        @else
                            {{$product->base_price}}
                        @endif$ - Purchase
                    </a>
                    <div class="properties-box">
                        <div class="product-details text-left">
                            <p style="font-size: 23px; font-weight: bold">
                                {{$product->name}}
                            </p>
                            <p>
                                {{$product->description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
