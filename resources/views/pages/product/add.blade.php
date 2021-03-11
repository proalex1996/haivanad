@extends('pages.top-page.master')
@section('title','Thêm Pano')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap">
                <h2 class="title-1">Thêm Mới Pano</h2>
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
                    <input type="text" class="form-customer-input" id="id_banner" name="id_banner"
                           placeholder="Mã Pano" size="20" required>
                    <div class="invalid-feedback">Mã Pano không được để trống</div>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Tên Pano:</label>
                    <input type="text" class="form-customer-input" id="name_banner" name="name_banner"
                           placeholder="Tên Pano" required>
                    <div class="invalid-feedback">Tên Pano không được để trống</div>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Vị Trí:</label>
                    <input type="text" class="form-customer-input" id="location" name="location"
                           placeholder="Tên Vị Trí">
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Địa Chỉ: </label>
                    <input type="text" class="form-customer-input" id="banner_adress" name="banner_adress"
                           placeholder="Địa chỉ" required>
                    <div class="invalid-feedback">Địa chỉ không được để trống</div>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Quận/Huyện: </label>
                    <input type="text" class="form-customer-input" id="quan" name="quan"
                           placeholder="Quận/Huyện">
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Tỉnh: </label>
                    <input type="text" class="form-customer-input" id="tinh" name="tinh"
                           placeholder="Tỉnh">
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Loại hình Sản Phẩm: </label>
                    <input type="text" class="form-customer-input" id="id_typebanner" name="id_typebanner"
                           placeholder="Loại hình Sản Phẩm">
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Kết Cấu: </label>
                    <input type="text" class="form-customer-input" id="id_system" name="id_system"
                           placeholder="Kết Cấu">
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Kích Thước:</label>
                    <input class="form-customer-input" type="number" id="size_banner" name="size_banner"
                           placeholder="Kích thước" required>
                    <div class="invalid-feedback">Kích thước không được để trống</div>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Tổng Chiều Cao: </label>
                    <input class="form-customer-input" type="text" id="height_banner" name="height_banner"
                           placeholder="Tổng chiều cao" required>
                    <div class="invalid-feedback">Email không được để trống</div>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Hệ Thống Đèn: </label>
                    <input class="form-customer-input" type="text" id="light_system" name="light_system"
                           placeholder="Hệ thống đèn" required>
                    <div class="invalid-feedback">Hệ thống đèn không được để trống</div>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Đặc điểm: </label>
                    <input class="form-customer-input" type="number" id="dac_diem" name="dac_diem"
                           placeholder="Đặc điểm">
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Lưu Lượng Người: </label>
                    <input class="form-customer-input" type="number" id="flow" name="flow"
                           placeholder="Lưu Lượng Người">
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Điểm Escom: </label>
                    <input class="form-customer-input" type="text" id="escom" name="escom" placeholder="Điểm Escom">
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlSelect1">Trạng Thái</label>
                    <select class="form-control" id="status_banner" name="status_banner">
                        @foreach($statuss as $status)
                            <option value="{{$status->id_status}}">{{$status->name_status}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="au-btn au-btn-icon au-btn--blue float-right m-b-25">
                        <i class="zmdi zmdi-plus"></i>Thêm
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection


