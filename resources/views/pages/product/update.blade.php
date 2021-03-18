@extends('pages.top-page.master')
@section('title','Thêm Pano')
@section('content')

    <div class="container-fluid">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap">
                <h2 class="title-1">Chi Tiết Pano</h2>
                <a type="button" class="au-btn au-btn-icon au-btn--blue" href="import-product">
                    <i class="zmdi zmdi-plus"></i>Nhập file Excel
                </a>
            </div>
        </div>
        <form action="add" enctype="multipart/form-data" class="needs-validation" method="post">
            @csrf
            <div class="form-staff">
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Mã Pano: </label>
                    <input type="text" class="form-customer-input" id="id_banner" value="{{$banners->id}}" name="id_banner"
                           placeholder="Mã Pano" size="20" required>
                    <div class="invalid-feedback">Mã Pano không được để trống</div>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Lưu Lượng Người: </label>
                    <input class="form-customer-input" type="number" id="flow" value="{{$banners->flow}}" name="flow"
                           placeholder="Lưu Lượng Người">
                </div>

                <div class="form-customer">
                    <label for="exampleFormControlSelect1">Tỉnh/Thành Phố</label>
                    <select class="form-control" id="tinh" name="tinh" data-target="{{$banners->tinh}}" onchange="getQuan(this)">
                        <option value="">-- Chọn tỉnh thành --</option>
                    </select>
                </div>

                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Vị Trí:</label>
                    <input type="text" class="form-customer-input" id="location" value="{{$banners -> location}}" name="location"
                           placeholder="Tên Vị Trí">
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Địa Chỉ: </label>
                    <input type="text" class="form-customer-input" id="banner_adress" value="{{$banners -> banner_adress}}"name="banner_adress"
                           placeholder="Địa chỉ" required>
                    <div class="invalid-feedback">Địa chỉ không được để trống</div>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlSelect1">Quận/Huyện</label>
                    <select class="form-control" id="quan" data-target="{{$banners->quan}}" name="quan" >
                        <option value="">-- Chọn Quận/Huyện --</option>

                    </select>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Kết Cấu: </label>
                    <input type="text" class="form-customer-input" id="id_system" value="{{$banners -> id_system}}" name="id_system"
                           placeholder="Kết Cấu">
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Kích Thước:</label>
                    <input class="form-customer-input" type="number" id="size_banner" value="{{$banners->size_banner}}" name="size_banner"
                           placeholder="Kích thước" required>
                    <div class="invalid-feedback">Kích thước không được để trống</div>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlSelect1">Trạng Thái</label>
                    <select class="form-control" id="status_banner" name="status_banner">
                        @foreach($statuss as $status)
                            @if($banners->name_banner == $status->id_status)
                                <option value="{{$status->id_status}}" selected>{{$status->name_status}}</option>
                            @else
                                <option value="{{$status->id_status}}">{{$status->name_status}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Tổng Chiều Cao: </label>
                    <input class="form-customer-input" type="text" id="height_banner" value="{{$banners->height_banner}}"  name="height_banner"
                           placeholder="Tổng chiều cao" required>
                    <div class="invalid-feedback">Email không được để trống</div>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Hệ Thống Đèn: </label>
                    <input class="form-customer-input" type="text" id="light_system" value="{{$banners->light_system}}" name="light_system"
                           placeholder="Hệ thống đèn" required>
                    <div class="invalid-feedback">Hệ thống đèn không được để trống</div>
                </div>

                <div class="form-customer">
                    <label for="exampleFormControlSelect1">Loại Hình Sản Phẩm</label>
                    <select class="form-control" id="id_typebanner" name="id_typebanner">
                        @foreach($type_banners as $type_banner)
                            @if($banners->id_typebanner == $type_banner->id_typebanner)
                                <option value="{{$type_banner->id_typebanner}}" selected>{{$type_banner->name_type}}</option>
                            @else
                                <option value="{{$type_banner->id_typebanner}}">{{$type_banner->name_type}}</option>
                            @endif
                        @endforeach

                    </select>
                </div>

                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Điểm Escom: </label>
                    <input class="form-customer-input" type="text" id="escom" name="escom" value="{{$banners->escom}}" placeholder="Điểm Escom">
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Ghi Chú: </label>
                    <input class="form-customer-input" type="text" id="note_banner" value="{{$banners->note_banner}}"  name="note_banner" placeholder="Ghí Chú">
                </div>

                    <label for="exampleFormControlSelect1">Hình Ảnh</label>
                    <div class="custom-file">
                        <label class="custom-file-label" for="validatedCustomFile">{{$banners->thumb_banner}}</label>
                        <input type="file" class="custom-file-input"
                               accept="image/*" id="content_contract"
                               name="thumb_banner" {{is_null($banners->thumb_banner) ? "required" : ""}}>
                        <input type="hidden" name="content_hide" value="{{$banners->thumb_banner}}">
                        <div class="invalid-feedback">Định dạng file phải là .img, .png</div>
                    </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Đặt Điểm</label>
                    <textarea class="form-control" id="dac_diem" name="dac_diem" rows="5">{{$banners->dac_diem}}</textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="au-btn au-btn-icon au-btn--blue float-right m-b-25">
                        <i class="zmdi zmdi-plus"></i>Sửa
                    </button>
                    <a type="button"  href="{{url('/product')}}" class="au-btn au-btn-icon au-btn--blue float-right m-b-25 m-r-10">
                        <i class="zmdi zmdi-plus"></i>Quay lại
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection


