@extends('admin_layout')
@section('admin_content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{url('/dashboard')}}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="{{url('/manage-order')}}" class="btn-default"> back</a></li>
    </ul>
    <div class="row-fluid sortable">
        <div class="box span6">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Customer Details</h2>
                <a href="{{url('/manage-order')}}" style="margin-left: 150px" class="btn-default"> back></a>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Phone</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$order_view->customer_name}}</td>
                        <td>{{$order_view->telephone}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div><!--/span-->
        <div class="box span6">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Shipping Details</h2>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>Shipping Name</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$order_view->first_name}} {{$order_view->last_name}}</td>
                        <td>{{$order_view->address}}</td>
                        <td>{{$order_view->mobile}}</td>
                        <td>{{$order_view->email}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div><!--/span-->
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Order Details</h2>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Sales Quantity</th>
                        <th>Product Sub Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->order_id}}</td>
                                <td>{{$order->product_name}}</td>
                                <td>{{$order->product_price}} $</td>
                                <td>{{$order->product_sales_quantity}}</td>
                                <td>{{$order->product_price * $order->product_sales_quantity}} $</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="4">Total With Vat: </td>
                        <td><strong>=  {{$order_view->order_total}} $</strong></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div><!--/span-->
    </div><!--/row-->
@endsection
