@extends('admin_layout')
@section('admin_content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{url('/dashboard')}}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">All Customer</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>All Customer</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <p class="alert-success">
                    <?php
                    $message=Session::get('message');
                    if ($message){
                        echo $message;
                        Session::put('message',null);
                    }
                    ?>
                </p>
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>Customer Id</th>
                        <th>Customer Name</th>
                        <th>Customer Email Address</th>
                        <th>Customer Phone</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    @foreach($all_customer as $customer)
                        <tbody>
                        <tr>
                            <td>{{$customer->customer_id}}</td>
                            <td>{{$customer->customer_name}}</td>
                            <td>{{$customer->email_address}}</td>
                            <td>{{$customer->telephone}}</td>
                            <td class="center">
                                @if($customer->status==1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-danger">Unactive</span>
                                @endif
                            </td>
                            <td class="center">
                                @if($customer->status==1)
                                    <a class="btn btn-danger" href="{{url('/unactive-customer',$customer->customer_id)}}">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                                @else
                                    <a class="btn btn-success" href="{{url('/active-customer',$customer->customer_id)}}">
                                        <i class="halflings-icon white thumbs-up"></i>
                                    </a>
                                @endif

                                <a class="btn btn-danger" href="{{url('/delete-customer',$customer->customer_id)}}" id="delete">
                                    <i class="halflings-icon white trash"></i>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div><!--/span-->
    </div><!--/row-->
@endsection
