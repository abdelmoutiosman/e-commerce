@extends('admin_layout')
@section('admin_content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{url('/dashboard')}}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">All Payment</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>All Payment</h2>
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
                        <th>Payment Id</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    @foreach($all_payment as $payment)
                        <tbody>
                        <tr>
                            <td>{{$payment->payment_id}}</td>
                            <td>{{$payment->payment_method}}</td>
                            <td class="center">
                                @if($payment->payment_status=='accepted')
                                    <span class="label label-success">Accepted</span>
                                @else
                                    <span class="label label-danger">Pending</span>
                                @endif
                            </td>
                            <td class="center">
                                @if($payment->payment_status=='accepted')
                                    <a class="btn btn-danger" href="{{url('/pending-payment',$payment->payment_id)}}">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                                @else
                                    <a class="btn btn-success" href="{{url('/accept-payment',$payment->payment_id)}}">
                                        <i class="halflings-icon white thumbs-up"></i>
                                    </a>
                                @endif 
                                
                                <a class="btn btn-danger" href="{{url('/delete-payment',$payment->payment_id)}}" id="delete">
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
