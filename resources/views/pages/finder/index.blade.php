@extends('pages.top-page.master')
@section('title','Thông Tin Chung')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <h2 class="title-1">Thông Tin Chung</h2>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-md-3 col-sm-12 m-t-10">
                    <label for="exampleFormControlInput1 ">Tên Sản Phẩm</label>
                    <select class="form-control chosen-select" id="_name_banner" name="_name_banner">
                        <option value="">--Chọn Pano--</option>
                        @foreach($banners as $banner)
                            <option value="{{$banner->id_banner}}">{{$banner->_name_banner}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 col-sm-12 m-t-15">
                    <label for="exampleFormControlInput1 "></label>
                    <button class="btn btn-primary btn-block" type="button" id="id_finder" onclick="finder()" aria-expanded="false">Tìm
                    </button>
                </div>
            </div>
        <div id="info_finder">

        </div>

    </div>
@endsection
