@extends('pages.top-page.master')
@section('title','Danh Mục')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap">
                <h2 class="title-1">Danh Mục</h2>
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
                            <input type="text" class="form-control" id="id_branch" name="id_branch"
                                   placeholder="Mã Chi Nhánh">
                        </div>
                        <div class="col-md-4 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Tên Chi Nhánh</label>
                            <input type="text" class="form-control" id="name_branch" name="name_branch"
                                   placeholder="Tên Chi Nhánh">
                        </div>
                        <div class="col-md-3 col-sm-12" style="margin-top: 43px">
                            <button type="button" class="btn btn-info" id="add_branch">Thêm</button>
                        </div>
                    </div>
                    <table class="table table-hover" style="background-color: #ffffff; margin-bottom: 1rem;">
                        <thead>
                        <tr>
                            <th scope="col">Mã Loại Hợp Đồng</th>
                            <th scope="col">Loại hợp đồng</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($branchs as $branch)
                            <tr id = "{{$branch->id_branch}}">
                                <td>{{$branch->id_branch}}</td>
                                <td>{{$branch->name_branch}}</td>
                                <td>
                                    <button type="button" title="Sửa" class="btn btn-success" data-toggle="modal" data-target="#branch"
                                            data-id = "{{$branch->id_branch}}"
                                            data-name="{{$branch->name_branch}}" ><i class="fas fa-edit"></i></button>
                                    <button type="button" title="Xóa" name="delete_branch" class="btn btn-danger delete_branch">
                                        <i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </fieldset>
            <fieldset class="border-text">
                <legend class='text-left'>Loại Hợp Đồng</legend>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Mã Loai</label>
                            <input type="text" class="form-control" id="id_contract" name="id_contract"
                                   placeholder="Mã Loại Hợp Đồng" required>
                        </div>
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Tên Loại Hợp Đồng</label>
                            <input type="text" class="form-control" id="name_kind" name="name_kind"
                                   placeholder="Loại Hợp Đồng" required>
                        </div>
                        <div class="col-md-3 col-sm-12" style="margin-top: 43px">
                            <button type="button" class="btn btn-info" id="add_kind">Thêm</button>
                        </div>
                    </div>
                    <table class="table table-hover" style="background-color: #ffffff; margin-bottom: 1rem;">
                        <thead>
                        <tr>
                            <th scope="col">Mã Loại Hợp Đồng</th>
                            <th scope="col">Loại hợp đồng</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($kinds as $kind)
                        <tr id = "{{$kind->id_contract}}">
                            <td>{{$kind->id_contract}}</td>
                            <td>{{$kind->name_kind}}</td>
                            <td>
                                <button type="button" title="Sửa" class="btn btn-success" data-toggle="modal" data-target="#kind_contract" data-id_contract = "{{$kind->id_contract}}"
                                        data-name_kind="{{$kind->name_kind}}" ><i class="fas fa-edit"></i></button>
                                <button type="button" title="Xóa" name="delete_kind" class="btn btn-danger delete_kind">
                                    <i class="far fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </fieldset>
            <fieldset class="border-text">
                <legend class='text-left'>Trạng Thái Hợp Đồng</legend>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Mã Trạng Thái</label>
                            <input type="text" class="form-control" id="id_status_contract" name="id_status_contract"
                                   placeholder="Mã Trạng Thái" required>
                        </div>
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Tên Trạng Thái</label>
                            <input type="text" class="form-control" id="name_status_contract" name="name_status_contract"
                                   placeholder="Tên Trạng Thái" required>
                        </div>
                        <div class="col-md-3 col-sm-12" style="margin-top: 43px">
                            <button type="button" class="btn btn-info" id="add_status_contract">Thêm</button>
                        </div>
                    </div>
                        <table class="table table-hover" style="background-color: #ffffff; margin-bottom: 1rem;">
                            <thead>
                            <tr>
                                <th scope="col">Mã Trạng Thái</th>
                                <th scope="col">Tên Trạng Thái</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($status_contracts as $status_contract)
                                <tr id = "{{$status_contract->id_contract}}">
                                    <td>{{$status_contract->id_contract}}</td>
                                    <td>{{$status_contract->name_status}}</td>
                                    <td>
                                        <button type="button" title="Sửa" class="btn btn-success"
                                                data-toggle="modal" data-target="#status_contract"
                                                data-id_contract = "{{$status_contract->id_contract}}"
                                                data-name="{{$status_contract->name_status}}" ><i class="fas fa-edit"></i></button>
                                        <button type="button" title="Xóa" name="delete_status_contract"
                                                class="btn btn-danger delete_status_contract">
                                            <i class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                </div>

            </fieldset>
            <fieldset class="border-text">
                <legend class='text-left'>Loại Sản Phẩm</legend>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Mã Loại Sản Phẩm</label>
                            <input type="text" class="form-control" id="id_typebanner" name="id_typebanner"
                                   placeholder="Mã Loại Sản Phẩm" required>
                        </div>
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Tên Thể Loại</label>
                            <input type="text" class="form-control" id="name_type" name="name_type"
                                   placeholder="Tên Thể Loại" required>
                        </div>
                        <div class="col-md-3 col-sm-12" style="margin-top: 43px">
                            <button type="button" class="btn btn-info" id="submit_type_product">Thêm</button>
                        </div>
                    </div>
                    <table class="table table-hover" style="background-color: #ffffff; margin-bottom: 1rem;">
                        <thead>
                        <tr>
                            <th scope="col">Mã Loại SP</th>
                            <th scope="col">Tên Loại SP</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($type_banners as $type_banner)
                            <tr id = "{{$type_banner->id_typebanner}}">
                                <td>{{$type_banner->id_typebanner}}</td>
                                <td>{{$type_banner->name_type}}</td>
                                <td>
                                    <button type="button" title="Sửa" class="btn btn-success"
                                            data-toggle="modal" data-target="#type_banner"
                                            data-id = "{{$type_banner->id_typebanner}}"
                                            data-name="{{$type_banner->name_type}}" ><i class="fas fa-edit"></i></button>
                                    <button type="button" title="Xóa" name="delete_type_banner"
                                            class="btn btn-danger delete_type_banner">
                                        <i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </fieldset></fieldset>
            <fieldset class="border-text">
                <legend class='text-left'>Trạng Thái Sản Phẩm</legend>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Mã Trạng Thái:</label>
                            <input type="text" class="form-control" id="id_status" name="id_status"
                                   placeholder="Mã Trạng Thái" required>
                        </div>
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Tên Trạng Thái:</label>
                            <input type="text" class="form-control" id="name_status" name="name_status"
                                   placeholder="Tên Trạng Thái" required>
                        </div>
                        <div class="col-md-3 col-sm-12" style="margin-top: 43px">
                            <button type="button" class="btn btn-info" id="submit_product">Thêm</button>
                        </div>
                    </div>
                    <table class="table table-hover" style="background-color: #ffffff; margin-bottom: 1rem;">
                        <thead>
                        <tr>
                            <th scope="col">Mã Trạng Thái</th>
                            <th scope="col">Tên Trạng Thái</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($status_banners as $status_banner)
                            <tr id = "{{$status_banner->id_status}}">
                                <td>{{$status_banner->id_status}}</td>
                                <td>{{$status_banner->name_status}}</td>
                                <td>
                                    <button type="button" title="Sửa" class="btn btn-success"
                                            data-toggle="modal" data-target="#status_banner"
                                            data-id = "{{$status_banner->id_status}}"
                                            data-name="{{$status_banner->name_status}}" ><i class="fas fa-edit"></i></button>
                                    <button type="button" title="Xóa" name="delete_status_banner"
                                            class="btn btn-danger delete_status_banner">
                                        <i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </fieldset>
            <fieldset class="border-text">
                <legend class='text-left'>Nguồn Khách Hàng</legend>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Mã Nguồn:</label>
                            <input type="text" class="form-control" id="id_nguon" name="id_nguon"
                                   placeholder="Mã Nguồn" required>
                        </div>
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Tên Nguồn:</label>
                            <input type="text" class="form-control" id="name_nguon" name="name_nguon"
                                   placeholder="Tên Nguồn" required>
                        </div>
                        <div class="col-md-3 col-sm-12" style="margin-top: 43px">
                            <button type="button" class="btn btn-info" id="submit_nguon">Thêm</button>
                        </div>
                    </div>
                    <table class="table table-hover" style="background-color: #ffffff; margin-bottom: 1rem;">
                        <thead>
                        <tr>
                            <th scope="col">Mã Nguồn KH</th>
                            <th scope="col">Tên Nguồn KH</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($nguons as $nguon)
                            <tr id = "{{$nguon->id_nguon}}">
                                <td>{{$nguon->id_nguon}}</td>
                                <td>{{$nguon->name_nguon}}</td>
                                <td>
                                    <button type="button" title="Sửa" class="btn btn-success"
                                            data-toggle="modal" data-target="#nguon"
                                            data-id = "{{$nguon->id_nguon}}"
                                            data-name="{{$nguon->name_nguon}}" ><i class="fas fa-edit"></i></button>
                                    <button type="button" title="Xóa" name="delete_nguon"
                                            class="btn btn-danger delete_nguon">
                                        <i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </fieldset>
            <fieldset class="border-text">
                <legend class='text-left'>Loại Khách Hàng</legend>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Mã Thể Loại:</label>
                            <input type="text" class="form-control" id="id_type_customer" name="id_type_customer"
                                   placeholder="Mã Thể Loại" required>
                        </div>
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Tên Thể Loại:</label>
                            <input type="text" class="form-control" id="name_type_customer" name="name_type_customer"
                                   placeholder="Tên Thể Loại" required>
                        </div>
                        <div class="col-md-3 col-sm-12" style="margin-top: 43px">
                            <button type="button" class="btn btn-info" id="submit_type_customer">Thêm</button>
                        </div>
                    </div>
                    <table class="table table-hover" style="background-color: #ffffff; margin-bottom: 1rem;">
                        <thead>
                        <tr>
                            <th scope="col">Mã Loại KH</th>
                            <th scope="col">Tên Loại KH</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($type_customers as $type_customer)
                            <tr id = "{{$type_customer->id}}">
                                <td>{{$type_customer->id}}</td>
                                <td>{{$type_customer->name_type}}</td>
                                <td>
                                    <button type="button" title="Sửa" class="btn btn-success"
                                            data-toggle="modal" data-target="#type_customer"
                                            data-id = "{{$type_customer->id}}"
                                            data-name="{{$type_customer->name_type}}" ><i class="fas fa-edit"></i></button>
                                    <button type="button" title="Xóa" name="delete_type_customer"
                                            class="btn btn-danger delete_type_customer">
                                        <i class="far fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </fieldset>
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
{{--edit kind contract--}}
<div class="modal fade" id="kind_contract" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Loại Hợp Đồng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Mã Loại Hình:</label>
                        <input type="text" class="form-control" id="id_kind" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên Loại Hình:</label>
                        <input type="text" class="form-control" id="kind_name">
                    </div>
                </form>
            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="submit_kind">Xác Nhận</button>
            </div>
        </div>
    </div>
