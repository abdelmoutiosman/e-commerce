@extends('layout')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                        @if(count($all_product))
                            @foreach($all_product as $product)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset($product->image)}}" alt="" style="height: 250px"/>
                                                <h2>{{$product->price}} $</h2>
                                                <p>{{$product->product_name}}</p>
                                                <a href="{{url('/view-product',$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                    <h2>{{$product->price}} $</h2>
                                                    <p>{{$product->product_name}}</p>
                                                    <a href="{{url('/view-product',$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="choose">
                                            <ul class="nav nav-pills nav-justified">
                                                <li><a href="{{url('/view-product',$product->id)}}"><i class="fa fa-plus-square"></i> View Product</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-sm-12">
                                <h1 class="text-center mb-5">There is No Data !!</h1>
                            </div>
                        @endif
                    </div><!--features_items-->
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center mt-5">
                    {{$all_product->appends(request()->query())->render()}}
{{--                      or links()--}}
                </div>
            </div>
        </div>
    </section>
@endsection
