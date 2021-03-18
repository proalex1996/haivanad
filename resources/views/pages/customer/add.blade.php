@extends('pages.top-page.master')
@section('title','Thêm Khách Hàng')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap">
                <h2 class="title-1">Thêm Mới Khách Hàng</h2>
                <a type="button" class="au-btn au-btn-icon au-btn--blue" href="import-customer">
                    <i class="zmdi zmdi-plus" ></i>Nhập file Excel
                </a>
            </div>
        </div>
        <form action="add" enctype="multipart/form-data" class="needs-validation" method="post">
            @csrf
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname" style="width: 340px;">Mã Khách Hàng:</label>
                <input type="text" class="form-customer-input" id="customer_id" name="customer_id"
                       placeholder="Mã Khách Hàng" size="20" required>
                <div class="invalid-feedback">Mã khách hàng không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname" style="width: 340px;">Tên Khách Hàng:</label>
                <input type="text" class="form-customer-input" id="name_customer" name="name_customer"
                       placeholder="Tên Khách Hàng" required>
                <div class="invalid-feedback">Tên khách hàng không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname" style="width: 340px;">Mã Số Thuế:</label>
                <input type="text" class="form-customer-input" id="mst" name="mst"
                       placeholder="Mã Số Thuế" required>
                <div class="invalid-feedback">Mã Khách hàng không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname" style="width: 340px;">Tên Liên Hệ: </label>
                <input type="text" class="form-customer-input" id="contact_name" name="contact_name"
                       placeholder="Tên Liên Hệ" required>
                <div class="invalid-feedback">Tên liên hệ không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname" style="width: 340px">Số Điện Thoại:</label>
                <input class="form-customer-input" type="number" id="phone_customer" name="phone_customer" size="20" maxlength="10" placeholder="Số Điện Thoại" required>
                <div class="invalid-feedback">Số điện thoại không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname" style="width: 100px">Email:</label>
                <input class="form-customer-input" type="email" id="email" name="email_customer" size="20" placeholder="example@mail.com" required>
                <div class="invalid-feedback">Email không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlSelect1" style="width: 340px;">Loại Khách Hàng</label>
                <select class="form-customer-input" id="type_customer" name="type_customer">
                    @foreach($type_customers as $type_customer)
                        <option value="{{$type_customer->id}}">{{$type_customer->name_type}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlSelect1" style="width: 340px;">Khả năng thanh toán</label>
                <select class="form-control" id="kind_name" name="solvency">
                    @foreach($solvencys as $solvency)
                        <option value="{{$solvency->id}}">{{$solvency->name_solvency}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlSelect1" style="width: 340px;">Trạng Thái</label>
                <select class="form-control" id="status" name="status_customer">
                    @foreach($statuss as $status)
                        <option value="{{$status->id_status}}">{{$status->status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname" style="width: 250px;">Khối Lượng:</label>
                <input class="form-customer-input" type="text" id="mass" name="mass" size="20" placeholder="Khối lượng">
            </div>
            <div class="form-group">
                <button type="submit" class="au-btn au-btn-icon au-btn--blue float-right m-b-25">
                    <i class="zmdi zmdi-plus"></i>Thêm
                </button>
            </div>
        </form>
    </div>
@endsection

