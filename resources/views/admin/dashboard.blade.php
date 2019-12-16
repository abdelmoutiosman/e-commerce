@extends('admin_layout')
@section('admin_content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{url('/dashboard')}}">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
    </ul>
    <div class="row-fluid">
        <div class="col-sm-12">
            <a class="quick-button metro red span3">
                <i class="icon-group"></i>
                <p>Admins</p>
                <span class="badge">{{\App\Models\Admin::count()}}</span>
            </a>
            <a class="quick-button metro yellow span3">
                <i class="icon-group"></i>
                <p>Customers</p>
                <span class="badge">{{\App\Models\Customer::count()}}</span>
            </a>
            <a class="quick-button metro green span3" href="{{url('/all-category')}}">
                <i class="icon-comments-alt"></i>
                <p>Categories</p>
                <span class="badge">{{\App\Models\Category::count()}}</span>
            </a>
            <a class="quick-button metro orange span3" href="{{url('/all-brand')}}">
                <i class="icon-comments-alt"></i>
                <p>Brands</p>
                <span class="badge">{{\App\Models\Manufacture::count()}}</span>
            </a>
        </div>
        <div class="col-sm-12">
            <a class="quick-button metro blue span3" href="{{url('/manage-order')}}">
                <i class="icon-shopping-cart"></i>
                <p>Orders</p>
                <span class="badge">{{\App\Models\Order::count()}}</span>
            </a>
            <a class="quick-button metro green span3" href="{{url('/all-product')}}">
                <i class="icon-barcode"></i>
                <p>Products</p>
                <span class="badge">{{\App\Models\Product::count()}}</span>
            </a>
            <a class="quick-button metro pink span3">
                <i class="icon-envelope"></i>
                <p>Payments</p>
                <span class="badge">{{\App\Models\Payment::count()}}</span>
            </a>
            <a class="quick-button metro black span3" href="{{url('/all-slider')}}">
                <i class="icon-calendar"></i>
                <p>Sliders</p>
                <span class="badge">{{\App\Models\Slider::count()}}</span>
            </a>
        </div>
    </div><!--/row-->
{{--    <div class="row-fluid">--}}
{{--        <div class="span8 widget blue" onTablet="span7" onDesktop="span8">--}}
{{--            <div id="stats-chart2"  style="height:282px" ></div>--}}
{{--        </div>--}}
{{--        <div class="sparkLineStats span4 widget green" onTablet="span5" onDesktop="span4">--}}
{{--            <ul class="unstyled">--}}
{{--                <li><span class="sparkLineStats3"></span>--}}
{{--                    Pageviews:--}}
{{--                    <span class="number">781</span>--}}
{{--                </li>--}}
{{--                <li><span class="sparkLineStats4"></span>--}}
{{--                    Pages / Visit:--}}
{{--                    <span class="number">2,19</span>--}}
{{--                </li>--}}
{{--                <li><span class="sparkLineStats5"></span>--}}
{{--                    Avg. Visit Duration:--}}
{{--                    <span class="number">00:02:58</span>--}}
{{--                </li>--}}
{{--                <li><span class="sparkLineStats6"></span>--}}
{{--                    Bounce Rate: <span class="number">59,83%</span>--}}
{{--                </li>--}}
{{--                <li><span class="sparkLineStats7"></span>--}}
{{--                    % New Visits:--}}
{{--                    <span class="number">70,79%</span>--}}
{{--                </li>--}}
{{--                <li><span class="sparkLineStats8"></span>--}}
{{--                    % Returning Visitor:--}}
{{--                    <span class="number">29,21%</span>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <div class="clearfix"></div>--}}
{{--        </div><!-- End .sparkStats -->--}}
{{--    </div>--}}
@endsection
