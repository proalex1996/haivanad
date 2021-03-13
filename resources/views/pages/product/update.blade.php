@extends('pages.top-page.master')
@section('title','Sửa Pano')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap">
                <h2 class="title-1">Sửa Thông Tin Pano</h2>
            </div>
        </div>
        <form action="{{\Illuminate\Support\Facades\URL::to('/product/update/' . $banners->id)}}"
              enctype="multipart/form-data" class="needs-validation" method="post">
            @csrf
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Mã Pano: </label>
                <input type="text" class="form-customer-input" value="{{$banners ->id_banner}}" id="id_banner" name="id_banner"
                       placeholder="Mã Pano" size="20" required>
                <div class="invalid-feedback">Mã Pano không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Tên Vị Trí: </label>
                <input type="text" class="form-customer-input" value="{{$banners ->id_banner}}" id="location" name="location"
                       placeholder="Tên Vị Trí" required>
                <div class="invalid-feedback">Tên Vị Trí không được để trống</div>
            </div>

            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Địa Chỉ: </label>
                <input type="text" class="form-customer-input" value="{{$banners->banner_adress}}" id="banner_adress" name="banner_adress"
                       placeholder="Địa chỉ" required>
                <div class="invalid-feedback">Địa chỉ không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Quận/Huyện: </label>
                <input type="text" class="form-customer-input" value="{{$banners->banner_adress}}" id="quan" name="quan"
                       placeholder="Quận/Huyện" required>
                <div class="invalid-feedback">Quận/Huyện không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Tỉnh: </label>
                <input type="text" class="form-customer-input" value="{{$banners->banner_adress}}" id="tinh" name="tinh"
                       placeholder="Tỉnh/Thành Phố" required>
                <div class="invalid-feedback">Quận/Huyện không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Loại Hình Sản Phẩm: </label>
                <input type="text" class="form-customer-input" value="{{$banners->banner_adress}}" id="id_typebanner" name="id_typebanner"
                       placeholder="Loại Hình Sản Phẩm" required>
                <div class="invalid-feedback">Loại Hình Sản Phẩm không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Kết Cấu: </label>
                <input type="text" class="form-customer-input" value="{{$banners->banner_adress}}" id="id_system" name="id_system"
                       placeholder="Loại Hình Sản Phẩm" required>
                <div class="invalid-feedback">Kết Cấu không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Kích Thước:</label>
                <input class="form-customer-input" type="number" id="size_banner" value="{{$banners->size_banner}}" name="size_banner" placeholder="Kích thước" required>
                <div class="invalid-feedback">Kích thước không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Tổng Chiều Cao: </label>
                <input class="form-customer-input" type="number" id="height_banner" value="{{$banners->height_banner}}" name="height_banner" placeholder="Tổng chiều cao" required>
                <div class="invalid-feedback">Email không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Hệ Thống Đèn: </label>
                <input class="form-customer-input" type="number" id="light_system" value="{{$banners->light_system}}" name="light_system" placeholder="Hệ thống đèn" required>
                <div class="invalid-feedback">Hệ thống đèn không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname" >Nội Dung: </label>
                <input type="text" class="form-customer-input" id="banner_content" value="{{$banners->content}}" name="banner_content"
                       placeholder="Địa chỉ" required>
                <div class="invalid-feedback">Nội không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Đặt điểm: </label>
                <input type="text" class="form-customer-input" id="dac_diem" value="{{$banners->content}}" name="dac_diem"
                       placeholder="Địa chỉ" >
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Lưu Lượng người: </label>
                <input type="text" class="form-customer-input" id="flow" value="{{$banners->content}}" name="flow"
                       placeholder="Địa chỉ">
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Điểm Escom: </label>
                <input type="text" class="form-customer-input" id="escom" value="{{$banners->content}}" name="escom"
                       placeholder="Điểm Escom">
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Giá năm: </label>
                <input type="text" class="form-customer-input" id="gianam" value="{{$banners->content}}" name="gianam"
                       placeholder="Giá năm">
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Giá 9 Tháng: </label>
                <input type="text" class="form-customer-input" id="gia9thang" value="{{$banners->content}}" name="gia9thang"
                       placeholder="Giá 9 Tháng">
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Giá 6 Tháng: </label>
                <input type="text" class="form-customer-input" id="gia6thang" value="{{$banners->content}}" name="gia6thang"
                       placeholder="Địa chỉ">
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Giá 3 Tháng: </label>
                <input type="text" class="form-customer-input" id="gia3thang" value="{{$banners->content}}" name="gia3thang"
                       placeholder="Giá 3 Tháng">
            </div>
            <div class="form-customer">
                <label for="exampleFormControlSelect1">Trạng Thái</label>
                <select class="form-control" id="status_banner" name="status">
                    @foreach($statuss as $status)
                        @if ($status->id_status == $banners->status)
                            <option value="{{$status->id_status}}" selected>{{$status->name_status}}</option>
                        @else
                            <option value="{{$status->id_status}}">{{$status->name_status}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Ảnh Minh Họa</label>
                <div class="custom-file">
                    <label class="custom-file-label" for="validatedCustomFile">Chọn file...</label>
                    <input type="file" class="custom-file-input" value="{{$banners->thumb_banner}}" accept="image/*" id="content_contract"
                           name="thumb_banner">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="au-btn au-btn-icon au-btn--blue float-right m-b-25">
                    <i class="zmdi zmdi-plus"></i>Sửa
                </button>
            </div>
        </form>
    </div>
@endsection


