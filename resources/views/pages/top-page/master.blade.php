<?php
$request = request()->user();
if ($request['id_phan_quyen'] == 1) {
    $menus = \App\Model\MenuModel::where('id_parent', 'parent')->orderBy('id', 'ASC')->get();


} elseif ($request['id_phan_quyen'] == 2) {
    $menus = \App\Model\MenuModel::where('id_parent', 'parent')->where('id_permission', '=', 2)->orderBy('id', 'ASC')->get();

}
header('Access-Control-Allow-Origin: *');
?><!doctype html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>HAIVAN - @yield('title')</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="au theme template">
<link href="{{asset('public/asset/css/font-face.css')}}" rel="stylesheet" media="all">
<link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
{{--<link href="{{asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">--}}
{{--<link href="{{asset('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">--}}
<link href="{{asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
<link href="{{asset('vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
<link href="{{asset('public/asset/js/dropzone/basic.css')}}" rel="stylesheet" media="all">
<link href="{{asset('public/asset/js/dropzone/dropzone.css')}}" rel="stylesheet" media="all">
<link href="{{asset('vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
<link href="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
<link href="{{asset('vendor/wow/animate.css')}}" rel="stylesheet" media="all">
<link href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
<link href="{{asset('vendor/slick/slick.css')}}" rel="stylesheet" media="all">
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
<link href="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
<link href="{{asset('public/asset/css/image-uploader.min.css')}}" rel="stylesheet" media="all">
<script href="{{asset('public/asset/js/fontawesome.js')}}"></script>
<link href="{{asset('public/asset/css/chosen.css')}}" rel="stylesheet" media="all">
<link href="{{asset('public/asset/css/theme.css')}}" rel="stylesheet" media="all">
</head>

<body class="animsition">
<div class="page-wrapper">
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" id="domain" href="{{config('config_app.domain.domain')}}">
                        <img src="{{asset('public/asset/images/logo.png')}}" alt="HaiVan"/>
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                    </button>
                </div>
            </div>
        </div>

            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        @foreach ($menus as $menu)
                            <li class="has-sub">
                                <a class="js-arrow" href="{{url($menu->link)}}">
                                    <div class="form-group">
                                        <div class="{{$menu->icoin}} m-r-10"></div>
                                        <div class="item-menu">{{$menu->item_menu}}</div>
                                    </div>

                                </a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    @foreach (\App\Model\MenuModel::where('id_parent',$menu->id)->get() as $item)
                                        <li>
                                            <a href="{{url($item->link)}}">
                                                <div
                                                    class="{{$item->icoin}} m-r-10"></div>
                                                <div class="item-menu">{{$item->item_menu}}</div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                    </ul>
                </div>

            </nav>
    </header>
    {{--End Header Mobile--}}

    {{--Star Sidebar--}}
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="{{'/'}}">
                <img src="{{asset('public/asset/images/logo.png')}}" alt="HaiVan"/>
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    @foreach ($menus as $menu)
                        <li class="has-sub">
                            <a class="js-arrow" href="{{url($menu->link)}}">
                                <div class="{{$menu->icoin}} m-r-10"></div>
                                <div class="item-menu">{{$menu->item_menu}}</div>
                            </a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                @foreach (\App\Model\MenuModel::where('id_parent',$menu->id)->get() as $item)
                                    <li>
                                        <a href="{{url($item->link)}}">
                                            <div
                                                class="{{$item->icoin}} m-r-10"></div>
                                            <div class="item-menu">{{$item->item_menu}}</div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                        </li>
                </ul>
            </nav>
        </div>
    </aside>
    {{--End Sidebar--}}

    {{--Start Content page--}}
    <div class="page-container">
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <form class="form-header " action="{{url('/contract')}}" method="POST">
                            @csrf
                            <input class="au-input au-input--xl" type="text" name="search"
                                   placeholder="Tìm kiếm hợp đông &amp; báo cáo..."/>
                            <button class="au-btn--submit" type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>

                        <div class="header-button">
                            <div class="noti-wrap js-aroww">
                                <a class="noti__item " href="https://id.zalo.me/"><i class="zmdi zmdi-email"></i>
                                </a>

                            </div>
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                        <img src="{{asset('public/asset/images/account.png')}}"/>
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="#">
                                        </a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <a href="#">
                                                    <img src="{{asset('public/asset/images/account.png')}}"/>
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#">{{$request->name}}</a>
                                                </h5>
                                                <span class="email">{{$request->email}}</span>
                                            </div>
                                        </div>
                                        {{--                                        <div class="account-dropdown__body">--}}
                                        {{--                                            <div class="account-dropdown__item">--}}
                                        {{--                                                <a href="{{url('/home/user')}}">--}}
                                        {{--                                                    <i class="zmdi icon-account"></i>Tài Khoản</a>--}}
                                        {{--                                            </div>--}}
                                        {{--                                            <div class="account-dropdown__item">--}}
                                        {{--                                                <a href="#">--}}
                                        {{--                                                    <i class="zmdi icon-set-up"></i>Cài Đặt</a>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        <div class="account-dropdown__footer">
                                            <a href="{{url('/auth/logout')}}">
                                                <i class="zmdi icon-logout"></i>Đăng Xuất</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="chatbox" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="main-content">
            <div class="section__content section__content--p30">

                @yield('content')

            </div>
        </div>
        {{--        <div class="col-md-12">--}}
        {{--            <ul class="social-network social-circle">--}}
        {{--                <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>--}}
        {{--                <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>--}}
        {{--                <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>--}}
        {{--                <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>--}}
        {{--            </ul>--}}
        {{--        </div>--}}
        <div class="col-sm-12 m-t-100">
            <hr>
            <div class="copyright">
                <p>Copyright © 2021 KATEC. All rights reserved. Template by <a href="https://katec.vn">KATEC</a>.
                </p>
            </div>
        </div>
    </div>
</body>
<footer>
    <script src="{{asset('vendor/jquery-3.2.1.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{asset('vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendor/slick/slick.min.js')}}"></script>
    <script src="{{asset('vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <script src="{{asset('vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('vendor/counter-up/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('public/asset/js/chosen.jquery.min.js')}}"></script>
    <script src="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('public/asset/js/jquery-ui.js')}}"></script>
    <script src="{{asset('vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('public/asset/js/image-uploader.min.js')}}"></script>
    <script src="{{asset('public/asset/js/main.js')}}"></script>
    <script src="{{asset('public/asset/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/asset/js/dropzone/dropzone.js')}}"></script>
    <script src="{{asset('public/asset/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/asset/css/dataTables.bootstrap4.min.css')}}"></script>
</footer>

</html>



