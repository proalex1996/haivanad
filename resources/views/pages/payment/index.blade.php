@extends('pages.top-page.master')
@section('title','Thanh Toán')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <h2 class="title-1">Thanh Toán</h2>
                </div>

            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <form action="">
                        <div class="card ">
                            <div class="card-header">
                                <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                                    <!-- Credit card form tabs -->
                                    <div class="col-sm-12">
                                        <label for="exampleFormControlSelect2"><h4>Mã Hợp Đồng</h4></label>
                                    </div>
                                    <div class="col-sm-12">
                                        <select class="form-control chosen-select" onchange="detailPayment()"
                                                id="id_contract" name="id_contract" required>
                                            <option value="">--Chọn Mã Hợp Đồng--</option>
                                            @foreach($contracts as $contract)
                                                <option
                                                    value="{{$contract->id_contract}}">{{$contract->id_contract}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div id="credit-card" class="tab-pane fade show active pt-3">
                                        <div class="form-group">
                                            <label for="username">
                                                <h6>Tổng Giá Trị Hợp Đồng(USD)</h6>
                                            </label>
                                            <input type="text" name="value_contract" id="value_contract" placeholder="Tổng Giá Trị Hợp Đồng"
                                                   class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">
                                                <h6>Kì Thanh Toán</h6>
                                            </label>
                                            <select class="form-control" id="payment_period" onchange="getDetailBill()"
                                                    name="payment_period">
                                                <option value="">--Chọn Kì Thanh Toán--</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">
                                                <h6>Tỉ lệ Thanh Toán (%)</h6>
                                            </label>
                                            <input type="text" name="ratio" id="ratio" placeholder="Tỉ Lệ Thanh Toán"
                                                   class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">
                                                <h6>Giá Trị Hợp Đồng Của Kì Thanh Toán(Trước Thuế)(VND)</h6>
                                            </label>
                                            <input type="text" name="id_value_contract" id="id_value_contract"
                                                   placeholder="VND"
                                                   class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">
                                                <h6>Thuế(%)</h6>
                                            </label>
                                            <input type="text" name="vat" id="vat" placeholder="(%)"
                                                   class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">
                                                <h6>Tổng Giá Trị Hợp Đồng Của Kì Thanh Toán(VND)</h6>
                                            </label>
                                            <input type="text" name="total_value" id="total_value" placeholder="VND"
                                                   class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">
                                                <h6>Ngày Thanh Toán</h6>
                                            </label>
                                            <input type="date" name="_pay_due" id="_pay_due" placeholder="VND"
                                                   class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">
                                                <h6>Số Tiền Thanh Toán(VND)</h6>
                                            </label>
                                            <input type="text" name="money_pay" id="money_pay" placeholder="VND"
                                                   class="form-control" required>
                                        </div>
                                        <div class="card-footer">
                                            <button type="button"
                                                    class="subscribe btn btn-primary btn-block shadow-sm"
                                                    id="button_payment" data-toggle="modal" data-target="#payment"> Xác
                                                Nhận Thanh Toán
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Xác Nhận Thanh Toán</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="username">
                            <h6>Tổng Giá Trị Hợp Đồng Của Kì Thanh Toán</h6>
                        </label>
                        <input type="text" name="modal_total_value" id="modal_total_value" placeholder="VND"
                               class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="username">
                            <h6>Số Tiền Thanh Toán</h6>
                        </label>
                        <input type="text" name="modal_money_pay" id="modal_money_pay" placeholder="VND"
                               class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button id="modal_summit_pay" type="submit" class="btn btn-primary" >Xác Nhận</button>
            </div>
        </div>
    </div>
</div>

{{--Modal Đặt Chỗ--}}

<div class="modal fade" id="dat_cho" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Đặt Chỗ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="pickup_banner" action="{{\Illuminate\Support\Facades\URL::to('product/pickup')}}"
                      enctype="multipart/form-data" class="needs-validation" method="POST">
                    @csrf
                    <label for="exampleFormControlSelect1">Khách Hàng</label>
                    <select class="form-control" id="id_customer" name="id_customer">
                        {{$customers = \Illuminate\Support\Facades\DB::table('customer')->select('*')->get()}}
                        @foreach($customers as $customer)
                            <option value="{{$customer->customer_id}}">{{$customer->name_customer}}</option>
                        @endforeach
                    </select>
                    <label for="exampleFormControlSelect1">Trạng Thái</label>
                    <select class="form-control" id="name_status" name="name_status">
                        {{$stt_banners = \Illuminate\Support\Facades\DB::table('status_banner')->select('*')->get()}}
                        @foreach($stt_banners as $stt_banner)
                            <option value="{{$stt_banner->id_status}}">{{$stt_banner->name_status}}</option>
                        @endforeach
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button id="pickup" type="submit" class="btn btn-primary">Đặt Chỗ</button>
            </div>
        </div>
    </div>
</div>



