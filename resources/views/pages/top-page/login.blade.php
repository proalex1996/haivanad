@extends('partial.head')
@section('title','Đăng Nhập')
@section('content')
    <body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="" alt="Hải Vân">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                    <div class="invalid-feedback">Email không được để trống</div>
                                </div>

                                <div class="form-group">
                                    <label>Mật Khẩu</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Mật Khẩu">
                                    <div class="invalid-feedback">Mật khẩu không được để trống</div>
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Nhớ tài khoản
                                    </label>
{{--                                    <label>--}}
{{--                                        <a href="#">Quên mật khẩu</a>--}}
{{--                                    </label>--}}
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Đăng Nhập</button>
                            </form>
                            <div class="register-link">
                                <p>
                                  Đây là trang đăng nhập với tài khoản đã được cấp trước.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
