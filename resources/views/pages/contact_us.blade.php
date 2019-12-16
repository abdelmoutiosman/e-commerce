@extends('layout')
@section('content')
    <div id="contact-page" class="container">
        <div class="bg">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="title text-center">Contact <strong>Us</strong></h2>
                    <div id="gmap" class="contact-map">
                    </div>
                </div>
            </div>
            <div class="row col-sm-12">
                <div class="col-sm-5">
                    <div class="contact-form">
                        <h2 class="title text-center">Get In Touch</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="{{url('/add-contact')}}">
                            {{csrf_field()}}
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Type Name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Type Email">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="title" class="form-control" required="required" placeholder="Type Title">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="body" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-info">
                        <h2 class="title text-center">Contact Info</h2>
                        <address>
                            <p>{{$setting->web_name}}</p>
                            <p>{{$setting->description}}</p>
                            <p>Mobile: {{$setting->phone_number}}</p>
                            <p>Email: {{$setting->gmail}}</p>
                        </address>
                        <div class="social-networks">
                            <h2 class="title text-center">Social Networking</h2>
                            <ul>
                                <li>
                                    <a href="{{$setting->facebook_link}}"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="{{$setting->twitter_link}}"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="{{$setting->linkend_in_link}}"><i class="fa fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="{{$setting->google_link}}"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="{{$setting->youtube_link}}"><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/#contact-page-->
@endsection
