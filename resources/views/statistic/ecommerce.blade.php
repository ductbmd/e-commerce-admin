@extends('admin.layouts.my-layout')

@section('content')
    <div class="main-content" id="dashboardPage">
        <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-3">
                <a class="dashbox dashbox-line-progress" href="{{route('category.index')}}">
                    <i class="icon-fa icon-fa-tags text-primary"></i>
                    <span class="desc">
                      Categories
                    </span>
                    <span class="title text-primary">
                      {{$category_count}}
                    </span>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </a>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">
                <a class="dashbox dashbox-line-progress" href="{{route('product.index')}}">
                    <i class="icon-fa icon-fa-star text-success"></i>
                    <span class="desc">
                      Điện thoại/Laptop
                    </span>
                    <span class="title text-success">
                      {{$product_count}} đt/{{$laptop_count}} lt
                    </span>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{$product_count/( $laptop_count +$product_count )*100}}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </a>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">
                <a class="dashbox dashbox-line-progress" href="{{route('order')}}">
                    <i class="icon-fa icon-fa-shopping-cart text-danger"></i>
                    <span class="desc">
                      Đơn hàng mới trong 30 ngày
                    </span>
                    <span class="title text-danger">
                      {{$order_count}}
                    </span>
                    <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </a>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-3">
                <a class="dashbox dashbox-line-progress" href="#">
                    <i class="icon-fa icon-fa-comments text-info"></i>
                    <span class="desc">
                      Đánh giá 
                    </span>
                    <span class="title text-info">
                      {{$comment_count}}
                    </span>
                    <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        <h6><i class="icon-fa icon-fa-line-chart text-primary"></i> Số đơn hàng các tháng</h6>
                    </div>
                    <div class="card-body">
                        <line-chart :labels="[{{$truc_hoanh}}]" :values="[ {{$tructung}}]"></line-chart>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-xl-6 mt-2">
                <div class="card">
                    <div class="card-header">
                        <h6><i class="icon-fa icon-fa-shopping-cart text-danger"></i> Đơn hàng chưa giao</h6>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Khách hàng</th>
                                <th>Ngày</th>
                                <th>Số tiền</th>
                                <th>Thanh toán</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            	@foreach($orders as $order)
                            <tr>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->total_amount}}$</td>
                                <td>{{$order->payment}}</td>
                                <td><a href="{{route('viewOrder',$order->id)}}" class="btn btn-default btn-xs" target="_blank">Xem</a></td>
                            </tr>
                            @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-6 mt-2">
                <div class="card">
                    <div class="card-header">
                        <h6><i class="icon-fa icon-fa-users text-info"></i> Khách hàng mới trong tháng</h6>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Ngày tạo</th>
                            </tr>
                            </thead>
                            <tbody>
                            	@foreach($customers as $customer)
                            <tr>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->phone}}</td>
                                <td>{{$customer->address}}</td>
                                <td>{{$customer->created_at}}</td>
                                <td><a href="#" class="btn btn-default btn-xs">Xem</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
