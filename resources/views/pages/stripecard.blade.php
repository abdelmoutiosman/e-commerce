@extends('layout')
@section('content')
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div><!--login form-->
                        <p class="alert-success">
                            <?php
                                $message=Session::get('message');
                                if ($message){
                                    echo $message;
                                    Session::put('message',null);
                                }
                            ?>
                        </p>
                        <h1>Thanks For Order..</h1>
                        <h2>You Will Paynow</h2>
                        <form action="/cart-checkout" method="post">
                            {{ csrf_field() }}
                            <script src="https://checkout.stripe.com/checkout.js"
                                class="stripe-button"
                                data-key=""
                                data-amount="{{ Cart::total() * 100 }}"
                                data-name="E Shopper"
                                data-description="Widget"
                                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                data-locale="auto">
                                {{--  data-zip-code="true"  --}}
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection
