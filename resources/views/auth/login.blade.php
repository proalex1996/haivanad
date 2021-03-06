
<!doctype html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>HAIVAN - Đăng Nhập</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="au theme template">
<link href="{{asset('public/asset/css/font-face.css')}}" rel="stylesheet" media="all">
{{--<link href="{{asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">--}}
{{--<link href="{{asset('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">--}}
<link href="{{asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
<link href="{{asset('vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

<link href="{{asset('vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
<link href="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
<link href="{{asset('vendor/wow/animate.css')}}" rel="stylesheet" media="all">
<link href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
<link href="{{asset('vendor/slick/slick.css')}}" rel="stylesheet" media="all">
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
<link href="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
<script href="{{asset('public/asset/js/fontawesome.js')}}"></script>
<link href="{{asset('public/asset/css/theme.css')}}" rel="stylesheet" media="all">

</head>
<body class="animsition">
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="{{'/haivan'}}">
                            <img src="{{asset('public/asset/images/logo.png')}}" alt="HaiVan">
                        </a>
                    </div>
                    <div class="login-form">
                        <form action="postlogin" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tên Đăng Nhập</label>
                                <input class="au-input au-input--full" type="text" name= "email" placeholder="email">
                            </div>
                            <div class="form-group">
                                <label>Mật Khẩu</label>
                                <input class="au-input au-input--full" type="password" name="password"
                                       placeholder="Mật khẩu">
                            </div>
                            @if(\Session('error'))
                                <div class="m-l-95 color-session">
                                    {{Session('error')}}
                                </div>
                            @endif
                            <div class="login-checkbox">
                                <label>
                                    <input type="checkbox" name="remember">Nhớ tài khoản
                                </label>
                            </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-5" type="submit">Đăng Nhập</button>
                        </form>
                        <div class="forget-password">
                            <label>
                                <a  href="#">Quên mật khẩu</a>
                            </label>
                        </div>
                        <div class="register-link">
                            <p>
                                Chưa có tài khoản đăng nhập? Liên Hệ: 0889881010
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<footer>
    <script src="{{asset('vendor/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendor/slick/slick.min.js')}}"></script>
    <script src="{{asset('vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <script src="{{asset('vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('vendor/counter-up/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('public/asset/js/jquery-ui.js')}}"></script>
    <script src="{{asset('vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('public/asset/js/main.js')}}"></script>
    <script src="{{asset('public/asset/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/asset/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/asset/css/dataTables.bootstrap4.min.css')}}"></script>

</footer>

</html>

