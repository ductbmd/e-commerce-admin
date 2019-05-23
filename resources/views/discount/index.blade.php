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
                <li class="breadcrumb-item active">discount</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-sm-11">
                <div class="card">
                    <!-- card header gom nut create -->
                    <div class="card-header">
                        <h6><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tạo discount</button></h6>
                    </div>
                     <!-- end card header -->
                     <!-- card body : table data -->
                    <div class="card-body">
                    <table id="responsive-datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Discount</th>
                                <th>Type</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Discount</th>
                                <th>Type</th>
                                <th>Description</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                @if(!empty($discounts))
                            @foreach($discounts as $key=>$discount)
                            <tr>
                                <td>{{$discount->id}}</td>
                                <td>{{$discount->time_start}}</td>
                                <td>{{$discount->time_expired}}</td>
                                <td>{{$discount->discount}}</td>
                                <td>{{$discount->type}}</td>
                                <td>{{$discount->description}}</td>
                            </tr>
                            @endforeach
                            @endif
                            </tbody>
                    </table>
                    <hr>
                       <br>
                       <!-- form product-discount -->
                       <form action="{{ route('discount.product') }}" method="POST" >
                       	@csrf
                       	<h5 class="section-semi-title">
                            Tạo discount điện thoại
                        </h5>
                       <select class="form-control ls-select2"  name="discount_id">
                       	@foreach($discounts as $key=>$discount)
                            <option value="{{$discount->id}}">[{{$discount->id}}]{{$discount->time_expired}}*{{$discount->type}}</option>
                        @endforeach
                        </select>
                        <br><br>
                        <select class="form-control ls-multi-select" multiple="multiple" name="listProduct[]">
                            @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                        <br>
                        <button class="btn btn-success" type="submit">Save</button>
                        </form>
                        <!-- end form product-discount -->
                         <hr>
                       <br>
                       <!-- form laptop discount -->
                       <form action="{{ route('discount.laptop') }}" method="POST" >
                       	@csrf
                       	<h5 class="section-semi-title">
                            Tạo discount Laptop
                        </h5>
                       <select class="form-control ls-select2"  name="discount_id">
                       	@foreach($discounts as $key=>$discount)
                            <option value="{{$discount->id}}">[{{$discount->id}}]-{{$discount->time_expired}}*{{$discount->type}}</option>
                        @endforeach
                        </select>
                        <br><br>
                        <select class="form-control ls-multi-select" multiple="multiple" name="listLaptop[]">
                            @foreach($laptops as $laptop)
                            <option value="{{$laptop->id}}">{{$laptop->name}}</option>
                            @endforeach
                        </select>
                        <br>
                        <button class="btn btn-success" type="submit">Save</button>
                        </form>
                    </div>
                    <!-- end card body -->
                </div>
            </div>
        </div>
       
    </div>
    <!-- modal create company -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Create Discount</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form action="{{ route('discount.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
               
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label"> Time</label>
                    <div class="col-sm-9">
                       <div class="input-group input-daterange">
                            <input type="text" class="form-control ls-datepicker" name="time_start">
                            <div class="input-group-prepend input-group-append" >
                                <span class="input-group-text">to</span>
                            </div>
                            <input type="text" class="form-control ls-datepicker" name="time_expired">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label"> Discount</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="discount" name="discount" placeholder="discount" value="20">
                    </div>
                </div>
               <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label"> Type</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="type" name="type" placeholder="type">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label"> Description</label>
                    <div class="col-sm-9">
                        <textarea  class="form-control" id="description" name="description" placeholder="description">Khuyến mãi hot</textarea>
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Save</button>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>

    </div>
    </div>
    <!-- end create modal company -->
@stop
