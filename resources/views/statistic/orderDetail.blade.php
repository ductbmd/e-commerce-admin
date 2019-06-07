@extends('admin.layouts.my-layout')
@section('scripts')
<script src="/assets/admin/js/pages/notifications.js"></script>
<script src="/assets/admin/js/pages/datatables.js"></script>
@stop
@section('content')
<div class="main-content">
    <div class="page-header">
        <h3 class="page-title">discount</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">discount</a></li>
            <li class="breadcrumb-item active">Quản lý khách hàng</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-11">
            <div class="card">
                <!-- card header gom nut create -->
                <div class="card-header">
                    <h1>Quản lý đơn hàng</h1>
                </div>
                <!-- end card header -->
                <!-- card body : table data -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <h5 class="section-semi-title">Chi tiết đơn hàng - khách: <b>{{$order->user->name}}</b></h5>

                            <div class="tabs tabs-default">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#order" role="tab">Đơn hàng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#detail" role="tab">Chi tiết các sản phẩm</a>
                                    </li>

                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="order" role="tabpanel">
                                        <table class="table table-default">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Khách hàng</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Địa chỉ</th>
                                                    <th>Trạng thái</th>
                                                    <th>Tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr >
                                                    <td>{{$order->id}}</td>
                                                    <td>{{$order->user->name}}</td>
                                                    <td>{{$order->user->phone}}</td>
                                                    <td>{{$order->user->address}}</td>
                                                    <td>@if($order->status=='DatDon')
                                                        <a href="{{route('order.done',$order->id)}}" class="btn btn-danger btn-rounded">
                                                            Đơn chưa hoàn thành
                                                        </a>
                                                        @else
                                                        Đã hoàn thành
                                                        @endif
                                                    </td>
                                                        <td>${{$order->total_amount}}</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="detail" role="tabpanel">
                                            <table class="table table-default">
                                                <thead>
                                                    <tr>
                                                        <th>ID Sản phẩm</th>
                                                        <th>Sản Phẩm</th>
                                                        <th>Số lượng</th>
                                                        <th>Giá tiền(đã bao gồm khuyến mãi)</th>
                                                        <th>Xem sản phẩm</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($order->phone)
                                                    @foreach($order->phone as $phone)
                                                    <tr class="table-success">
                                                        <td>{{$phone->product->id}}</td>
                                                        <td>{{$phone->product->name}}</td>
                                                        @foreach($order->detail as $orderDetail)
                                                        @if($orderDetail->type=='PHONE' && $orderDetail->product_id==$phone->id)
                                                        <td>{{$orderDetail->qty}}</td>
                                                        <td>{{$orderDetail->price}}</td>
                                                        @endif
                                                        @endforeach
                                                        <td><a href="{{env("CLIENT_HOST")."client/product/".$phone->product->id}}" class="btn btn-default btn-xs" target="_blank">Xem</a></td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                    @if($order->laptop)
                                                    @foreach($order->laptop as $laptop)
                                                    <tr class="table-warning">
                                                        <td>{{$laptop->id}}</td>
                                                        <td>{{$laptop->name}}</td>
                                                        @foreach($order->detail as $orderDetail)
                                                        @if($orderDetail->type=='LAPTOP' && $orderDetail->product_id==$laptop->id)
                                                        <td>{{$orderDetail->qty}}</td>
                                                        <td>{{$orderDetail->price}}</td>
                                                        @endif
                                                        @endforeach
                                                        <td><a href="{{env("CLIENT_HOST")."client/laptop/".$laptop->id}}" class="btn btn-default btn-xs" target="_blank">Xem</a></td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- end card body -->
                </div>
            </div>
        </div>

    </div>
    @stop