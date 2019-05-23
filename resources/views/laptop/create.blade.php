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
                        <h6><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#createProduct">Create Laptop</button></h6>
                    </div>
                     <!-- end card header -->
                     <!-- card body : table data -->
                    <div class="card-body">
                    <table id="responsive-datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Laptop Name</th>
                                <!-- <th>Description</th> -->
                                <th>configuration</th>
                                <th>Image</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                                @if(!empty($laptops))
                            @foreach($laptops as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <!-- <td>{{$product->description}}</td> -->
                                <td>
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
                                        <div class="col-md-3">Monitor:</div>
                                        <div class="col-md-9">{{$product->monitor}}</div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-3">connection_port:</div>
                                        <div class="col-md-9">{{$product->connection_port}}</div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-3">GPU:</div>
                                        <div class="col-md-9">{{$product->GPU}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Specical:</div>
                                        <div class="col-md-9">{{$product->specical}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Design :</div>
                                        <div class="col-md-9">{{$product->design}}</div>
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
                                        <div class="col-md-3">Price:</div>
                                        <div class="col-md-9">{{$product->price}}</div>
                                    </div>
                                   
                                <td>
                                <div role="group" aria-label="Button group with nested dropdown" class="btn-group-vertical">
                                    <button type="button" class="btn btn-theme" data-toggle="modal" data-target="#product{{$product->id}}">
                                   <i class="icon-fa icon-fa-camera"></i> Show IMG
                                    </button>
                                    <!-- Show img btn -->
                                    <button type="button" class="btn btn-theme" data-toggle="modal" data-target="#detail{{$product->id}}">
                                   <i class="icon-fa icon-fa-plus-circle"></i></i> Detail
                                </button>
                               <!--  Btn Detail -->
                                    <div role="group" class="btn-group">
                                        <button id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-outline-primary dropdown-toggle">
                                            <i class="icon-fa icon-fa-cog"></i>Edit                                </button> 
                                            <div aria-labelledby="btnGroupDrop1" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a href="#" class="dropdown-item">Edit</a> 
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Image product -->
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
                                <!-- End img product -->
                                
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
    <!-- modal create company -->
    <div class="modal fade" id="createProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProduct">Create Laptop</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('laptop.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="file" class="col-sm-3 col-form-label"> Image Product</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="file" class="btn btn-icon btn-outline-info" name="file[]" multiple>
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="CPU" class="col-sm-3 col-form-label">CPU</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="CPU" name="CPU" placeholder="CPU of Product" value="Intel Core i7 Coffee Lake, 8550U, 1.80 GHz">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="RAM" class="col-sm-3 col-form-label">RAM</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="RAM" name="RAM" placeholder="RAM of Product" value="8 GB, DDR4 (1 khe), 2666 MHz">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ROM" class="col-sm-3 col-form-label">ROM</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="ROM" name="ROM" placeholder="ROM of Product" value="SSD: 256 GB, M.2 SATA3">
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="camera_front" class="col-sm-3 col-form-label">Monitor </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="monitor" name="monitor" placeholder="monitor of Product" value="14 inch, Full HD (1920 x 1080)">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="GPU" class="col-sm-3 col-form-label">GPU</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="GPU" name="GPU" placeholder="GPU of Product" value="Card đồ họa tích hợp, Intel® UHD Graphics 620">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="connection_port" class="col-sm-3 col-form-label">connection Port </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="connection_port" name="connection_port" placeholder=" of Product" value="HDMI 1.4, 2 x USB 3.0, Micro SD">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="memory_card" class="col-sm-3 col-form-label">specical</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="specical" name="specical" placeholder="specical of Product" value=" Có đèn bàn phím">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="OS" class="col-sm-3 col-form-label">OS</label>
                    <div class="col-sm-9">
                        
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OS"
                                   id="Window" value="Window"checked>
                            <label class="form-check-label" for="inlineRadio1" >Window</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OS"
                                   id="IOS" value="MACOS">
                            <label class="form-check-label" for="inlineRadio1">MACOS</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OS"
                                   id="linux" value="Linux">
                            <label class="form-check-label" for="inlineRadio1">Linux</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="OS"
                                   id="anroid" value="Android" >
                            <label class="form-check-label" for="inlineRadio1">Android</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="SIM_card" class="col-sm-3 col-form-label">Design</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="design" name="design" placeholder="SIM_card of Product" value="Vỏ nhựa, PIN liền">
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="size" class="col-sm-3 col-form-label">Size</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="size" name="size" placeholder="size of Product" value=" Dày 18 mm, 1.54 kg">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-3 col-form-label">Price</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="1000">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="description" class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <textarea rows="4"  class="form-control" id="description" name="description" >
                            Thêm một sự lựa chọn đáng để cân nhắc dành cho nhân viên văn phòng, học sinh, sinh viên vừa được cho ra mắt đó chính là chiếc laptop . Với thiết kế mỏng nhẹ, thuận tiện cho việc di chuyển, cùng với một cấu hình đáp ứng khá tốt nhu cầu đồ họa cơ bản thì thì chắc chắn, đây sẽ là một lựa chọn hoàn hảo trong phân khúc.<br>Thiết kế mỏng, nhẹ và trang nhã
Sản phẩm khoác lên mình một chiếc áo bằng nhựa được gia công hoàn thiện và tỉ mỉ đến từng chi tiết. Ngoài ra, với trọng lượng khá nhẹ chỉ 1.54 kg giúp cho người dùng có thể dễ dàng di chuyển cực kì thoải mái cùng sản phẩm đến công ty, trường học mà không cảm thấy mệt mỏi.<br>Hình ảnh sắc nét, chân thật đến từng chi tiết
Laptop Lenovo Ideapad 530S (81EU00P5VN) được trang bị màn hình có kích thước vừa phải 14 inch với độ phân giải FHD (1920 x 1080) cho trải nghiệm hình ảnh chân thật, sắc nét đến từng chi tiết. Bên cạnh đó, sản phẩm còn hỗ trợ màn hình chống chói giúp cho việc sử dụng máy tính, nhất là ở những vị trí ngược sáng, sẽ trở nên dễ dàng hơn bao giờ hết.<br>Cấu hình khá khỏe, xử lý tốt các thao tác đồ họa cơ bản<br>
Được trang bị chip xử lý mạnh mẽ đến từ Intel - Core i7-8550U kết hợp cùng 8GB Ram DDR4 giúp chạy mượt mà các ứng dụng văn phòng cũng như xử lý tốt các thao tác đồ họa cơ bản trong photoshop, AI,....<br>Mang đến âm thanh chất lượng cao cùng công nghệ Dolby Audio Premium
Với công nghệ âm thanh Dolby Audio Premium được tích hợp trong sản phẩm giúp mang đến âm thanh phong phú, rõ ràng, trong trẻo và mạnh mẽ. Bên cạnh đó, nổi bật là tính năng âm thanh vòm của công nghệ Dolby Audio Premium sẽ giúp cho người dùng có những trải nghiệm âm thanh chất lượng cao qua những bộ phim bom tấn như khi đang xem phim tại rạp.

                        </textarea>
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
