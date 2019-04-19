@extends('admin.layouts.my-layout')
@section('scripts')
    <script src="/assets/admin/js/pages/notifications.js"></script>
    <script src="/assets/admin/js/pages/datatables.js"></script>
    <script src="{{asset('assets/admin/js/pages/gallery.js')}}"></script>
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
                        <h6><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#createProduct">Create Product</button></h6>
                    </div>
                     <!-- end card header -->
                     <!-- card body : table data -->
                    <div class="card-body">
                    <table id="responsive-datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>configuration</th>
                                <th>Image</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->description}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">Company:</div>
                                        <div class="col-md-9">{{$product->company->name}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Size:</div>
                                        <div class="col-md-9">{{$product->size}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">OS:</div>
                                        <div class="col-md-9">{{$product->OS}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Camera back:</div>
                                        <div class="col-md-9">{{$product->camera_back}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Camera front:</div>
                                        <div class="col-md-9">{{$product->camera_front}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">CPU:</div>
                                        <div class="col-md-9">{{$product->CPU}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">RAM:</div>
                                        <div class="col-md-9">{{$product->RAM}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">ROM:</div>
                                        <div class="col-md-9">{{$product->ROM}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Memory card:</div>
                                        <div class="col-md-9">{{$product->memory_card}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">SIM:</div>
                                        <div class="col-md-9">{{$product->SIM_card}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Pin:</div>
                                        <div class="col-md-9">{{$product->Pin}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">GPU:</div>
                                        <div class="col-md-9">{{$product->GPU}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Tai nghe:</div>
                                        <div class="col-md-9">{{$product->headphone_jack}}</div>
                                    </div>
                                <td><button type="button" class="btn btn-theme" data-toggle="modal" data-target="#product{{$product->id}}">
                                    Show IMG
                                </button></td>
                            </tr>
                            <div id="product{{$product->id}}" class="modal fade ls-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-success">
                                                <h5 class="modal-title" id="exampleModalLabel">IMG Product</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                 <div class="my-gallery image-gallery" itemscope>
                                                <div class="row">
                                                    @foreach($product->files as $image)
                                                    <figure class="col-lg-3 col-md-6 col-xs-12" itemprop="associatedMedia" itemscope>
                                                        <a href="{{asset($image->file->url)}}" itemprop="contentUrl"
                                                        data-size="480x360">
                                                        <img src="{{asset($image->file->url)}}"
                                                        itemprop="thumbnail" class="img-fluid" alt="Image description"/>
                                                    </a>
                                                    <figcaption itemprop="caption description">{{$image->file->file_name}}</figcaption>
                                                </figure>
                                                @endforeach
                                                </div>
                                            </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    <div class="modal fade" id="createProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProduct">Create Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="file" class="col-sm-3 col-form-label"> Image Product</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="file" class="btn btn-icon btn-outline-info" name="file[]" multiple>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="company_id" class="col-sm-3 col-form-label">Company</label>
                    <div class="col-sm-9">
                    <select name="company_id" class="form-control" id="company_id">
                        @foreach($companies as $key=>$value)
                        <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                      </select>   
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="OS" class="col-sm-3 col-form-label">Type</label>
                    <div class="col-sm-9">
                        @foreach(Laraspace\Models\Product\Product::$type as $key=>$value)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type"
                                   id="{{$value}}" value="{{$key}}" @if($key==1) {{'checked'}} @endif>
                            <label class="form-check-label" for="inlineRadio1">{{$value}}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="description" name="description" placeholder="description">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="size" class="col-sm-3 col-form-label">Size</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="size" name="size" placeholder="size of Product" value=" IPS LCD, 6.2', HD+">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="OS" class="col-sm-3 col-form-label">OS</label>
                    <div class="col-sm-9">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OS"
                                   id="anroid" value="Android" checked>
                            <label class="form-check-label" for="inlineRadio1">Android</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OS"
                                   id="Window" value="Window">
                            <label class="form-check-label" for="inlineRadio1">Window</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OS"
                                   id="IOS" value="IOS">
                            <label class="form-check-label" for="inlineRadio1">IOS</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OS"
                                   id="linux" value="Linux">
                            <label class="form-check-label" for="inlineRadio1">Linux</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="camera_front" class="col-sm-3 col-form-label">Camera front</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="camera_front" name="camera_front" placeholder="camera_front of Product" value="8MP">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="camera_back" class="col-sm-3 col-form-label">Camera back</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="camera_back" name="camera_back" placeholder="camera_back of Product" value="8MP">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="CPU" class="col-sm-3 col-form-label">CPU</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="CPU" name="CPU" placeholder="CPU of Product" value="Snapdragon">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="RAM" class="col-sm-3 col-form-label">RAM</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="RAM" name="RAM" placeholder="RAM of Product" value="4GB">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ROM" class="col-sm-3 col-form-label">ROM</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="ROM" name="ROM" placeholder="ROM of Product" value="32GB">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="memory_card" class="col-sm-3 col-form-label">MemoryCard</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="memory_card" name="memory_card" placeholder="memory_card of Product" value=" MicroSD, hỗ trợ tối đa 512 GB">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="SIM_card" class="col-sm-3 col-form-label">SIM_card</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="SIM_card" name="SIM_card" placeholder="SIM_card of Product" value="2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Pin" class="col-sm-3 col-form-label">Pin</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="Pin" name="Pin" placeholder="Pin of Product" value="3400 mAh">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="GPU" class="col-sm-3 col-form-label">GPU</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="GPU" name="GPU" placeholder="GPU of Product" value="Đang cập nhật">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="headphone_jack" class="col-sm-3 col-form-label">Headphone jack:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="headphone_jack" name="headphone_jack" placeholder="headphone_jack of Product" value="3.5 mm">
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
