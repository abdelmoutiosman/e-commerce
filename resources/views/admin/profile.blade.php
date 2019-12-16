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
            <a href="#">Edit Profile</a>
        </li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span> Edit Profile</h2>
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
                <form class="form-horizontal" method="post" action="{{url('/update-profile',$admin->id)}}">
                    {{ csrf_field() }}
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Name</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge"  name="name" placeholder="Type Name" value="{{$admin->name}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Email</label>
                            <div class="controls">
                                <input type="email" class="input-xlarge"  name="email" placeholder="Type Email" value="{{$admin->email}}"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Phone</label>
                            <div class="controls">
                                <input type="text" class="input-xlarge"  name="phone" placeholder="Type Phone" value="{{$admin->phone}}"/>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><i class="icon-edit"></i> Edit Profile</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div><!--/span-->
    </div><!--/row-->
@endsection