</div>
{{--edit status contract--}}
<div class="modal fade" id="status_contract" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Trạng Thái Hợp Đồng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Mã Trạng Thái:</label>
                        <input type="text" class="form-control" id="id_status_contract" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên Trạng Thái:</label>
                        <input type="text" class="form-control" id="name_status_contract">
                    </div>
                </form>
            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="submit_status_contract">Xác Nhận</button>
            </div>
        </div>
    </div>
</div>
{{--edit branch--}}
<div class="modal fade" id="branch" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Chi Nhánh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Mã Chi Nhánh:</label>
                        <input type="text" class="form-control" id="modal_id_branch" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên Chi Nhánh:</label>
                        <input type="text" class="form-control" id="modal_name_branch">
                    </div>
                </form>
            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="submit_branch">Xác Nhận</button>
            </div>
        </div>
    </div>
</div>
{{--edit type product--}}
<div class="modal fade" id="type_banner" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Loại Sản Phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Mã Loại Sản Phẩm:</label>
                        <input type="text" class="form-control" id="modal_id_typebanner" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên Loại Sản Phẩm:</label>
                        <input type="text" class="form-control" id="modal_name_type">
                    </div>
                </form>
            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="submit_type">Xác Nhận</button>
            </div>
        </div>
    </div>
