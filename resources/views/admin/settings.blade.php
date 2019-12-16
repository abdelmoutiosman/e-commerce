@extends('admin_layout')
@section('admin_content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="#">Edit Setting</a>
        </li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span> Edit Setting</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <p class="alert-success">
                <?php
                $message=Session::get('message');
                if ($message){
                    echo $message;
                    Session::put('message',null);
                }
                ?>
            </p>
            <div class="box-content">
                <form class="form-horizontal" method="post" action="{{url('setting-update',$model->id)}}">
                    {{ csrf_field() }}
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Phone Number</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge"  name="phone_number" value="{{$model->phone_number}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Gmail</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge"  name="gmail" value="{{$model->gmail}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Facebook</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge"  name="facebook_link" value="{{$model->facebook_link}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Twitter</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge"  name="twitter_link" value="{{$model->twitter_link}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Linked In</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge"  name="linkend_in_link" value="{{$model->linkend_in_link}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Google</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge"  name="google_link" value="{{$model->google_link}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Youtube</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge"  name="youtube_link" value="{{$model->youtube_link}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Web Name</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge"  name="web_name" value="{{$model->web_name}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">About App</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge"  name="about_app" value="{{$model->about_app}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Description</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge"  name="description" value="{{$model->description}}"/>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><i class="icon-edit"></i> Edit Setting</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div><!--/span-->
    </div><!--/row-->
@endsection
