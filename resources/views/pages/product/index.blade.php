
@extends('pages.top-page.master')
@section('title','Sản Phẩm')
@section('content')
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <h2 class="title-1">Quản Lý Sản Phẩm</h2>
                    <form action="{{url('product/export')}}" method="post" id="export_excel_form">
                        @csrf
                        <div class="exp-excel m-r-10">
                            <input type="hidden" id="export_product" name="export_product" value="">
                            <button class="au-btn au-btn-icon au-btn--blue"  type="submit">
                                <i class="zmdi zmdi-plus"></i>Xuất file Excel
                            </button>
                        </div>
                    </form>
                    <form action="{{url('product/pptx')}}" method="post" id="export_ppt_form">
                        @csrf
                            <div class="add-contract">
                            <input type="hidden" id="checkbox_hidden" name="checkbox_hidden" value="">
                            <button id="button_1" name="form1" onclick="disableButton(this), getSession()" class="au-btn au-btn-icon au-btn--blue">
                                <i class="zmdi zmdi-plus"></i>Xuất File PPT
                            </button>
                        </div>
                    </form>
                    <div class="add-contract">
                        <a class="au-btn au-btn-icon au-btn--blue" href="product/add">
                            <i class="zmdi zmdi-plus"></i>Thêm mới Pano
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-t-30">
            <div class="col-md-12">
                <form class="post-form-sort" action="{{url('/product')}}" method="post">
                    @csrf
                        <div class="row">
                            <div class="col-md-3 col-sm-12 m-t-10">
                                <label for="exampleFormControlInput1 ">Mã Pano</label>
                                <input type="text" class="form-control" id="id_banner" name="id_banner"
                                       placeholder="Mã Pano">
                            </div>
                            <div class="col-md-3 col-sm-12 m-t-10">
                                <label for="exampleFormControlInput1 ">Tên Pano</label>
                                <input type="text" class="form-control" id="_name_banner" name="_name_banner"
                                       placeholder="Tên Pano">
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlSelect1">Tỉnh/Thành Phố:</label>
                            <select class="form-control" id="tinh" name="tinh" onchange="getQuan(this)">
                                <option value="">--Tỉnh/Thành Phố--</option>
                                @foreach($provinces as $province)
                                    <option value="{{$province -> _code}}">{{$province -> _name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlSelect1">Quận/Huyện:</label>
                            <select class="form-control" id="quan" name="quan">
                                <option value="">--Quận/Huyện--</option>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                            <div class="col-md-3 col-sm-12 m-t-10">
                                <label for="exampleFormControlSelect1">Loại Hình Sản Phẩm:</label>
                                <select class="form-control" id="id_typebanner" name="id_typebanner">
                                    <option value="">Tất Cả</option>
                                    @foreach($type_banners as $type_banner)
                                        <option value="{{$type_banner->id_typebanner}}">{{$type_banner->name_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-12 m-t-10">
                                <label for="exampleFormControlInput1 ">Trạng thái</label>
                                <select type="text" class="form-control" id="id_status" name="id_status">
                                    <option value="">Tất Cả</option>
                                    @foreach($status_banners as $status)
                                        <option value="{{$status->id_status}}">{{$status->name_status}}</option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="col-md-2 col-sm-12 m-t-30">
                            <label for="exampleFormControlInput1 "></label>
                            <button class="btn btn-primary btn-block" type="submit" aria-expanded="false">Tìm
                            </button>
                        </div>
                        </div>
                </form>

                <div class="table-container fixed_header ">
                    <table class="table table-borderless table-data3 table-test-responsive">
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="check-all" name="title" onchange="getCheckedBox()" onclick="checkAll()"></th>
                            <th width="20%">Mã Pano</th>
                            <th width="20%">Loại Hình</th>
                            <th width="20%">Vị Trí</th>
                            <th width="20%">Tỉnh/Thành Phố</th>
                            <th width="10%">Trạng thái</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="overflow-scroll">
                        @foreach($banners as $banner)
                            @if ($banner->id_status == 2)
                                <tr class="status--process" id="row_product_{{$banner->id}}" >
                                    <td><input type="checkbox" id="check-box" onchange="getCheckedBox()" data-target="{{$banner->id}}" name="check_box[]" value="{{$banner->id_banner}}"
                                               class="display-input m-r-5"></td>
                                    <td class="id_banner">{{$banner->id_banner}}</td>
                                    <td>2021+{{$banner->name_type}}</td>
                                    <td>{{$banner->_name_banner}}</td>
                                    <td>{{$banner->_name}}</td>
                                    <td><a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false" id="dropdownMenuLink"> {{$banner->name_status}}</a>
{{--                                        <div class="dropdown-menu">--}}
{{--                                            @foreach($status_banners as $status_banner)--}}
{{--                                                <a class="dropdown-item"--}}
{{--                                                   href="{{\Illuminate\Support\Facades\URL::to('product/pickupBanner'.$status_banner->id_status)."/".$banner->id}}">{{$status_banner->name_status}}</a>--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
                                    </td>

                                    <td><a href="{{url('/product/update/'.$banner->id)}}">Xem Chi Tiết</a></td>


                            @elseif($banner->id_status==1)
                                <tr id="row_product_{{$banner->id}}">
                                    <td><input type="checkbox" id="check-box" data-target="{{$banner->id}}" name="check_box[]" onchange="getCheckedBox()" value="{{$banner->id_banner}}"
                                               class="display-input m-r-5"></td>
                                    <td class="id_banner">{{$banner->id_banner}}</td>
                                    <td>{{$banner->name_type}}</td>
                                    <td>{{$banner->_name_banner}}</td>
                                    <td>{{$banner->_name}}</td>
                                    <td><a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false" id="dropdownMenuLink"> {{$banner->name_status}}</a>
{{--                                        <div class="dropdown-menu">--}}
{{--                                            @foreach($status_banners as $status_banner)--}}
{{--                                                <a class="dropdown-item"--}}
{{--                                                   href="{{\Illuminate\Support\Facades\URL::to('product/pickupBanner'.$status_banner->id_status)."/".$banner->id}}">{{$status_banner->name_status}}</a>--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
                                    </td>
                                    <td><a href="{{url('/product/update/'.$banner->id)}}">Xem Chi Tiết</a></td>
                            @else
                                <tr id="row_product_{{$banner->id}}">
                                    <td><input type="checkbox" id="check-box" data-target="{{$banner->id}}" name="check_box[]" onchange="getCheckedBox()" value="{{$banner->id_banner}}"
                                               class="display-input m-r-5"></td>
                                    <td class="id_banner">{{$banner->id_banner}}</td>
                                    <td>{{$banner->name_type}}</td>
                                    <td>{{$banner->_name_banner}}</td>
                                    <td>{{$banner->_name}}</td>
                                    <td><a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false" id="dropdownMenuLink"> {{$banner->name_status}}</a>
{{--                                        <div class="dropdown-menu">--}}
{{--                                            @foreach($status_banners as $status_banner)--}}
{{--                                                <a class="dropdown-item"--}}
{{--                                                   href="{{\Illuminate\Support\Facades\URL::to('product/pickupBanner'.$status_banner->id_status)."/".$banner->id}}">{{$status_banner->name_status}}</a>--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
                                    </td>
                                    <td><a href="{{url('/product/update/'.$banner->id)}}">Xem Chi Tiết</a></td>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    <div class="form-group m-t-10" id="count">
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Đặt Chỗ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="pickup_banner" action="{{\Illuminate\Support\Facades\URL::to('product/pickup')}}"
                      enctype="multipart/form-data" class="needs-validation" method="POST">
                    @csrf
                    <label for="exampleFormControlSelect1">Khách Hàng</label>
                    <select class="form-control" id="id_customer" name="id_customer">
                        {{$customers = \Illuminate\Support\Facades\DB::table('customer')->select('*')->get()}}
                        @foreach($customers as $customer)
                            <option value="{{$customer->customer_id}}">{{$customer->name_customer}}</option>
                        @endforeach
                    </select>
                    <label for="exampleFormControlSelect1">Trạng Thái</label>
                    <select class="form-control" id="name_status" name="name_status">
                        {{$stt_banners = \Illuminate\Support\Facades\DB::table('status_banner')->select('*')->get()}}
                        @foreach($stt_banners as $stt_banner)
                            <option value="{{$stt_banner->id_status}}">{{$stt_banner->name_status}}</option>
                        @endforeach
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button id="pickup" type="submit" class="btn btn-primary">Đặt Chỗ</button>
            </div>
        </div>
    </div>
</div>


{{--<div class="modal fade" id="due">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content container-fluid">--}}

{{--            <!-- Modal Header -->--}}
{{--            <div class="modal-header">--}}
{{--                <h4 class="modal-title">Đặt Chỗ Pano</h4>--}}
{{--                <button type="button" class="close" data-dismiss="modal">×</button>--}}
{{--            </div>--}}

{{--            <!-- Modal body -->--}}
{{--            <form id="pickup_banner" action="{{\Illuminate\Support\Facades\URL::to('product/pickup')}}"--}}
{{--                  enctype="multipart/form-data" class="needs-validation" method="POST">--}}
{{--                @csrf--}}
{{--                <div class="row form-group">--}}

{{--                    <div class="form-group">--}}
{{--                        <label for="exampleFormControlSelect1">Khách Hàng</label>--}}
{{--                        <select class="form-control" id="id_customer" name="id_customer">--}}
{{--                            {{$customers = \Illuminate\Support\Facades\DB::table('customer')->select('*')->get()}}--}}
{{--                            @foreach($customers as $customer)--}}
{{--                                <option value="{{$customer->customer_id}}">{{$customer->name_customer}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="exampleFormControlSelect1">Trạng Thái</label>--}}
{{--                        <select class="form-control" id="name_status" name="name_status">--}}
{{--                            {{$stt_banners = \Illuminate\Support\Facades\DB::table('status_banner')->select('*')->get()}}--}}
{{--                            @foreach($stt_banners as $stt_banner)--}}
{{--                                <option value="{{$stt_banner->id_status}}">{{$stt_banner->name_status}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>--}}
{{--                        <button type="submit"--}}
{{--                                class="btn btn-primary">Xác Nhận--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--            </form>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

