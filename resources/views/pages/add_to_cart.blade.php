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
                            <a href=""><img src="{{$content->options->image}}" alt="" style="width: 80px;height: 80px"></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$content->name}}</a></h4>
                        </td>
                        <td class="cart_price">
                            <p>{{$content->price}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{url('/update-cart')}}" method="post">
                                    {{csrf_field()}}
                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{$content->qty}}" autocomplete="off" size="2">
                                    <input type="hidden" name="rowId" value="{{$content->rowId}}">
                                    <input type="submit" name="submit" value="Update" class="btn btn-sm btn-default">
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{$content->total}}</p>
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
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
                            <li>Eco Tax <span>{{Cart::tax()}}</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>{{Cart::total()}}</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>

                        <?php
                             $customer_id=Session::get('customer_id');
                             $shipping_id=Session::get('shipping_id');
                        ?>
                        @if($customer_id != NULL && $shipping_id == NULL)
                            <a href="{{url('/checkout')}}" class="btn btn-default check_out">Checkout</a>
                        @elseif($customer_id != NULL && $shipping_id != NULL)
                            <a href="{{url('/payment')}}" class="btn btn-default check_out">Checkout</a>
                        @else
                            <a href="{{url('/login-checkout')}}" class="btn btn-default check_out">Checkout</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
@endsection
