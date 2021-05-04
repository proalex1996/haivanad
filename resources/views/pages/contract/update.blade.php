@extends('pages.top-page.master')
@section('title','Sửa thông tin hợp đồng')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap">
                <h2 class="title-1">Chi Tiết Hợp đồng</h2>
            </div>
        </div>
        <form action="{{url('contract/update/'.$contract->id)}}" enctype="multipart/form-data" class="needs-validation" method="post">
            @csrf
            <div class="container-fluid">
                <div class="form-staff">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-xl-6 col-sm-12">
                                    <label for="exampleFormControlInput1 uname">Mã Hợp đồng</label>
                                </div>
                                <div class="col-xl-6 col-sm-12">
                                    <input type="text" class="form-control" value="{{$contract->id_contract}}" id="id_contract" name="id_contract"
                                           placeholder="Tên Hợp đồng" required {{$contract->readonly}}>
                                    <div class="invalid-feedback">Tên Hợp đồng không được để trống</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-xl-7 col-sm-12">
                                    <label for="exampleFormControlSelect2">Nhân Viên Phụ Trách</label>
                                </div>
                                <div class="col-xl-5 col-sm-12">
                                    <select class="form-control " id="exampleFormControlSelect2" name="id_staff" required required {{$contract->readonly}}>
                                        @foreach($staffs as $staff)
                                            @if ($staff->id_staff == $contract ->id_staff)
                                                <option value="{{$staff->id_staff}}" selected readonly>{{$staff->name}}</option>
                                            @else
                                                <option value="{{$staff->id_staff}}">{{$staff->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-xl-6 col-sm-12">
                                    <label for="exampleFormControlSelect1">Loại hợp đồng</label>
                                </div>
                                <div class="col-xl-6 col-sm-12">
                                    <select class="form-control" id="kind_name" name="kind" required {{$contract->readonly}}>
                                        @foreach($kind_contract as $kind)
                                            @if($kind->id_contract == $contract ->kind)
                                            <option value="{{$kind->id_contract}}" selected>{{$kind->name_kind}}</option>
                                            @else
                                                <option value="{{$kind->id_contract}}">{{$kind->name_kind}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <fieldset class="border-text">
                    <legend class='text-left'>Khách Hàng</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Tên khách hàng</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control chosen-select" id="id_customer" name="name_customer"
                                                onchange="getCustomer()" required {{$contract->readonly}}>
                                            @foreach($customers as $customer)
                                                @if($customer->customer_id == $contract->id_customer)
                                                <option value="{{$customer->customer_id}}" selected>{{$customer->name_customer}}</option>
                                                @else
                                                    <option value="{{$customer->customer_id}}">{{$customer->name_customer}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Nguồn Khách Hàng</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="id_nguoncustomer" name="id_nguoncustomer" required {{$contract->readonly}}>

                                        </select>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <label for="exampleFormControlInput1 uname">Địa Chỉ</label>
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <input type="text" class="form-control" id="adress_customer" name="adress_customer"
                                       placeholder="Địa Chỉ" value="" required required {{$contract->readonly}}>
                                <div class="invalid-feedback">Địa chỉ không được để trống</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">MST</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-control" value="" id="mst" name="mst"
                                               placeholder="Mã Số Thuế" required required {{$contract->readonly}}>
                                        <div class="invalid-feedback">MST không được để trống</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname" style="width: 284px;">Số Điện
                                            Thoại</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-control" id="phone_customer"
                                               name="phone_customer"
                                               placeholder="Số Điện Thoại"
                                               maxlength="10" value="" required required {{$contract->readonly}}>
                                        <div class="invalid-feedback">Số điện thoại không được để trống</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname" style="width: 100px;">Đại
                                            Diện</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-control" value="" id="contact_name"
                                               name="contact_name"
                                               placeholder="Tên Người Đại Diện" required required {{$contract->readonly}}>
                                        <div class="invalid-feedback">Đại Diện không được để trống</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1" style="width: 116px;">Chức Vụ</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="position_customer" name="position_customer" required {{$contract->readonly}}>
                                            <option value="">--Chức Vụ--</option>
                                        </select>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </fieldset>
                <div id="show_product">

                </div>
                <fieldset class="border-text">
                    <legend class='text-left'>Hợp Đồng</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="dateofbirth">Ngày bắt đầu:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-control" value="{{$contract->date_start}}" type="date" name="date_start" id="dateofbirth"
                                               required {{$contract->readonly}}>
                                        <div class="invalid-feedback m-l-20">Vui lòng nhập ngày bắt đầu hợp đồng</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="dateofbirth">Ngày kết thúc</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-control" value="{{$contract->date_end}}" type="date" name="date_end" id="dateofbirth"
                                               required {{$contract->readonly}} >
                                        <div class="invalid-feedback m-l-20">Vui lòng nhập ngày kết thúc hợp đồng</div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1">Giá trị hợp đồng</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-control" id="value_contract"
                                               name="value_contract"
                                               placeholder="Giá trị hợp đồng" data-type="currency" onchange="getTong()" value="{{$contract->value_contract}}" required {{$contract->readonly}}>
                                        <div class="invalid-feedback m-l-20">Vui lòng nhập giá trị hợp đồng</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1">Tỉ Giá VND/1USD</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-control" data-type="currency" value="{{$contract->exchange}}" onchange="getTong()" id="exchange"
                                               name="exchange"
                                               placeholder="VND">
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1">Thuế VAT</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="number" class="form-control" onchange="getTong()" id="thue"
                                               name="thue"
                                               placeholder="Thuế (%)" value="10" readonly >
                                    </div>

                                </div>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Tổng</label>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <input type="number" class="form-control" value="" step="0.01" id="tong" name="tong"
                                               placeholder="Tổng Giá Trị hợp Đồng" readonly>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </fieldset>

                <form>
                    <fieldset class="border-text">
                        <legend class='text-left'>Thanh Toán</legend>
                        <div class="container-set">
                            <table id="example" class="display table-borderless table-responsive" style="width:100%">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" id="check-all" name="title" onclick="checkAll()"></th>
                                    <th class="text-center">Kỳ</th>
                                    <th class="text-center">Tỷ Lệ</th>
                                    <th class="text-center">Số Tiền</th>
                                    <th class="text-center">VAT</th>
                                    <th class="text-center">Tổng</th>
                                    <th class="text-center">Ngày Thanh Toán</th>
                                </tr>
                                </thead>
                                <tbody id="idBodyPayment">
                                    <tr class="idTrPayment">
                                    <td><input type="checkbox" id="check-box" name="check_box[]" value="1"
                                               class="display-input m-r-5" {{$contract->readonly}}></td>
                                    <td><input type="text" class="display-input form-control" data-target="{{$contract->id_contract}}"  value="" id="payment_period" name="payment_period[]" required {{$contract->readonly}}>
                                    </td>
                                    <td><input type="text" class="form-control display-input" placeholder="Tỉ Lệ(%)" id="ratio" onchange="setRatio(this)" name="ratio[]" required {{$contract->readonly}}></td>
                                    <td><input type="text" class="form-control display-input" id="id_value_contract"
                                               name="id_value_contract[]" readonly></td>
                                    <td><input type="text" class="form-control display-input" value="10" placeholder="Thuế (%)" id="id_vat"  name="id_vat[]" readonly></td>
                                    <td><input type="text" class="form-control display-input" id="total" name="total_value[]" readonly></td>
                                    <td><input type="date" class="form-control display-input" id="_pay_due" name="_pay_due[]" required {{$contract->readonly}}> </td>

                                </tr>
                                </tbody>

                            </table>
                            <div class="form-group">
                                <button type="button"  onclick="deleteRowPayment()" id="addPayment"
                                        class="au-btn au-btn-icon au-btn--blue float-right m-b-20" style="color: #ffff;" {{$contract->readonly}}>
                                    <i class="zmdi zmdi-plus" {{$contract->readonly}}></i>Xóa Kỳ Thanh Toán
                                </button>
                                <button type="button" id="addrowPayment"
                                        class="au-btn au-btn-icon au-btn--blue float-right m-b-20 m-r-20"
                                        style="color: #ffff;" {{$contract->readonly}}>
                                    <i class="zmdi zmdi-plus"></i>Thêm Kỳ Thanh Toán
                                </button>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <div class="form-group m-t-20">
                    <label for="exampleFormControlSelect1">Hợp đồng đã ký</label>
                    <div class="custom-file">
                        <label class="custom-file-label" for="validatedCustomFile">{{$contract->contented}}</label>
                        <input type="file" class="custom-file-input" accept=".doc,.docx,.pdf" id="contented"
                               name="contented" {{$contract->readonly}}>
                        <div class="invalid-feedback">Định dạng file phải là .doc, .docx, .pdf</div>
                    </div>
                </div>
                <div class="form-group m-t-20">
                    <label for="exampleFormControlSelect1">Nội dung hợp đồng</label>
                    <div class="custom-file">
                        <label class="custom-file-label" for="validatedCustomFile">{{$contract->content}}</label>
                        <input type="file" class="custom-file-input" accept=".doc,.docx,.pdf" id="content_contract"
                               name="content_contract" {{$contract->readonly}}>
                        <div class="invalid-feedback">Định dạng file phải là .doc, .docx, .pdf</div>
                    </div>
                </div>
                <div class="form-group m-t-20">
                    <label for="exampleFormControlSelect1">Ghi Chú</label>
                    <div class="custom-file">
                        <input class="form-control" value="{{$contract->note_contract}}" type="text" name="note_contract"
                            {{$contract->readonly}}bn>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">

                            <div class="col-md-3">
                                <a type="button" class="au-btn au-btn-icon au-btn--blue m-b-25" href="{{url('/contract')}}">
                                    <i class="fas fa-undo"></i>Quay Lại</a>
                            </div>
                        <div class="col-md-2">
                            <a id="open-deleteContract" class="dropdown-item au-btn au-btn-icon au-btn--blue"
                               data-id_data="{{$contract->id}}" style="color: #ffffff" data-toggle="modal"
                               data-target="#detroy" onclick="openDestroyDialog(this, 'destroy-value')"><i class="far fa-trash-alt"></i>Xóa</a>

                        </div>
                        <div class="col-md-2">
                            <a id="close-deleteContract" class="dropdown-item au-btn au-btn-icon au-btn--red"
                              ><i class="fas fa-eye-dropper"></i>Đóng</a>

                        </div>

                            <div class="col-md-3">
                                <a type="button" id="open-dueContract" class="au-btn au-btn-icon au-btn--blue"
                                   data-contract_id="{{$contract->id}}" style="color: #ffffff" data-toggle="modal"
                                   data-target="#due" onclick="setDue()"><i class="fas fa-pen"></i>Gia Hạn</a>
                            </div>
                        <div class="col-md-2">
                            <button type="submit" class="au-btn au-btn-icon au-btn--blue m-b-25">
                                <i class="far fa-edit"></i>Lưu
                            </button>
                        </div>
                    </div>
                    @if(auth()->user()->id_phan_quyen == 1)
                    <div class="row">
                        <div class="col-md-12">
                            <a id="openmode-deleteContract" class="dropdown-item au-btn au-btn-icon au-btn--red"
                            ><i class="fas fa-eye-dropper"></i>Mở Hợp đồng</a>

                        </div>
                    </div>
                    @endif



                    </div>
                </div>
        </form>
    </div>
@endsection
<div class="modal fade" id="due">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content container-fluid">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Gia hạn hợp đồng</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->
            <form id="due-contract"  data-due-link="{{\Illuminate\Support\Facades\URL::to('contract/update/').$contract->id}}"
                  enctype="multipart/form-data" class="needs-validation" method="POST">
                @csrf
                <div class="row form-group">
                    <input type="hidden" name="id_contract" value="{{$contract->id_contract}}" id="modal_id_contract" >
                    <div class='col-sm-6'>
                        <label for="dateofbirth">Ngày bắt đầu</label>
                        <input type="date" name="date_start" id="modal_date_start" required>
                        <div class="invalid-feedback m-l-20">Vui lòng nhập ngày bắt đầu hợp đồng</div>
                    </div>
                    <div class='col-sm-6'>
                        <label for="dateofbirth">Ngày kết thúc</label>
                        <input type="date" name="date_end" id="modal_date_end" required>
                        <div class="invalid-feedback m-l-20">Vui lòng nhập ngày kết thúc hợp đồng</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Giá trị hợp đồng</label>
                    <div class="d-inline-flex">
                        <input type="number" class="form-control"
                               name="value_contract" id="modal_value_contract"
                               placeholder="Giá trị hợp đồng" required>
                        <label for="exampleFormControlInput1">VND</label>
                        <div class="invalid-feedback m-l-20">Vui lòng nhập giá trị hợp đồng</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Trạng Thái</label>
                    <select class="form-control" id="modal_status_contract" name="status_contract">
                        {{$status = \Illuminate\Support\Facades\DB::table('contract_status')->select('*')->get()}}
                        @foreach($status as $stt)
                            <option value="{{$stt->id_contract}}">{{$stt->name_status}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit"
                            class="btn btn-primary">Xác Nhận
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
<div class="modal fade" id="detroy">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thông Báo</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            @if(auth()->user()->id_phan_quyen == 1)
            <div class="modal-body">
                Xác nhận xóa
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <a type="button" id="destroy-value"
                   data-destroy-link="{{\Illuminate\Support\Facades\URL::to('contract/destroy')."/"}}"
                   class="btn btn-primary">Xác Nhận
                </a>
            </div>
            @else
                <div class="modal-body">
                    Bạn không được cấp quyền xóa
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            @endif

        </div>
    </div>
</div>
