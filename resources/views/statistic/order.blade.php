@extends('admin.layouts.my-layout')
@section('scripts')
    <script src="{{asset('assets/admin/js/pages/charts/sparklines.js')}}"></script>
    <script src="/assets/admin/js/pages/datatables.js"></script>
@stop
@section('content')
    <div class="main-content">
        <div class="page-header">
            <h3 class="page-title">Morris Charts</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.charts.morris')}}">Charts</a></li>
                <li class="breadcrumb-item active">Morris Charts</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="sparkline-chart">
                            <div class="row">
                                <div class="sparkline-chart-type">
                                    <h5 class="section-semi-title">Hình thức thanh toán:</h5>
                                    <span class="spl-pie-chart">{{implode("," ,$pay)}}</span>
                                    <br>
                                @foreach($pay as $key=>$p)
                                <p><b>{{$key}}:</b>{{$p}}</p>
                                @endforeach
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h6>Đơn hàng chưa hoàn thành </h6>
                    </div>
                    <div class="card-body">
                    	<table id="default-datatable" class="table table-striped table-bordered" cellspacing="0"
                               width="100%">
                               <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tổng hóa đơn</th>
                                <th>Lưu ý </th>
                                <th>Ngày tạo đơn</th>
                                <th>Hình thức thanh toán</th>
                                <th>Khách hàng</th>
                                <th>Chi tiết</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tổng hóa đơn</th>
                                <th>Lưu ý </th>
                                <th>Ngày tạo đơn</th>
                                <th>Hình thức thanh toán</th>
                                <th>Khách hàng</th>
                                <th>Chi tiết</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            	@foreach($order_do as $order) 
                            <tr>
                            	
                                <td>{{$order->id}}</td>
                                <td>${{$order->total_amount}}</td>
                                <td>{{$order->note}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->payment}}</td>
                                <td>{{$order->user->name}}</td>
                                <td><a href="{{route('viewOrder',$order->id)}}" class="btn btn-default btn-xs" target="_blank">Xem</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h6>Đơn hàng đã hoàn thành </h6>
                    </div>
                    <div class="card-body">
                    	<table id="responsive-datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                               <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tổng hóa đơn</th>
                                <th>Lưu ý </th>
                                <th>Ngày tạo đơn</th>
                                <th>Hình thức thanh toán</th>
                                <th>Khách hàng</th>
                                <th>Chi tiết</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tổng hóa đơn</th>
                                <th>Lưu ý </th>
                                <th>Ngày tạo đơn</th>
                                <th>Hình thức thanh toán</th>
                                <th>Khách hàng</th>
                                <th>Chi tiết</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            	@foreach($order_done as $order) 
                            <tr>
                            	
                                <td>{{$order->id}}</td>
                                <td>${{$order->total_amount}}</td>
                                <td>{{$order->note}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->payment}}</td>
                                <td>{{$order->user->name}}</td>
                                <td><a href="{{route('viewOrder',$order->id)}}" class="btn btn-default btn-xs" target="_blank">Xem</a></td>
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