</div>
{{--edit status product--}}
<div class="modal fade" id="status_banner" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Loại Sản Phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Mã Loại Sản Phẩm:</label>
                        <input type="text" class="form-control" id="modal_id_status" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên Loại Sản Phẩm:</label>
                        <input type="text" class="form-control" id="modal_name_status">
                    </div>
                </form>
            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="submit_status_banner">Xác Nhận</button>
            </div>
        </div>
    </div>
</div>
{{--edit nguon--}}
<div class="modal fade" id="nguon" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Loại Sản Phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Mã Nguồn KH:</label>
                        <input type="text" class="form-control" id="modal_id_nguon" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên Nguồn KH:</label>
                        <input type="text" class="form-control" id="modal_name_nguon">
                    </div>
                </form>
            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="submit_nguon_customer">Xác Nhận</button>
            </div>
        </div>
    </div>
</div>
{{--edit type customer--}}
<div class="modal fade" id="type_customer" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Loại KH</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Mã Loại KH:</label>
                        <input type="text" class="form-control" id="modal_id_type_customer" readonly>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên Loại KH:</label>
                        <input type="text" class="form-control" id="modal_name_type_customer">
                    </div>
                </form>
            </div>


            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="modal_submit_type_customer">Xác Nhận</button>
            </div>
        </div>
    </div>
</div>


