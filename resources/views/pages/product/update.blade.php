
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
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Mã Sản Phẩm:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-customer-input" value="{{$banners->id_banner}}" onchange="getProduct()" id="id_banner"
                                               name="id_banner"
                                               readonly>
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
                                               placeholder="Địa chỉ" >
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
                                               placeholder="Kết Cấu"  maxlength="20">
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
                                        <select class="form-control"  name="name_status">
                                            @foreach($statuss as $status)
                                                @if($banners->name_status == $status->id_status)
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
                                        <label for="exampleFormControlInput1 uname">Kích Thước:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="text" value="{{$banners->size_banner}}" name="size_banner"
                                               placeholder="Kích thước"  maxlength="20">
                                        <div class="invalid-feedback">Kích thước không được để trống</div>
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
                                        <label for="exampleFormControlInput1 uname">Diện Tích: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="text" value="{{$banners->dien_tich}}" name="dien_tich"
                                               placeholder="Diện Tích" >
                                        <div class="invalid-feedback">Email không được để trống</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Tổng Chiều Cao: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="text" value="{{$banners->height_banner}}"  name="height_banner"
                                               placeholder="Tổng chiều cao"  maxlength="20">
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
                                        <label for="exampleFormControlInput1 uname">Hệ Thống Đèn: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="text" value="{{$banners->light_system}}" name="light_system"
                                               placeholder="Hệ thống đèn"  maxlength="20">
                                        <div class="invalid-feedback">Hệ thống đèn không được để trống</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Lưu Lượng Người: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="text" name="flow"
                                               placeholder="Lưu Lượng Người" value="{{$banners->flow}}"  maxlength="20">
                                        <div class="invalid-feedback">Lưu Lượng Người không được để trống</div>
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
                                        <label for="exampleFormControlInput1 uname">Giá Đèn(USD): </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" id="v_light" type="text" value="{{$banners->v_light}}" name="v_light" data-type="currency"
                                               placeholder="Giá Đèn(USD)">
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
                                               placeholder="Điểm Escom" value="{{$banners->escom}}"  maxlength="20">
                                        <div class="invalid-feedback">Điểm Escom không được để trống</div>
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
                                        <label for="exampleFormControlInput1 uname">Giá Năm(USD): </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" id="gianam" data-type="currency" type="text" value="{{$banners->gianam}}"  name="gianam"
                                               placeholder="Giá Năm">
                                        <div class="invalid-feedback">Giá Năm không được để trống</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Tổng Giá(USD): </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" id="tong" data-type="currency" type="text"  name="tonggia"
                                               placeholder="Tổng giá">
                                        <div class="invalid-feedback">Tổng giá không được để trống</div>
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

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <label for="exampleFormControlInput1 uname">Nội Dung Quảng Cáo Hiện Tại: </label>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <input class="form-customer-input" type="text" value="{{$banners->content}}" name="content"
                                           placeholder="content">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Đặc Điểm:</label>
                        <textarea class="form-control text-aria" name="dac_diem" rows="5">{{$banners->dac_diem}}</textarea>
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
