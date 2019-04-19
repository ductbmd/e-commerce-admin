@extends('admin.layouts.my-layout')
@section('scripts')
    <script src="/assets/admin/js/pages/notifications.js"></script>
    <script src="/assets/admin/js/pages/datatables.js"></script>
@stop
@section('content')

    <div class="main-content">
        <div class="page-header">
            <h3 class="page-title">Form Layouts</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                <li class="breadcrumb-item active">Form Layouts</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-sm-11">
                <div class="card">
                    <!-- card header gom nut create -->
                    <div class="card-header">
                        <h6><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Create Company</button></h6>
                    </div>
                     <!-- end card header -->
                     <!-- card body : table data -->
                    <div class="card-body">
                    <table id="responsive-datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Company Name</th>
                                <th>Description</th>
                                <th>Country</th>
                                <th>Logo</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Company Name</th>
                                <th>Description</th>
                                <th>Country</th>
                                <th>Logo</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($companies as $key=>$company)
                            <tr>
                                <td>{{$company->id}}</td>
                                <td>{{$company->name}}</td>
                                <td>{{$company->description}}</td>
                                <td>{{$company->country}}</td>
                                <td><img src="{{asset($company->file->url)}}" alt="logo company" width="65" height="65"></td>
                            </tr>
                            @endforeach
                            </tbody>
                    </table>
                            
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
            <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="file" class="col-sm-3 col-form-label"> Logo</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="file" class="btn btn-icon btn-outline-info" name="file">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Co Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Company Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="description" name="description" placeholder="description">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="country" class="col-sm-3 col-form-label">Country</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="country" name="country" placeholder="country of Company">
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
