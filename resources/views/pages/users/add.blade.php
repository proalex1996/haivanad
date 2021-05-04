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
            <div class="container">
                <div class="container-fluid">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Mã Nhân Viên: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" value="{{$codes}}" class="form-customer-input" id="id_staffs"
                                               name="id_staff" readonly>
                                        <div class="invalid-feedback">Địa chỉ không được để trống</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Tên Nhân Viên:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-customer-input"
                                               name="name_staff"
                                               placeholder="Tên nhân viên" required>
                                        <div class="invalid-feedback">Tên nhân viên không được để trống</div>
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
                                        <label for="exampleFormControlInput1 uname">CMND: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-customer-input" id="id_cmnd"
                                               name="id_cmnd"
                                               placeholder="Chứng minh nhân dân" required>
                                        <div class="invalid-feedback">Số điện thoại không được để trống</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Email: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                            <input type="text" class="form-customer-input" id="staff_email"
                                                   name="staff_email"
                                                   placeholder="example@gmail.com" required>
                                        @if(\Session('warn'))
                                            <div class="color-session" style="float: right">
                                                {{Session('warn')}}
                                            </div>
                                        @endif
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
                                        <label for="exampleFormControlInput1 uname">Mật Khẩu: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-customer-input" id="password"
                                               name="password"
                                               placeholder="Mật Khẩu" required>
                                        <div class="invalid-feedback">Email không được để trống</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Số Điện Thoại: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-customer-input" id="staff_phone"
                                               name="staff_phone"
                                               placeholder="Số điện thoại" required>
                                        <div class="invalid-feedback">Số điện thoại không được để trống</div>
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
                                        <input type="text" class="form-customer-input" id="staff_adress"
                                               name="staff_adress"
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
                                        <label for="exampleFormControlSelect1">Chi Nhánh</label>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <select class="form-control form_select" id="staff_branch"
                                                name="staff_branch">
                                            @foreach($branchs as $branch)
                                                <option value="{{$branch->id_branch}}">{{$branch->name_branch}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Chức Vụ</label>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <select class="form-control form_select" id="id_position"
                                                name="id_position">
                                            @foreach($positions as $position)
                                                <option value="{{$position->id_position}}">{{$position->name_position}}</option>
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
                                        <label for="exampleFormControlSelect1">Lương</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="text" name="bassic_salary"
                                               id="bassic_salary" placeholder="Lương" required>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="dateofbirth" >Ngày Sinh:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="date_picker" type="date" name="date_start"
                                               id="dateofbirth" required>
                                        <div class="invalid-feedback m-l-20">Vui lòng nhập ngày sinh</div>                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Trạng Thái</label>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <select class="form-control form_select" id="staff_status"
                                                name="staff_status">
                                            @foreach($statuss as $status)
                                                <option
                                                    value="{{$status->id_status}}">{{$status->status}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Phân Quyền</label>                               </div>
                                    <div class="col-md-4 col-sm-12">
                                        <select class="form-control form_select" id="id_pq" name="id_pq">
                                            @foreach($phan_quyen as $ps)
                                                <option value="{{$ps->id_pq}}">{{$ps->name_pq}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="au-btn au-btn-icon au-btn--blue float-right m-b-25">
                            <i class="zmdi zmdi-plus"></i>Thêm
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection


