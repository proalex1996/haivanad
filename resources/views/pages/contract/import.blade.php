@extends('pages.top-page.master')
@section('title','Import')
@section('content')
    <div class="container">
        <div class="card bg-light mt-3">
            <div class="card-header">
                Nhập File Hợp Đồng
            </div>
            <div class="card-body">
                <form action="import-contract" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button class="btn btn-success">Nhập</button>
                    <a class="btn btn-warning" href="{{\Illuminate\Support\Facades\URL::to('contract/download-exmple')}}">Tải File Mẫu</a>
                </form>
            </div>
        </div>
    </div>
@endsection
