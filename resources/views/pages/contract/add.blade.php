@extends('pages.top-page.master')
@section('title','Thêm Hợp Đồng')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap">
                <h2 class="title-1">Thêm Mới Hợp đồng</h2>
                <button class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-plus"></i>Nhập file Excel
                </button>
            </div>
        </div>
        <form action="add" enctype="multipart/form-data" class="needs-validation" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1 uname">Mã Hợp đồng</label>
                <input type="text" class="form-control" id="id_contract" name="id_contract"
                       placeholder="Tên Hợp đồng" required>
                <div class="invalid-feedback">Tên Hợp đồng không được để trống</div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Tên khách hàng</label>
                <select class="form-control" id="name_customer" name="name_customer">
                    @foreach($customer as $name_customer)
                        <option value="{{$name_customer->customer_id}}">{{$name_customer->name_customer}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Mã Pano</label>
                <select class="form-control" id="id_banner" name="id_banner">
                    @foreach($banners as $banner)
                        <option value="{{$banner->id}}">{{$banner->id_banner}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Nội dung hợp đồng</label>
                <div class="custom-file">
                    <label class="custom-file-label" for="validatedCustomFile">Chọn file...</label>
                    <input type="file" class="custom-file-input" accept=".doc,.docx,.pdf" id="content_contract"
                           name="content_contract" required>
                    <div class="invalid-feedback">Định dạng file phải là .doc, .docx,  .pdf</div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Nhân Viên Phụ Trách</label>
                <select class="form-control " id="exampleFormControlSelect2" name="name_staff" required>
                    @foreach($staffs as $staff)
                        <option value="{{$staff->id}}">{{$staff->name_staff}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row form-group">
                <div class='col-sm-4'>
                    <label for="dateofbirth" style="width: 160px">Ngày bắt đầu:</label>
                    <input type="date" name="date_start" id="dateofbirth" required>
                    <div class="invalid-feedback m-l-20">Vui lòng nhập ngày bắt đầu hợp đồng</div>
                </div>
                <div class='col-sm-4'>
                    <label for="dateofbirth" style="width: 130px" >Ngày kết thúc</label>
                    <input type="date" name="date_end" id="dateofbirth" required>
                    <div class="invalid-feedback m-l-20">Vui lòng nhập ngày kết thúc hợp đồng</div>
                </div>
                <div class='col-sm-4'>
                    <label for="dateofbirth" style="width: 130px" >Lịch thanh toán</label>
                    <input type="date" name="pay_due" id="pay_due" required>
                    <div class="invalid-feedback m-l-20">Vui lòng nhập lịch thanh toán hợp đồng</div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Loại hợp đồng</label>
                <select class="form-control" id="kind_name" name="kind_name">
                    @foreach($kind_contract as $kind)
                        <option value="{{$kind->id_contract}}">{{$kind->name_kind}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Giá trị hợp đồng</label>
                <div class="d-inline-flex">
                    <input type="number" class="form-control" id="exampleFormControlInput1" name="value_contract"
                           placeholder="Giá trị hợp đồng" required>
                    <label for="exampleFormControlInput1">VND</label>
                    <div class="invalid-feedback m-l-20">Vui lòng nhập giá trị hợp đồng</div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Trạng Thái</label>
                <select class="form-control" id="kind_name" name="status">
                    @foreach($status as $stt)
                        <option value="{{$stt->id_contract}}">{{$stt->name_status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1 uname">Ghi Chú</label>
                <input type="text" class="form-control" id="note_contract" name="note_contract"
                       placeholder="Ghi Chú">
            </div>
            <div class="form-group">
                <button type="submit" class="au-btn au-btn-icon au-btn--blue float-right m-b-25">
                    <i class="zmdi zmdi-plus"></i>Thêm
                </button>
            </div>
        </form>
    </div>
@endsection
