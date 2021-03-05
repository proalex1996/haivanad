
@extends('pages.top-page.master')
@section('title','Sửa thông tin hợp đồng')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap" style="width: 400px;">
                <a href="{{url('/')}}">Trang Chủ>></a><a href="{{url('/contract')}}">Hợp đồng>></a>Sửa thông tin khách hàng
            </div>
        </div>
        <form action="{{\Illuminate\Support\Facades\URL::to('/contract/update/' . $contract->id)}}" enctype="multipart/form-data" class="needs-validation" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1 uname">Mã Hợp Đồng</label>
                <input type="text" class="form-control" value="{{$contract->id_contract}}" id="id_contract"
                       name="id_contract"
                       placeholder="Tên Hợp đồng" required>
                <div class="invalid-feedback">Tên Hợp đồng không được để trống</div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Tên khách hàng</label>
                <select class="form-control" id="name_customer" name="id_customer">
                    @foreach($customers as $customer)
                        @if($customer->customer_id == $contract->id_customer)
                        <option value="{{$customer->customer_id}}" selected>{{$customer->name_customer}}</option>
                        @else
                            <option value="{{$customer->customer_id}}">{{$customer->name_customer}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Mã Pano</label>
                <select class="form-control" id="name_banner" name="id_banner">
                  @foreach($banners as $banner)
                      @if ($banner->id == $contract->id_banner)
                            <option value="{{$banner->id}}" selected>{{$banner->id_banner}}</option>
                        @else
                            <option value="{{$banner->id}}">{{$banner->id_banner}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Nội dung hợp đồng</label>
                <div class="custom-file">
                    <label class="custom-file-label" for="validatedCustomFile">{{$contract->content}}</label>
                    <input type="file" class="custom-file-input"
                           accept=".doc,.docx,.pdf" id="content_contract"
                           name="content" {{is_null($contract->content) ? "required" : ""}}>
                    <input type="hidden" name="content_hide" value="{{$contract->content}}">
                    <div class="invalid-feedback">Định dạng file phải là .doc, .docx, .pdf</div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Nhân Viên Phụ Trách</label>
                <select class="form-control " id="exampleFormControlSelect2" name="id_staff" required>
                    @foreach($staffs as $staff)
                        @if ($staff->id == $contract ->id_staff)
                            <option value="{{$staff->id}}" selected>{{$staff->name_staff}}</option>
                        @else
                            <option value="{{$staff->id}}">{{$staff->name_staff}}</option>
                        @endif

                    @endforeach
                </select>
            </div>
            <div class="row form-group">
                <div class='col-sm-6'>
                    <label for="dateofbirth">Ngày bắt đầu</label>
                    <input value="{{$contract->date_start}}" type="date" name="date_start" id="dateofbirth" required>
                </div>
                <div class='col-sm-6'>
                    <label for="dateofbirth">Ngày kết thúc</label>
                    <input type="date" value="{{$contract->date_end}}" name="date_end" id="dateofbirth" required>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Loại hợp đồng</label>
                <select class="form-control" value="{{$contract->kind_name}}" id="kind_name" name="kind">
                    @foreach($kind_contract as $kind)
                        @if($kind->id_contract == $contract ->kind)
                        <option value="{{$kind->id_contract}}" selected>{{$kind->name_kind}}</option>
                        @else
                            <option value="{{$kind->id_contract}}">{{$kind->name_kind}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Giá trị hợp đồng</label>
                <div class="d-inline-flex">
                    <input type="number" value="{{$contract->value_contract}}" class="form-control"
                           id="exampleFormControlInput1" name="value_contract"
                           placeholder="Giá trị hợp đồng" required>
                    <label for="exampleFormControlInput1">VND</label>
                    <div class="invalid-feedback m-l-20">Vui lòng nhập giá trị hợp đồng</div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Loại hợp đồng</label>
                <select class="form-control" id="status" name="status_contract">
                    @foreach($status as $stt)
                        @if ($stt -> id_contract == $contract->status_contract)
                            <option value="{{$stt->id_contract}}" selected>{{$stt->name_status}}</option>
                        @else
                            <option value="{{$stt->id_contract}}">{{$stt->name_status}}</option>
                        @endif

                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button data-toggle="modal" data-target="#update" class="au-btn au-btn-icon au-btn--blue float-right m-b-25">
                    Sửa
                </button>
            </div>
        </form>
    </div>
@endsection
<div class="modal fade" id="update">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content container-fluid">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thông Báo</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Sửa thông tin hợp đồng thành công!!
            </div>
        </div>
    </div>
</div>
