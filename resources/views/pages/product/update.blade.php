@extends('pages.top-page.master')
@section('title','Sửa Pano')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap">
                <h2 class="title-1">Sửa Thông Tin Pano</h2>
            </div>
        </div>
        <form action="{{\Illuminate\Support\Facades\URL::to('/product/update/' . $banners->id)}}"
              enctype="multipart/form-data" class="needs-validation" method="post">
            @csrf
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Mã Pano: </label>
                <input type="text" class="form-customer-input" value="{{$banners ->id_banner}}" id="id_banner" name="id_banner"
                       placeholder="Mã Pano" size="20" required>
                <div class="invalid-feedback">Mã Pano không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Địa Chỉ: </label>
                <input type="text" class="form-customer-input" value="{{$banners->banner_adress}}" id="banner_adress" name="banner_adress"
                       placeholder="Địa chỉ" required>
                <div class="invalid-feedback">Địa chỉ không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Kích Thước:</label>
                <input class="form-customer-input" type="number" id="size_banner" value="{{$banners->size_banner}}" name="size_banner" placeholder="Kích thước" required>
                <div class="invalid-feedback">Kích thước không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Tổng Chiều Cao: </label>
                <input class="form-customer-input" type="number" id="height_banner" value="{{$banners->height_banner}}" name="height_banner" placeholder="Tổng chiều cao" required>
                <div class="invalid-feedback">Email không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname">Hệ Thống Đèn: </label>
                <input class="form-customer-input" type="number" id="light_system" value="{{$banners->light_system}}" name="light_system" placeholder="Hệ thống đèn" required>
                <div class="invalid-feedback">Hệ thống đèn không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlInput1 uname" >Nội Dung: </label>
                <input type="text" class="form-customer-input" id="banner_content" value="{{$banners->content}}" name="banner_content"
                       placeholder="Địa chỉ" required>
                <div class="invalid-feedback">Nội không được để trống</div>
            </div>
            <div class="form-customer">
                <label for="exampleFormControlSelect1">Trạng Thái</label>
                <select class="form-control" id="status_banner" name="status">
                    @foreach($statuss as $status)
                        @if ($status->id_status == $banners->status)
                            <option value="{{$status->id_status}}" selected>{{$status->name_status}}</option>
                        @else
                            <option value="{{$status->id_status}}">{{$status->name_status}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Ảnh Minh Họa</label>
                <div class="custom-file">
                    <label class="custom-file-label" for="validatedCustomFile">Chọn file...</label>
                    <input type="file" class="custom-file-input" value="{{$banners->thumb_banner}}" accept="image/*" id="content_contract"
                           name="thumb_banner">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="au-btn au-btn-icon au-btn--blue float-right m-b-25">
                    <i class="zmdi zmdi-plus"></i>Sửa
                </button>
            </div>
        </form>
    </div>
@endsection


