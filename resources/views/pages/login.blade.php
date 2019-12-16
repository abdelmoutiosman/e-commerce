@extends('layout')
@section('content')
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <p class="alert-danger">
                            <?php
                                $message=Session::get('message');
                                if ($message){
                                    echo $message;
                                    Session::put('message',null);
                                }
                            ?>
                        </p>
                        <form action="{{url('/customer-login')}}" method="post">
                            {{csrf_field()}}
                            <input type="email" name="email_address" placeholder="Type Your Email Address" required/>
                            <input type="password" name="password" placeholder="Type Your Password" required/>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form action="{{url('/customer-registeration')}}" method="post">
                            {{csrf_field()}}
                            <input type="text" name="customer_name" placeholder="Name" required/>
                            <input type="email" name="email_address" placeholder="Email Address" required/>
                            <input type="password" name="password" placeholder="Password" required/>
                            <input type="text" name="telephone" placeholder="Telephone" required/>
                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection
