@extends('pages.top-page.master')
@section('title','Sửa Thông Tin')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap">
                <h2 class="title-1">Sửa Thông Tin Nhân Viên</h2>
            </div>
        </div>
        <form action="{{\Illuminate\Support\Facades\URL::to('/users/update/' . $staffs->id)}}"
              enctype="multipart/form-data" class="needs-validation" method="post">
            @csrf
            <div class="container">
                <div class="container-fluid">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Tên Nhân Viên:</label></div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-customer-input" value="{{$staffs ->name}}"
                                               id="name" name="name"
                                               required>
                                        <div class="invalid-feedback">Tên nhân viên không được để trống</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Số Điện Thoại: </label></div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-customer-input" id="staff_phone"
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
                                        <label for="exampleFormControlInput1 uname">Địa Chỉ: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-customer-input" value="{{$staffs->staff_adress}}"
                                               id="staff_adress" name="staff_adress"
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
                                                @if ($branch->id_branch == $staffs->id_branch)
                                                    <option value="{{$branch->id_branch}}"
                                                            selected>{{$branch->name_branch}}</option>

                                                @endif
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
                                                @if ($position->id_position = $staffs->id_position)
                                                    <option value="{{$position->id_position}}"
                                                            selected>{{$position->name_position}}</option>

                                                @endif
                                                <option
                                                    value="{{$position->id_position}}">{{$position->name_position}}</option>
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
                                        <label for="exampleFormControlSelect1">Lương Cơ Bản</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="status_banner" name="status">
                                            @foreach($salarys as $salary)
                                                @if ($salary->id_salary == $staffs->id_salary)
                                                    <option value="{{$salary->id_salary}}"
                                                            selected>{{$salary->bassic_salary}}</option>
                                                @else
                                                    <option
                                                        value="{{$salary->id_salary}}">{{$salary->bassic_salary}}</option>
                                                @endif
                                            @endforeach
                                        </select>
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
                                        <select class="form-control form_select" id="staff_status"
                                                name="staff_status">
                                            @foreach($statuss as $status)
                                                @if ($status->id_status == $staffs->id_status)
                                                    <option
                                                        value="{{$status->id_status}}"
                                                        selected>{{$status->status}}</option>
                                                @endif
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
                                        <label for="exampleFormControlSelect1">Phân Quyền</label></div>
                                    <div class="col-md-4 col-sm-12">
                                        <select class="form-control form_select" id="id_pq" name="id_pq">
                                            @foreach($pqs as $ps)
                                                @if ($ps->id_pq == $staffs->id_phan_quyen)
                                                    <option value="{{$ps->id_pq}}" selected>{{$ps->name_pq}}</option>
                                                @endif
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



