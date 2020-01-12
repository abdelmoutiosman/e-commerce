@extends('layout')
@section('content')
    <section id="cart_items">
        <div class="container col-sm-12">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <?php
                    $contents=Cart::content();
                ?>
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Image</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    @if(count($contents))
                        <tbody>
                        @foreach($contents as $content)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="{{URL::to($content->options->image)}}" height="80px" width="80px" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{$content->name}}</a></h4>

                                </td>
                                <td class="cart_price">
                                    <p>{{$content->price}}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_down" href="{{url('/update-cart-decr',['row_id'=>$content->rowId,'quantity'=>$content->qty])}}"> - </a>
                                        <input class="cart_quantity_input" type="text" value="{{$content->qty}}"  size="2">
                                        <a class="cart_quantity_up" href="{{url('/update-cart-incr',['row_id'=>$content->rowId,'quantity'=>$content->qty])}}"> + </a>

                                        {{--  <form action="{{url('/update-cart')}}" method="post">
                                            {{ csrf_field()}}
                                            <input class="cart_quantity_input" type="text" name="quantity" value="{{$content->qty}}" autocomplete="off" size="2">
                                            <input  type="hidden" name="rowId" value="{{$content->rowId}}"  >
                                            <input type="submit" name="submit" value="update" class="btn btn-sm btn-default">
                                        </form>  --}}
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">{{number_format($content->total)}}</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{url('/delete-cart',$content->rowId)}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    @else
                        <tr>
                            <td colspan="6"><h1 class="text-center mb-5">There is No Data !!</h1></td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->
    <section id="do_action">
        <div class="container col-sm-12">
            <hr>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Payment method</li>
                </ol>
            </div>
            <div class="paymentCont col-sm-8">
                <div class="headingWrap">
                    <h3 class="headingTop text-center">Select Your Payment Method</h3>
                </div>
                <br>
                <form action="{{url('order-place')}}" method="post">
                    {{csrf_field()}}
                    <input type="radio" name="payment_method" value="handcash"> Handcash<br>
                    <input type="radio" name="payment_method" value="paypal"> Paypal<br>
                    <input type="radio" name="payment_method" value="stripecard"> Stripe-Card<br>
                    <input type="submit" name="" value="Done">
                </form>
            </div>
        </div>
    </section><!--/#do_action-->
@endsection
