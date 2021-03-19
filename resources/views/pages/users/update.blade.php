@extends('pages.top-page.master')
@section('title','Sửa Thông Tin')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap">
                <h2 class="title-1">Sửa Thông Tin Pano</h2>
            </div>
        </div>
        <form action="{{\Illuminate\Support\Facades\URL::to('/users/update/' . $staffs->id)}}"
              enctype="multipart/form-data" class="needs-validation" method="post">
            @csrf
            <div class="form-staff">
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Tên nhân viên </label>
                <input type="text" class="form-customer-input" value="{{$staffs ->name}}" id="staff_name" name="staff_name"
                       placeholder="Mã Pano" size="20" required>
                <div class="invalid-feedback">Tên nhân viên không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Địa Chỉ: </label>
                <input type="text" class="form-customer-input" value="{{$staffs->staff_adress}}" id="staff_adress" name="staff_adress"
                       placeholder="Địa chỉ" required>
                <div class="invalid-feedback">Địa chỉ không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Chứng Minh Nhân Dân:</label>
                <input class="form-customer-input" type="number" id="size_banner" value="{{$staffs->id_CMND}}" name="id_CMND" placeholder="Chứng Minh Nhân Dân" required>
                <div class="invalid-feedback">Chứng Minh Nhân Dân không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Email: </label>
                <input class="form-customer-input" type="text" id="email" value="{{$staffs->email}}" name="email" placeholder="email" required>
                <div class="invalid-feedback">Email không được để trống</div>
            </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Mật Khẩu: </label>
                    <input class="form-customer-input" type="text" id="email" value="{{$staffs->non_password}}" name="password" placeholder="Mật Khẩu" required>
                    <div class="invalid-feedback">Email không được để trống</div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-6 ">
                        <label for="dateofbirth" style="width: 140px;">Ngày Sinh:</label>
                        <input class="date_picker" value="{{$staffs->born}}" type="date" name="born" id="dateofbirth" required>
                        <div class="invalid-feedback m-l-20">Vui lòng nhập ngày sinh</div>
                    </div>
                </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname" >Số Điện Thoại: </label>
                <input type="text" class="form-customer-input" id="staff_phone" value="{{$staffs->staff_phone}}" name="staff_phone"
                       maxlength="10" placeholder="Địa chỉ" required>
                <div class="invalid-feedback">Số Điện Thoại không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlSelect1">Luong Cơ bản</label>
                <select class="form-control" id="status_banner" name="status">
                    @foreach($salarys as $salary)
                        @if ($salary->id_salary == $staffs->id_salary)
                            <option value="{{$salary->id_salary}}" selected>{{$salary->bassic_salary}}</option>
                        @else
                            <option value="{{$salary->id_status}}">{{$salary->bassic_salary}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="au-btn au-btn-icon au-btn--blue float-right m-b-25">
                    <i class="zmdi zmdi-plus"></i>Sửa
                </button>
            </div>
                </div></form>
    </div>
@endsection



