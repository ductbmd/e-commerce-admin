@extends('admin.layouts.my-layout')
@section('scripts')
    <script src="/assets/admin/js/pages/notifications.js"></script>
    <script src="/assets/admin/js/pages/datatables.js"></script>
@stop
@section('content')

    <div class="main-content">
        <div class="page-header">
            <h3 class="page-title">Category</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Category</a></li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-sm-11">
                <div class="card">
                    <!-- card header gom nut create -->
                    <div class="card-header">
                        <h6><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tạo Category</button></h6>
                    </div>
                     <!-- end card header -->
                     <!-- card body : table data -->
                    <div class="card-body">
                    <table id="responsive-datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($categories as $key=>$category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                    </table>
                    <hr>
                       <br>
                       <!-- form product-category -->
                       <form action="{{ route('category.product') }}" method="POST" >
                       	@csrf
                       	<h5 class="section-semi-title">
                            Tạo category điện thoại
                        </h5>
                       <select class="form-control ls-select2"  name="categorty_id">
                       	@foreach($categories as $key=>$category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
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
                        <!-- end form product-category -->
                         <hr>
                       <br>
                       <!-- form laptop category -->
                       <form action="{{ route('category.laptop') }}" method="POST" >
                       	@csrf
                       	<h5 class="section-semi-title">
                            Tạo category Laptop
                        </h5>
                       <select class="form-control ls-select2"  name="categorty_id">
                       	@foreach($categories as $key=>$category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
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
            <h4 class="modal-title">Create Company</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
               
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label"> Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Company Name">
                    </div>
                </div>
               <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label"> Type</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="type" name="type" placeholder="type">
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
