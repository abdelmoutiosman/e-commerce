@extends('layout')
@section('content')
    <h2 class="title text-center">Features Items</h2>
    <?php
        $products=DB::table('products')
            ->Join('categories', 'products.category_id', '=', 'categories.id')
            ->Join('manufactures', 'products.manufacture_id', '=', 'manufactures.id')
            ->select('products.*','categories.category_name','manufactures.manufacture_name')
            //->take(3)
            ->where('products.publication_status',1)
            ->limit(9)
            ->get();
    ?>
    @foreach($products as $product)
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
                            <a href="{{url('/view-product',$product->id)}}"><p>{{$product->product_name}}</p></a>
                            <a href="{{url('/view-product',$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>{{$product->manufacture_name}}</a></li>
                        <li><a href="{{url('/view-product',$product->id)}}"><i class="fa fa-plus-square"></i>View Product</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
    </div><!--features_items-->

    <!--category-tab-->
    <div class="category-tab">
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <?php
                         $categories=DB::table('categories')
                             ->where('publication_status',1)
                             ->limit(9)
                             ->get();
                    ?>
                    @foreach($categories as $index=>$category)
                        <li class="{{ $index == 0 ? 'active' : '' }}"><a href="#{{$category->id}}" data-toggle="tab">{{$category->category_name}}</a></li>
                    @endforeach
                </ul>

            </div>
            <div class="tab-content">
                <?php
                    $products=DB::table('products')
                        ->Join('categories', 'products.category_id', '=', 'categories.id')
                        ->select('products.*','categories.category_name')
                        ->where('products.publication_status',1)
                        ->limit(9)
                        ->get();
                ?>
                    @foreach($products as $product)
                    <div class="tab-pane fade {{ $index == 0 ? 'active' : '' }} in" id="{{$product->category_id}}" >
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset($product->image)}}" alt="" width="200px" height="230px"/>
                                        <h2>{{$product->price}} $</h2>
                                        <p>{{$product->product_name}}</p>
                                        <a href="{{url('/view-product',$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
        <!--/category-tab-->



        {{--  <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">recommended items</h2>
            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend1.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend2.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend3.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend1.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend2.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend3.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div><!--/recommended_items-->  --}}
@endsection
