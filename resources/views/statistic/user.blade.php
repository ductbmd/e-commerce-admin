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
                        <h1>Quản lý khách hàng</h1>
                    </div>
                     <!-- end card header -->
                     <!-- card body : table data -->
                    <div class="card-body">
                    <table id="responsive-datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <!-- <th>Mật khẩu</th> -->
                                <th>Ngày tạo</th>
                                <th>Thông tin chi tiết</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Ngày tạo</th>
                                <!-- <th>Pass</th> -->
                                <th>Thông tin chi tiết</th>
                                <th>Trạng Thái</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                @if(!empty($users))
                            @foreach($users as $key=>$user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                               <!--  <td>{{$user->password}}</td> -->
                                <td>{{$user->created_at}}</td>
                                <td>@if($user->Info)
                                	 <div class="row">
                                        <div class="col-md-3">ID_info:</div>
                                        <div class="col-md-9">{{$user->Info->id}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Địa chỉ:</div>
                                        <div class="col-md-9">{{$user->Info->address}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Tên đầy đủ:</div>
                                        <div class="col-md-9">{{$user->Info->name}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Mã bưu chính:</div>
                                        <div class="col-md-9">{{$user->Info->zip_code}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Số điện thoại:</div>
                                        <div class="col-md-9">{{$user->Info->phone}}</div>
                                    </div>

                                    @endif
                                </td>
                                <td>@if($user->deleted_at)
                                	<a href="{{route('user.active',$user->id)}}" class="btn btn-danger btn-rounded">
                                        Không kích hoạt
                                    </a>
                                    @else
                                	<a href="{{route('user.delete',$user->id)}}" class="btn btn-success btn-rounded">
                                        Kích hoạt
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            </tbody>
                    </table>
                   
                    </div>
                    <!-- end card body -->
                </div>
            </div>
        </div>
       
    </div>
    @stop