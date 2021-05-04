@extends('pages.top-page.master')
@section('title','Sửa Thông Tin')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap">
                <h2 class="title-1">Sửa Thông Tin Nhân Viên</h2>
            </div>
        </div>
        <form action="{{\Illuminate\Support\Facades\URL::to('/users/update/'. $staffs->id)}}"
              enctype="multipart/form-data" class="needs-validation" method="post">
            @csrf
            <div class="container">
                <div class="container-fluid">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Tên Nhân Viên:</label></div>
                                    <div class="col-md-9 col-sm-12">
                                        <input type="text" class="form-customer-input" value="{{$staffs ->name}}"
                                               id="name" name="name"
                                               required>
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
                                        <label for="exampleFormControlInput1 uname">CMND: </label></div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="number" id="size_banner"
                                               value="{{$staffs->id_CMND}}" name="id_CMND"
                                               placeholder="Chứng Minh Nhân Dân" required>
                                        <div class="invalid-feedback">Chứng Minh Nhân Dân không được để trống</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Email: </label></div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="text" id="email"
                                               value="{{$staffs->email}}" name="email" placeholder="email" required>
                                        <div class="invalid-feedback">Email không được để trống</div>
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
                                        <label for="exampleFormControlInput1 uname">Mật Khẩu: </label></div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="text" id="email"
                                               value="{{$staffs->non_password}}" name="password" placeholder="Mật Khẩu"
                                               required>
                                        <div class="invalid-feedback">Email không được để trống</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Số Điện Thoại: </label></div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-customer-input"
                                               value="{{$staffs->staff_phone}}" name="staff_phone"
                                               maxlength="10" placeholder="Địa chỉ" required>
                                        <div class="invalid-feedback">Số Điện Thoại không được để trống</div>
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
                                        <input type="text" class="form-customer-input" value="{{$staffs->staff_adress}}"
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
                                        <select class="form-control form_select"
                                                name="id_branch">
                                            @foreach($branchs as $branch)
                                                @if ($branch->id_branch == $staffs->id_branch)
                                                    <option value="{{$branch->id_branch}}"
                                                            selected>{{$branch->name_branch}}</option>
                                                @else
                                                <option value="{{$branch->id_branch}}">{{$branch->name_branch}}</option>
                                                    @endif
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
                                        <select class="form-control form_select" name="id_position">
                                            @foreach($positions as $position)
                                                @if ($position->id_position == $staffs->id_position)
                                                    <option value="{{$position->id_position}}" selected>{{$position->name_position}}</option>

                                                @else
                                                <option
                                                    value="{{$position->id_position}}">{{$position->name_position}}</option>
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
                                        <label for="exampleFormControlSelect1">Lương</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="text" value="{{$staffs->id_salary}}" name="bassic_salary"
                                               id="bassic_salary" required>
                                        <div class="invalid-feedback m-l-20">Vui lòng nhập ngày sinh</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="dateofbirth">Ngày Sinh:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="date_picker" value="{{$staffs->born}}" type="date" name="born"
                                               id="dateofbirth" required>
                                        <div class="invalid-feedback m-l-20">Vui lòng nhập ngày sinh</div>
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
                                        <label for="exampleFormControlSelect1">Trạng Thái</label>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <select class="form-control form_select" id="staff_status" name="id_status">
                                            @foreach($statuss as $status)
                                                @if ($status->id_status == $staffs->id_status)
                                                    <option
                                                        value="{{$status->id_status}}" selected>{{$status->status}}</option>
                                                @else
                                                <option
                                                    value="{{$status->id_status}}">{{$status->status}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Phân Quyền</label></div>
                                    <div class="col-md-4 col-sm-12">
                                        <select class="form-control form_select" id="id_pq" name="id_phan_quyen">
                                            @foreach($pqs as $ps)
                                                @if ($ps->id_pq == $staffs->id_phan_quyen)
                                                    <option value="{{$ps->id_pq}}" selected>{{$ps->name_pq}}</option>
                                                @else
                                                <option value="{{$ps->id_pq}}">{{$ps->name_pq}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="au-btn au-btn-icon au-btn--blue float-right m-b-25">
                            <i class="zmdi zmdi-plus"></i>Lưu
                        </button>
                        <a id="open-deleteStaff"
                           data-id_data="{{$staffs->id}}" data-toggle="modal"
                           data-target="#detroy" onclick="openDestroyDialog(this, 'destroy-value')" class="au-btn au-btn-icon au-btn--red float-left">Xóa
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
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                Xác nhận xóa
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <a type="button" id="destroy-value"
                   data-destroy-link="{{\Illuminate\Support\Facades\URL::to('users/destroy')."/"}}"
                   class="btn btn-primary">Xác Nhận
                </a>
            </div>
        </div>
    </div>
</div>



