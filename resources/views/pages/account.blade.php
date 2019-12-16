@extends('layout')
@section('content')
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Edit Password</h2>
                        <p class="alert-success">
                            <?php
                            $message=Session::get('message');
                            if ($message){
                                echo $message;
                                Session::put('message',null);
                            }
                            ?>
                        </p>
                        <form action="{{url('/edit-password-customer',$customer->customer_id)}}" method="post">
                            {{csrf_field()}}
                            <input type="password" name="password" placeholder="Type New Password" required/>
                            <button type="submit" class="btn btn-default">Edit Password</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>Edit Profile</h2>
                        <p class="alert-success">
                            <?php
                            $messages=Session::get('messages');
                            if ($messages){
                                echo $messages;
                                Session::put('messages',null);
                            }
                            ?>
                        </p>
                        <form action="{{url('/edit-profile-customer',$customer->customer_id)}}" method="post">
                            {{csrf_field()}}
                            <input type="text" name="customer_name" value="{{$customer->customer_name}}"/>
                            <input type="email" name="email_address" value="{{$customer->email_address}}"/>
                            <input type="text" name="telephone" value="{{$customer->telephone}}"/>
                            <button type="submit" class="btn btn-default">Edit Profile</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection
