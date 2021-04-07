@extends('pages.top-page.master')
@section('title','Cài Đặt')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap">
                <h2 class="title-1">Cài Đặt</h2>
            </div>
        </div>
        <form class="post-form-sort" action="{{url('/setting/add')}}" method="post" style="margin-bottom: 3em">
            @csrf
            @if(\Session('chi-nhanh'))
                <div class="color-session" style="float: right">
                    {{Session('chi-nhanh')}}
                </div>
            @endif
            <fieldset class="border-text">
                <legend class='text-left'>Chi Nhánh</legend>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Mã Chi Nhánh</label>
                            <input type="text" class="form-control" id="id_banner" name="id_branch"
                                   placeholder="Mã Chi Nhánh">
                        </div>
                        <div class="col-md-4 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Tên Chi Nhánh</label>
                            <input type="text" class="form-control" id="size_banner" name="name_branch"
                                   placeholder="Tên Chi Nhánh">
                        </div>
                        <div class="col-md-4 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Địa Chỉ</label>
                            <input type="text" class="form-control" id="size_banner" name="adress_branch"
                                   placeholder="Địa Chỉ">
                        </div>

                    </div>
                </div>

            </fieldset>
            @if(\Session('luong'))
                <div class="color-session" style="float: right">
                    {{Session('luong')}}
                </div>
            @endif
            <fieldset class="border-text">
                <legend class='text-left'>Loại Hợp Đồng</legend>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Loại Hợp Đồng</label>
                            <input type="text" class="form-control" id="name_kind" name="name_kind"
                                   placeholder="Loại Hợp Đồng">
                        </div>
                        <div class="col-md-6 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Mã Loại Hợp Đồng</label>
                            <input type="text" class="form-control" id="id_contract" name="id_contract"
                                   placeholder="Mã Loại Hợp Đồng">
                        </div>


                    </div>
                </div>

            </fieldset>
            @if(\Session('pos'))
                <div class="color-session" style="float: right">
                    {{Session('pos')}}
                </div>
            @endif
            <fieldset class="border-text">
                <legend class='text-left'>Chức Vụ</legend>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Mã Chức Vụ</label>
                            <input type="text" class="form-control" id="id_position" name="id_position"
                                   placeholder="Mã Chức Vụ">
                        </div>
                        <div class="col-md-6 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Tên Chúc Vụ</label>
                            <input type="text" class="form-control" id="name_position" name="name_position"
                                   placeholder="Tên Chúc Vụ">
                        </div>


                    </div>
                </div>

            </fieldset>

            <div class="overview-wrap">
                <button type="submit" data-toggle="modal" data-target="#update" class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-plus"></i>Thêm
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
                Đang Thêm Mới!!
            </div>
        </div>
    </div>
</div>


