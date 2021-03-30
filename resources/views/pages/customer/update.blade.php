@extends('pages.top-page.master')
@section('title','Sửa thông tin hợp đồng')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap">
                <h2 class="title-1">Quản lý Khách Hàng</h2>
            </div>
        </div>
        <form action="{{\Illuminate\Support\Facades\URL::to('/customer/update/'.$customers->id)}}"
              enctype="multipart/form-data" class="needs-validation" method="post">
            @csrf
            <div class="container">
                <div class="container-fluid">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname" style="width: 340px;">Mã Khách Hàng:</label>                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-customer-input" value="{{$customers->customer_id}}" id="customer_id"
                                               name="customer_id"
                                               placeholder="Mã Khách Hàng" size="20" required>
                                        <div class="invalid-feedback">Mã khách hàng không được để trống</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname" style="width: 340px;">Tên Khách Hàng:</label>                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-customer-input" value="{{$customers->name_customer}}" id="name_customer"
                                               name="name_customer"
                                               placeholder="Tên Khách Hàng" required>
                                        <div class="invalid-feedback">Tên khách hàng không được để trống</div>
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
                                        <label for="exampleFormControlInput1 uname" style="width: 340px;">Mã Số Thuế:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-customer-input" value="{{$customers->mst}}" id="mst_customer"
                                               name="mst_customer"
                                               placeholder="Mã Số Thuế" required>
                                        <div class="invalid-feedback">Mã Khách hàng không được để trống</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname" style="width: 340px;">Tên Liên Hệ: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-customer-input" value="{{$customers->contact_name}}" id="contact_name"
                                               name="contact_name"
                                               placeholder="Tên Liên Hệ" required>
                                        <div class="invalid-feedback">Tên liên hệ không được để trống</div>
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
                                        <label for="exampleFormControlInput1 uname" style="width: 340px">Số Điện Thoại:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="number" value="{{$customers->phone_customer}}"
                                               id="phone_customer" name="phone_customer" size="20" maxlength="10" placeholder="Số Điện Thoại"
                                               required>
                                        <div class="invalid-feedback">Số điện thoại không được để trống</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname" style="width: 100px">Email:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="email" id="email" value="{{$customers->email_customer}}"
                                               name="email_customer" size="20" placeholder="example@mail.com" required>
                                        <div class="invalid-feedback">Email không được để trống</div>
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
                                        <label for="exampleFormControlSelect1" style="width: 340px;">Loại Khách Hàng</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-customer-input" id="type_customer" name="type_customer">
                                            @foreach($type_customers as $type_customer)
                                                @if( $type_customer->id == $customers->type_customer)
                                                    <option value="{{$type_customer->id}}" selected>{{$type_customer->name_type}}</option>
                                                @else
                                                    <option value="{{$type_customer->id}}">{{$type_customer->name_type}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1" style="width: 340px;">Khả năng thanh toán</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="kind_name" name="solvency">
                                            @foreach($solvencys as $solvency)
                                                @if($customers->solvency == $solvency->id)
                                                    <option value="{{$solvency->id}}" selected>{{$solvency->name_solvency}}</option>
                                                @else
                                                    <option value="{{$solvency->id}}">{{$solvency->name_solvency}}</option>
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
                                        <label for="exampleFormControlSelect1" style="width: 340px;">Trạng Thái</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="status" name="status_customer">
                                            @foreach($statuss as $status)
                                                @if($customers->status_customer == $status->id_status)
                                                    <option value="{{$status->id_status}}" selected>{{$status->status}}</option>
                                                @else
                                                    <option value="{{$status->id_status}}">{{$status->status}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname" style="width: 250px;">Khối Lượng:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="text" value="{{$customers->mass}}" id="mass" name="mass" size="20" placeholder="Khối lượng" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="au-btn au-btn-icon au-btn--blue float-right m-b-25">
                            <i class="zmdi zmdi-plus"></i>Lưu
                        </button>
                    </div>
                </div>
            </div>


        </form>
    </div>
@endsection

