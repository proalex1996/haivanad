@extends('pages.top-page.master')
@section('title','Thêm Nhân Viên')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap">
                <h2 class="title-1">Thêm Mới Nhân Viên</h2>
                <a type="button" class="au-btn au-btn-icon au-btn--blue" href="import-staff">
                    <i class="zmdi zmdi-plus"></i>Nhập file Excel
                </a>
            </div>
        </div>
        <form action="add" enctype="multipart/form-data" class="needs-validation" method="post">
            @csrf
            <div class="form-staff">
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Tên Nhân Viên:</label>
                    <input type="text" class="form-customer-input" id="id_staff" name="name_staff"
                           placeholder="Tên nhân viên" required>
                    <div class="invalid-feedback">Tên nhân viên không được để trống</div>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Số Điện Thoại: </label>
                    <input type="text" class="form-customer-input" id="staff_phone" name="staff_phone"
                           placeholder="Số điện thoại" required>
                    <div class="invalid-feedback">Số điện thoại không được để trống</div>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">CMND: </label>
                    <input type="text" class="form-customer-input" id="id_cmnd" name="id_cmnd"
                           placeholder="Chứng minh nhân dân" required>
                    <div class="invalid-feedback">Số điện thoại không được để trống</div>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Email: </label>
                    <input type="text" class="form-customer-input" id="staff_email" name="staff_email"
                           placeholder="example@gmail.com" required>
                    <div class="invalid-feedback">Email không được để trống</div>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Mật Khẩu: </label>
                    <input type="text" class="form-customer-input" id="password" name="password"
                           placeholder="Mật Khẩu" required>
                    <div class="invalid-feedback">Email không được để trống</div>
                </div>

                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Địa Chỉ: </label>
                    <input type="text" class="form-customer-input" id="staff_adress" name="staff_adress"
                           placeholder="Địa chỉ" required>
                    <div class="invalid-feedback">Địa chỉ không được để trống</div>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlSelect1">Chi Nhánh</label>
                    <select class="form-control form_select" id="staff_branch" name="staff_branch">
                        @foreach($branchs as $branch)
                            <option value="{{$branch->id_branch}}">{{$branch->name_branch}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlSelect1">Chức Vụ</label>
                    <select class="form-control form_select" id="id_position" name="id_position">
                        @foreach($branchs as $branch)
                            <option value="{{$branch->id_branch}}">{{$branch->name_branch}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlSelect1">Lương Cơ Bản</label>
                    <select class="form-control form_select" id="bassic_salary" name="bassic_salary">
                        @foreach($salarys as $salary)
                            <option value="{{$salary->id_salary}}">{{$salary->bassic_salary}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row form-group">
                    <div class="col-sm-6 ">
                        <label for="dateofbirth" style="width: 140px;">Ngày Sinh:</label>
                        <input class="date_picker" type="date" name="date_start" id="dateofbirth" required>
                        <div class="invalid-feedback m-l-20">Vui lòng nhập ngày sinh</div>
                    </div>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlSelect1">Trạng Thái</label>
                    <select class="form-control form_select" id="staff_status" name="staff_status">
                        @foreach($statuss as $status)
                            <option value="{{$status->id_status}}">{{$status->status}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlSelect1">Phân Quyền</label>
                    <select class="form-control form_select" id="id_pq" name="id_pq">
                        @foreach($phan_quyen as $ps)
                            <option value="{{$ps->id_pq}}">{{$ps->name_pq}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="au-btn au-btn-icon au-btn--blue float-right m-b-25">
                    <i class="zmdi zmdi-plus"></i>Thêm
                </button>
            </div>
        </form>
    </div>
@endsection


