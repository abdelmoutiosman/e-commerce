@extends('layout')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="register-req">
                <p>Please fillup this form ...................................................</p>
            </div><!--/register-req-->
            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-12 clearfix">
                        <div class="bill-to">
                            <p>Shipping Details</p>
                            <div class="form-one">
                                <form action="{{url('/save-shipping')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="text" placeholder="First Name" name="first_name">
                                    <input type="text" placeholder="Last Name" name="last_name">
                                    <input type="text" placeholder="Address" name="address">
                                    <input type="email" placeholder="Email" name="email">
                                    <input type="text" placeholder="mobile" name="mobile">
                                    <input type="text" placeholder="City" name="city">
                                    <input type="submit" class="btn btn-default" value="Done">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="review-payment">--}}
{{--                <h2>Review & Payment</h2>--}}
{{--            </div>--}}
{{--            <br>--}}
{{--            <br>--}}
{{--            <div class="payment-options">--}}
{{--					<span>--}}
{{--						<label><input type="checkbox"> Direct Bank Transfer</label>--}}
{{--					</span>--}}
{{--                <span>--}}
{{--						<label><input type="checkbox"> Check Payment</label>--}}
{{--					</span>--}}
{{--                <span>--}}
{{--						<label><input type="checkbox"> Paypal</label>--}}
{{--					</span>--}}
{{--            </div>--}}
        </div>
    </section> <!--/#cart_items-->
@endsection
