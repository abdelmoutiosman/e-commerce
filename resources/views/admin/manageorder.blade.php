@extends('admin_layout')
@section('admin_content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Manage Order</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Order</h2>
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
                        <th>Order Id</th>
                        <th>Customer Name</th>
                        <th>Shipping Name</th>
                        <th>Payment Method</th>
                        <th>Order Total</th>
                        <th>Order Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    @foreach($all_orders as $order)
                        <tbody>
                        <tr>
                            <td>{{$order->order_id}}</td>
                            <td>{{$order->customer_name}}</td>
                            <td>{{$order->first_name}} {{$order->last_name}}</td>
                            <td>{{$order->payment_method}}</td>
                            <td>{{$order->order_total}} $</td>
                            <td class="center">
                                @if($order->order_status=='accepted')
                                    <span class="label label-success">Accept</span>
                                @elseif($order->order_status=='rejected')
                                    <span class="label label-danger">reject</span>
                                @else
                                    <span class="label label-success">Pending</span>
                                @endif
                            </td>
                            <td class="center">
                                @if($order->order_status=='accepted')
                                    <a class="btn btn-danger" href="{{url('/reject-order',$order->order_id)}}">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                                @else
                                    <a class="btn btn-success" href="{{url('/accept-order',$order->order_id)}}">
                                        <i class="halflings-icon white thumbs-up"></i>
                                    </a>
                                @endif
                                <a class="btn btn-info" href="{{url('/view-order',$order->order_id)}}">
                                    <i class="halflings-icon white eye-open"></i>
                                </a>
                                <a class="btn btn-danger" href="{{url('/delete-order',$order->order_id)}}" id="delete">
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
