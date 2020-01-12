@extends('layout')
@section('content')
    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{asset($product->image)}}" alt="" />
                    <h3>ZOOM</h3>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <img src="{{asset('frontend/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                    <h2>{{$product->product_name}}</h2>
                    <p>color: <span style="vertical-align: middle;width: 40px;height: 30px;background-color: {{$product->color}}"></span></p>
                    <img src="{{asset('frontend/images/product-details/rating.png')}}" alt="" />
                    <span>
                        <span>{{$product->price}} $</span>
                        <form action="{{url('/add-to-cart')}}" method="post">
                            {{csrf_field()}}
                            <label>Quantity:</label>
                            <input type="text" name="quantity" value="1" />
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <button type="submit" class="btn btn-fefault cart">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </button>
                        </form>
                    </span>
                    <p><b>Availability:</b> In Stock</p>
                    <p><b>Condition:</b> New</p>
                    <p><b>Brand:</b> {{$product->manufacture_name}}</p>
                    <p><b>Category:</b> {{$product->category_name}}</p>
                    <p><b>Size:</b> {{$product->size}}</p>
                    <a href=""><img src="{{asset('frontend/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->

        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li><a href="#details" data-toggle="tab">Details</a></li>
{{--                    <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>--}}
{{--                    <li><a href="#tag" data-toggle="tab">Tag</a></li>--}}
                    <li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade" id="details" >
                    <p>{!! $product->long_description !!}</p>
                    <p>{!! $product->short_description !!}</p>
                </div>
{{--                <div class="tab-pane fade" id="companyprofile" >--}}
{{--                    <div class="col-sm-3">--}}
{{--                        <div class="product-image-wrapper">--}}
{{--                            <div class="single-products">--}}
{{--                                <div class="productinfo text-center">--}}
{{--                                    <img src="images/home/gallery1.jpg" alt="" />--}}
{{--                                    <h2>$56</h2>--}}
{{--                                    <p>Easy Polo Black Edition</p>--}}
{{--                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="tab-pane fade" id="tag" >--}}
{{--                    <div class="col-sm-3">--}}
{{--                        <div class="product-image-wrapper">--}}
{{--                            <div class="single-products">--}}
{{--                                <div class="productinfo text-center">--}}
{{--                                    <img src="images/home/gallery1.jpg" alt="" />--}}
{{--                                    <h2>$56</h2>--}}
{{--                                    <p>Easy Polo Black Edition</p>--}}
{{--                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="tab-pane fade active in" id="reviews" >
                    <div class="col-sm-12">
                        <?php
                            $product_id=$product->id;
                            $reviews=DB::table('reviews')->where('product_id',$product_id)->take(1)->latest()->get();
                        ?>
                        @foreach($reviews as $review)
                            <ul>
                                <li><a href=""><i class="fa fa-user"></i>{{$review->name}}</a></li>
                                <li><a href=""><i class="fa fa-clock-o"></i>{{ date("g:iA", strtotime($review->created_at)) }}</a></li>
                                <li><a href=""><i class="fa fa-calendar-o"></i>{{ date("d M Y", strtotime($review->created_at)) }}</a></li>
                            </ul>
                            <p>{{$review->body}}</p>
                        @endforeach
                        <p><b>Write Your Review</b></p>

                        <form action="{{url('/add-review')}}" method="post">
                            {{csrf_field()}}
                            <span>
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input type="text" name="name" placeholder="Your Name"/>
                                <input type="email" name="email" placeholder="Email Address"/>
                            </span>
                            <textarea name="body" placeholder="Type Message"></textarea>
                            <b>Rating: </b>
                            <input type="radio" name="rating" value="1" style="background-image: url('{{asset('frontend/images/product-details/rating.png')}}');background-size: cover;background-repeat: no-repeat;">
                            <input type="radio" name="rating" value="2" style="background-image: url('{{asset('frontend/images/product-details/rating.png')}}');background-size: cover;background-repeat: no-repeat;">
                            <input type="radio" name="rating" value="3" style="background-image: url('{{asset('frontend/images/product-details/rating.png')}}');background-size: cover;background-repeat: no-repeat;">
                            <input type="radio" name="rating" value="4" style="background-image: url('{{asset('frontend/images/product-details/rating.png')}}');background-size: cover;background-repeat: no-repeat;">
                            <input type="radio" name="rating" value="5" style="background-image: url('{{asset('frontend/images/product-details/rating.png')}}');background-size: cover;background-repeat: no-repeat;">
                            <input type="submit" value="Submit" class="btn btn-default pull-right">
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/category-tab-->
@endsection
