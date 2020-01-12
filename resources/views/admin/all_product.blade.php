@extends('admin_layout')
@section('admin_content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">All Product</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>All Product</h2>
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
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Category Name</th>
                        <th>Brand Name</th>
                        <th>Product Short Description</th>
                        <th>Product Long Description</th>
                        <th>Product Price</th>
                        <th>Product Size</th>
                        <th>Product Color</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    @foreach($all_products as $product)
                        <tbody>
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->product_name}}</td>
                            <td><img src="{{asset($product->image)}}" style="height: 50px;width: 80px"></td>
                            <td>{{$product->category_name}}</td>
                            <td>{{$product->manufacture_name}}</td>
                            <td>{!! $product->short_description !!}</td>
                            <td>{!! $product->long_description !!}</td>
                            <td>{{$product->price}} $</td>
                            <td>{{$product->size}}</td>
                            <td>{{$product->color}}</td>
                            <td class="center">
                                @if($product->publication_status==1)
                                    <span class="label label-success">Active</span>
                                @else
                                    <span class="label label-danger">Unactive</span>
                                @endif
                            </td>
                            <td class="center">
                                @if($product->publication_status==1)
                                    <a class="btn btn-danger" href="{{url('/unactive-product',$product->id)}}">
                                        <i class="halflings-icon white thumbs-down"></i>
                                    </a>
                                @else
                                    <a class="btn btn-success" href="{{url('/active-product',$product->id)}}">
                                        <i class="halflings-icon white thumbs-up"></i>
                                    </a>
                                @endif
                                <a class="btn btn-danger" href="{{url('/delete-product',$product->id)}}" id="delete">
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
