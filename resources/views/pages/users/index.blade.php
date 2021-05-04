@extends('pages.top-page.master')
@section('title','Quản Trị')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <h2 class="title-1">Quản Trị</h2>
                    <div class="exp-excel">
                        <a class="au-btn au-btn-icon au-btn--blue" href="{{url('users/export')}}">
                            <i class="zmdi zmdi-plus"></i>Xuất file Excel
                        </a>
                    </div>
                    <div class="add-contract">
                        <a class="au-btn au-btn-icon au-btn--blue" href="users/add">
                            <i class="zmdi zmdi-plus"></i>Thêm mới nhân viên
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <div class="container-fluid">
            <div class="row m-t-30">
                <form class="post-form-sort" action="{{url('/users')}}" method="post" style="margin-bottom: 3em">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Mã Nhân Viên</label>
                            <input type="text" class="form-control" id="id_staff" name="id_staff"
                                   placeholder="Mã Nhân Viên">
                        </div>
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Trạng thái</label>
                            <select type="text" class="form-control" id="id_status" name="id_status">
                                <option value="">Tất Cả</option>
                                @foreach($statuss as $status)
                                    <option value="{{$status->id_status}}">{{$status->status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Số Điện Thoại</label>
                            <input type="text" class="form-control" id="staff_phone" name="staff_phone"
                                   placeholder="Số Điện Thoại">
                        </div>
                        <div class="col-md-2 col-sm-12 m-t-10 align-self-end">

                            <button class="btn btn-primary btn-block" style="margin-bottom: 16px;" type="submit" aria-expanded="false">Tìm</button>
                        </div>

                    </div>
                </form>
                <div class="table-container fixed_header ">
                    <table class="table table-borderless table-data3 table-test-responsive">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã Nhân Viên</th>
                            <th>Họ Và Tên</th>
                            <th>Năm Sinh</th>
                            <th>Địa Chỉ</th>
                            <th>Số Điện Thoại</th>
                            <th>CMND</th>
                            <th>Email</th>
                            <th>Chi Nhánh</th>
                            <th>Chức Vụ</th>
                            <th>Lương</th>
                            <th>Trạng thái</th>
                            <th>Phân Quyền</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr id ="row_staff_{{$user->id}}">
                                <td data-target="{{$user->id}}"> {{$user->id}}

                                </td>
                                <td>{{$user->id_staff}}</td>
                                <td>{{$user->name}}</td>

                                <td>{{$user->born}}</td>
                                <td>{{$user->staff_adress}}</td>
                                <td>{{$user->staff_phone}}</td>

                                <td>{{$user->id_CMND}}</td>

                                <td>{{$user->email}}</td>
                                <td>{{$user->name_branch}}</td>
                                <td>{{$user->name_position}}</td>
                                <td>{{$user->id_salary}}</td>
                                @if($user->id_status == 1)
                                    <td class="status--process">
                                        <a type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false" id="dropdownMenuLink"
                                        > {{$user->status}}</a>
                                        <div class="dropdown-menu">
                                            @foreach($statuss as $status)
                                                <a class="dropdown-item"
                                                   href="{{\Illuminate\Support\Facades\URL::to('users/status'.$status->id_status)."/".$user->id}}">{{$status->status}}</a>
                                            @endforeach
                                        </div>
                                @elseif($user->id_status == 2)
                                    <td class="status--denied">
                                        <a type="button" class="dropdown-toggle status--warn" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false" id="dropdownMenuLink"
                                        > {{$user->status}}</a>
                                        <div class="dropdown-menu">
                                            @foreach($statuss as $status)
                                                <a class="dropdown-item"
                                                   href="{{\Illuminate\Support\Facades\URL::to('users/status'.$status->id_status)."/".$user->id}}">{{$status->status}}</a>
                                            @endforeach
                                        </div>
                                @endif
                                @if($user->id_pq == 1)
                                    <td class="status--process">
                                        <a type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false" id="dropdownMenuLink"
                                        > {{$user->name_pq}}</a>
                                        <div class="dropdown-menu">
                                            @foreach($pqs as $pq)
                                                <a class="dropdown-item"
                                                   href="{{\Illuminate\Support\Facades\URL::to('users/quyen'.$pq->id_pq)."/".$user->id}}">{{$pq->name_pq}}</a>
                                            @endforeach
                                        </div>
                                @elseif($user->id_pq == 2)
                                    <td class="status--denied">
                                        <a type="button" class="dropdown-toggle status--warn" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false" id="dropdownMenuLink"
                                        > {{$user->name_pq}}</a>
                                        <div class="dropdown-menu">
                                            @foreach($pqs as $pq)
                                                <a class="dropdown-item"
                                                   href="{{\Illuminate\Support\Facades\URL::to('users/quyen'.$pq->id_pq)."/".$user->id}}">{{$pq->name_pq}}</a>
                                            @endforeach
                                        </div>
                                        @endif

                                    </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
{{--<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"--}}
{{--     aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="exampleModalLongTitle">Đặt Chỗ</h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <form id="pickup_banner" action="{{\Illuminate\Support\Facades\URL::to('product/pickup')}}"--}}
{{--                      enctype="multipart/form-data" class="needs-validation" method="POST">--}}
{{--                    @csrf--}}
{{--                    <label for="exampleFormControlSelect1">Khách Hàng</label>--}}
{{--                    <select class="form-control" id="id_customer" name="id_customer">--}}
{{--                        {{$customers = \Illuminate\Support\Facades\DB::table('customer')->select('*')->get()}}--}}
{{--                        @foreach($customers as $customer)--}}
{{--                            <option value="{{$customer->customer_id}}">{{$customer->name_customer}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                    <label for="exampleFormControlSelect1">Trạng Thái</label>--}}
{{--                    <select class="form-control" id="name_status" name="name_status">--}}
{{--                        {{$stt_banners = \Illuminate\Support\Facades\DB::table('status_banner')->select('*')->get()}}--}}
{{--                        @foreach($stt_banners as $stt_banner)--}}
{{--                            <option value="{{$stt_banner->id_status}}">{{$stt_banner->name_status}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>--}}
{{--                <button id="pickup" type="submit" class="btn btn-primary">Đặt Chỗ</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}



