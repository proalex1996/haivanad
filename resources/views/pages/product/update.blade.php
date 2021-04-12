
@extends('pages.top-page.master')
@section('title','Chi Tiết Pano')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap">
                <h2 class="title-1">Chi Tiết Pano</h2>
            </div>
        </div>
        <form action="{{\Illuminate\Support\Facades\URL::to('/product/update/' . $banners->id)}}"
              enctype="multipart/form-data" class="needs-validation" method="post">
            @csrf

            <div class="container">
                <div class="container-fluid">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <input type="hidden" class="form-customer-input" id="id_banner" value="{{$banners->id_banner}}" name="id_banner"
                                           placeholder="Mã Pano" size="20">
                                    <div class="col-md-3 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Tên Pano:</label>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <input type="text" class="form-customer-input" id="_name_banner" value="{{$banners -> _name_banner}}" name="_name_banner"
                                               placeholder="Tên Pano" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Địa Chỉ: </label>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <input type="text" class="form-customer-input"  value="{{$banners -> banner_adress}}" name="banner_adress"
                                               placeholder="Địa chỉ" required>
                                        <div class="invalid-feedback">Địa chỉ không được để trống</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Loại Hình Sản Phẩm:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" name="id_typebanner">
                                            @foreach($type_banners as $type_banner)
                                                @if($banners->id_typebanner == $type_banner->id_typebanner)
                                                    <option value="{{$type_banner->id_typebanner}}" selected>{{$type_banner->name_type}}</option>
                                                @else
                                                    <option value="{{$type_banner->id_typebanner}}">{{$type_banner->name_type}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1">Kết Cấu: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-customer-input"  value="{{$banners -> id_system}}" name="id_system"
                                               placeholder="Kết Cấu" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Trạng Thái:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control"  name="status_banner">
                                            @foreach($statuss as $status)
                                                @if($banners->name_banner == $status->id_status)
                                                    <option value="{{$status->id_status}}" selected>{{$status->name_status}}</option>
                                                @else
                                                    <option value="{{$status->id_status}}">{{$status->name_status}}</option>
                                                @endif
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Giá Năm(USD): </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" data-type="currency" type="text" value="{{$banners->gianam}}"  name="gianam"
                                               placeholder="Giá Năm" required>
                                        <div class="invalid-feedback">Giá Năm không được để trống</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Tỉnh/Thành Phố:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" name="tinh" id="tinh" onchange="getQuan(this)">
                                            <option value="">--Tỉnh/Thành Phố--</option>
                                            @foreach($provinces as $province)
                                                @if ($banners->tinh == $province->_code)
                                                    <option value="{{$province->_code}}" selected>{{$province -> _name}}</option>
                                                @else
                                                <option value="{{$province->_code}}">{{$province -> _name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Quận/Huyện:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="quan" name="quan">
                                            <option value="">--Quận/Huyện--</option>
                                            @foreach($districts as $district)
                                                @if ($banners->quan == $district->id_district)
                                                    <option value="{{$district->id_district}}" selected>{{$district ->_name_district}}</option>

                                                @else
                                                <option value="{{$district->id_district}}">{{$district ->_name_district}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Kích Thước:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="number" value="{{$banners->size_banner}}" name="size_banner"
                                               placeholder="Kích thước" required>
                                        <div class="invalid-feedback">Kích thước không được để trống</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Diện Tích: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="text" value="{{$banners->dien_tich}}" name="dien_tich"
                                               placeholder="Diện Tích" required>
                                        <div class="invalid-feedback">Email không được để trống</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Tổng Chiều Cao: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="text" value="{{$banners->height_banner}}"  name="height_banner"
                                               placeholder="Tổng chiều cao" required>
                                        <div class="invalid-feedback">Email không được để trống</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Hệ Thống Đèn: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="text" value="{{$banners->light_system}}" name="light_system"
                                               placeholder="Hệ thống đèn" required>
                                        <div class="invalid-feedback">Hệ thống đèn không được để trống</div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Lưu Lượng Người: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="number" name="flow"
                                               placeholder="Lưu Lượng Người" value="{{$banners->flow}}" required>
                                        <div class="invalid-feedback">Lưu Lượng Người không được để trống</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Điểm Escom: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="text" name="escom"
                                               placeholder="Điểm Escom" value="{{$banners->escom}}" required>
                                        <div class="invalid-feedback">Điểm Escom không được để trống</div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Giá Đèn(USD): </label>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <input class="form-customer-input" type="text" value="{{$banners->v_light}}" name="v_light"
                                               placeholder="Giá Đèn(USD)">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Ghi Chú: </label>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <input class="form-customer-input" type="text" value="{{$banners->note_banner}}" name="note_banner"
                                               placeholder="Ghi Chú">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Đặc Điểm:</label>
                        <textarea class="form-control" name="dac_diem" rows="5">{{$banners->dac_diem}}</textarea>
                    </div>
                <div class="form-group">
                    <div class="row" id="views-photo">
                        <div class="col-md-3 col-sm-12 label-views">
                            <label for="exampleFormControlInput1 uname">Hướng Nhìn 1: </label>
                        </div>
                        <div class="col-md-3 col-sm-12 label-views">
                            <label for="exampleFormControlInput1 uname">Hướng Nhìn 2: </label>
                        </div>
                        <div class="col-md-3 col-sm-12 label-views">
                            <label for="exampleFormControlInput1 uname">Hướng Nhìn 3: </label>
                        </div>
                        <div class="col-md-3 col-sm-12 label-views">
                            <label for="exampleFormControlInput1 uname">Hướng Nhìn 4: </label>
                        </div>
                </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" >Hình Ảnh:</label>
                        <div class="input-images-2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" >Sơ Đồ:</label>
                        <div class="input-images-map-2">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="au-btn au-btn-icon au-btn--blue float-right">
                            <i class="far fa-edit"></i>Lưu
                        </button>

                        <a data-id_data="{{$banners->id_banner}}" data-toggle="modal"
                             data-target="#detroy" onclick="openDestroyDialog(this, 'destroy-value')"
                             id="open-deleteProduct" type="button" class="au-btn au-btn-icon au-btn--red float-left">
                            <i class="far fa-trash-alt"></i>Xóa
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
<div class="modal fade" id="detroy">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thông Báo</h4>
                @if(auth()->user()->id_phan_quyen == 1)
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                Xác nhận xóa
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>

                <a type="button" id="destroy-value"
                   data-destroy-link="{{\Illuminate\Support\Facades\URL::to('product/destroy')."/"}}"
                   class="btn btn-primary">Xác Nhận
                </a>
            </div>
                @else

                    <div class="modal-body m-t-20">
                        Bạn không được cấp quyền xóa
                     </div>
                    <button type="button" class="btn btn-secondary m-t-70" data-dismiss="modal">Đóng</button>


               @endif
            </div>
        </div>
    </div>
</div





{{--                <div class="form-customer">--}}
{{--                    <label for="exampleFormControlSelect1">Tỉnh/Thành Phố</label>--}}
{{--                    <select class="form-control" id="tinh" name="tinh" data-target="{{$banners->tinh}}" onclick="getQuan(this)">--}}
{{--                        <option value="">-- Chọn tỉnh thành --</option>--}}
{{--                    </select>--}}
{{--                </div>--}}

{{--                <div class="form-customer">--}}
{{--                    <label for="exampleFormControlInput1 uname">Vị Trí:</label>--}}
{{--                    <input type="text" class="form-customer-input" id="location" value="{{$banners -> location}}" name="location"--}}
{{--                           placeholder="Tên Vị Trí">--}}
{{--                </div>--}}
{{--                <div class="form-customer">--}}
{{--                    <label for="exampleFormControlInput1 uname">Địa Chỉ: </label>--}}
{{--                    <input type="text" class="form-customer-input" id="banner_adress" value="{{$banners -> banner_adress}}"name="banner_adress"--}}
{{--                           placeholder="Địa chỉ" required>--}}
{{--                    <div class="invalid-feedback">Địa chỉ không được để trống</div>--}}
{{--                </div>--}}
{{--                <div class="form-customer">--}}
{{--                    <label for="exampleFormControlSelect1">Quận/Huyện</label>--}}
{{--                    <select class="form-control" id="quan" data-target="{{$banners->quan}}" name="quan" >--}}
{{--                        <option value="">-- Chọn Quận/Huyện --</option>--}}

{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="form-customer">--}}
{{--                    <label for="exampleFormControlInput1 uname">Kết Cấu: </label>--}}
{{--                    <input type="text" class="form-customer-input" id="id_system" value="{{$banners -> id_system}}" name="id_system"--}}
{{--                           placeholder="Kết Cấu">--}}
{{--                </div>--}}
{{--                <div class="form-customer">--}}
{{--                    <label for="exampleFormControlInput1 uname">Kích Thước:</label>--}}
{{--                    <input class="form-customer-input" type="number" id="size_banner" value="{{$banners->size_banner}}" name="size_banner"--}}
{{--                           placeholder="Kích thước" required>--}}
{{--                    <div class="invalid-feedback">Kích thước không được để trống</div>--}}
{{--                </div>--}}
{{--                <div class="form-customer">--}}
{{--                    <label for="exampleFormControlSelect1">Trạng Thái</label>--}}
{{--                    <select class="form-control" id="status_banner" name="name_status">--}}
{{--                        @foreach($statuss as $status)--}}
{{--                            @if($banners->name_banner == $status->id_status)--}}
{{--                                <option value="{{$status->id_status}}" selected>{{$status->name_status}}</option>--}}
{{--                            @else--}}
{{--                                <option value="{{$status->id_status}}">{{$status->name_status}}</option>--}}
{{--                            @endif--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}

{{--                <div class="form-customer">--}}
{{--                    <label for="exampleFormControlInput1 uname">Tổng Chiều Cao: </label>--}}
{{--                    <input class="form-customer-input" type="text" id="height_banner" value="{{$banners->height_banner}}"  name="height_banner"--}}
{{--                           placeholder="Tổng chiều cao" required>--}}
{{--                    <div class="invalid-feedback">Email không được để trống</div>--}}
{{--                </div>--}}
{{--                <div class="form-customer">--}}
{{--                    <label for="exampleFormControlInput1 uname">Hệ Thống Đèn: </label>--}}
{{--                    <input class="form-customer-input" type="text" id="light_system" value="{{$banners->light_system}}" name="light_system"--}}
{{--                           placeholder="Hệ thống đèn" required>--}}
{{--                    <div class="invalid-feedback">Hệ thống đèn không được để trống</div>--}}
{{--                </div>--}}

{{--                <div class="form-customer">--}}
{{--                    <label for="exampleFormControlSelect1">Loại Hình Sản Phẩm</label>--}}
{{--                    <select class="form-control" id="id_typebanner" name="id_typebanner">--}}
{{--                        @foreach($type_banners as $type_banner)--}}
{{--                            @if($banners->id_typebanner == $type_banner->id_typebanner)--}}
{{--                                <option value="{{$type_banner->id_typebanner}}" selected>{{$type_banner->name_type}}</option>--}}
{{--                            @else--}}
{{--                                <option value="{{$type_banner->id_typebanner}}">{{$type_banner->name_type}}</option>--}}
{{--                            @endif--}}
{{--                        @endforeach--}}

{{--                    </select>--}}
{{--                </div>--}}

{{--                <div class="form-customer">--}}
{{--                    <label for="exampleFormControlInput1 uname">Điểm Escom: </label>--}}
{{--                    <input class="form-customer-input" type="text" id="escom" name="escom" value="{{$banners->escom}}" placeholder="Điểm Escom">--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <label for="exampleFormControlSelect1">Hình Ảnh</label>--}}
{{--                    <div class="custom-file">--}}
{{--                        <label class="custom-file-label" for="validatedCustomFile">{{$banners->thumb_banner}}</label>--}}
{{--                        <input type="file" class="custom-file-input"--}}
{{--                               accept="image/*" id="content_contract"--}}
{{--                               name="thumb_banner" {{is_null($banners->thumb_banner) ? "required" : ""}}>--}}
{{--                        <input type="hidden" name="content_hide" value="{{$banners->thumb_banner}}">--}}
{{--                        <div class="invalid-feedback">Định dạng file phải là .doc, .docx, .pdf</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="exampleFormControlTextarea1">Đặt Điểm</label>--}}
{{--                    <textarea class="form-control" id="dac_diem" name="dac_diem" rows="5">{{$banners->dac_diem}}</textarea>--}}
{{--                </div>--}}
{{--                <div class="form-customer">--}}
{{--                    <label for="exampleFormControlInput1 uname">Ghi Chú: </label>--}}
{{--                    <input class="form-customer-input" type="text" id="note_banner" value="{{$banners->note_banner}}"  name="note_banner" placeholder="Ghí Chú">--}}
{{--                </div>--}}

{{--                <div class="form-group">--}}
{{--                    <button type="submit" class="au-btn au-btn-icon au-btn--blue float-right m-b-25">--}}
{{--                        <i class="zmdi zmdi-plus"></i>Sửa--}}
{{--                    </button>--}}
{{--                    <button type="submit" class="au-btn au-btn-icon au-btn--blue float-right m-b-25 m-r-10">--}}
{{--                        <i class="zmdi zmdi-plus"></i>Quay lại--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--@endsection--}}


