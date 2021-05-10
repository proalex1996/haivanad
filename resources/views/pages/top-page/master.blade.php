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
<meta name="csrf-token" content="{{csrf_token()}}">
<title>HAIVAN - @yield('title')</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="au theme template">
<link href="{{asset('public/asset/css/font-face.css')}}" rel="stylesheet" media="all">
<link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link href="{{asset('bootstrap/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
<link href="{{asset('bootstrap/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
<link href="{{asset('bootstrap/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
<link href="{{asset('bootstrap/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
<link href="{{asset('public/asset/js/dropzone/basic.css')}}" rel="stylesheet" media="all">
<link href="{{asset('public/asset/js/dropzone/dropzone.css')}}" rel="stylesheet" media="all">
<link href="{{asset('bootstrap/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
<link href="{{asset('bootstrap/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
<link href="{{asset('bootstrap/wow/animate.css')}}" rel="stylesheet" media="all">
<link href="{{asset('bootstrap/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
<link href="{{asset('bootstrap/slick/slick.css')}}" rel="stylesheet" media="all">
<link href="{{asset('bootstrap/select2/select2.min.css')}}" rel="stylesheet" media="all">
<link href="{{asset('bootstrap/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
<link href="{{asset('public/asset/css/image-uploader.min.css')}}" rel="stylesheet" media="all">
<script href="{{asset('public/asset/js/fontawesome.js')}}"></script>
<link href="{{asset('public/asset/css/chosen.css')}}" rel="stylesheet" media="all">
<link href="{{asset('public/asset/css/theme.css')}}" rel="stylesheet" media="all">
<link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
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
        <a href="https://zalo.me/" id="linkzalo" target="_blank" rel="noopener noreferrer">
            <div class="fcta-zalo-vi-tri-nut">
                <div id="fcta-zalo-tracking" class="fcta-zalo-nen-nut">
                    <div id="fcta-zalo-tracking" class="fcta-zalo-ben-trong-nut">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 460.1 436.6">
                            <path fill="currentColor" class="st0"
                                  d="M82.6 380.9c-1.8-.8-3.1-1.7-1-3.5 1.3-1 2.7-1.9 4.1-2.8 13.1-8.5 25.4-17.8 33.5-31.5 6.8-11.4 5.7-18.1-2.8-26.5C69 269.2 48.2 212.5 58.6 145.5 64.5 107.7 81.8 75 107 46.6c15.2-17.2 33.3-31.1 53.1-42.7 1.2-.7 2.9-.9 3.1-2.7-.4-1-1.1-.7-1.7-.7-33.7 0-67.4-.7-101 .2C28.3 1.7.5 26.6.6 62.3c.2 104.3 0 208.6 0 313 0 32.4 24.7 59.5 57 60.7 27.3 1.1 54.6.2 82 .1 2 .1 4 .2 6 .2H290c36 0 72 .2 108 0 33.4 0 60.5-27 60.5-60.3v-.6-58.5c0-1.4.5-2.9-.4-4.4-1.8.1-2.5 1.6-3.5 2.6-19.4 19.5-42.3 35.2-67.4 46.3-61.5 27.1-124.1 29-187.6 7.2-5.5-2-11.5-2.2-17.2-.8-8.4 2.1-16.7 4.6-25 7.1-24.4 7.6-49.3 11-74.8 6zm72.5-168.5c1.7-2.2 2.6-3.5 3.6-4.8 13.1-16.6 26.2-33.2 39.3-49.9 3.8-4.8 7.6-9.7 10-15.5 2.8-6.6-.2-12.8-7-15.2-3-.9-6.2-1.3-9.4-1.1-17.8-.1-35.7-.1-53.5 0-2.5 0-5 .3-7.4.9-5.6 1.4-9 7.1-7.6 12.8 1 3.8 4 6.8 7.8 7.7 2.4.6 4.9.9 7.4.8 10.8.1 21.7 0 32.5.1 1.2 0 2.7-.8 3.6 1-.9 1.2-1.8 2.4-2.7 3.5-15.5 19.6-30.9 39.3-46.4 58.9-3.8 4.9-5.8 10.3-3 16.3s8.5 7.1 14.3 7.5c4.6.3 9.3.1 14 .1 16.2 0 32.3.1 48.5-.1 8.6-.1 13.2-5.3 12.3-13.3-.7-6.3-5-9.6-13-9.7-14.1-.1-28.2 0-43.3 0zm116-52.6c-12.5-10.9-26.3-11.6-39.8-3.6-16.4 9.6-22.4 25.3-20.4 43.5 1.9 17 9.3 30.9 27.1 36.6 11.1 3.6 21.4 2.3 30.5-5.1 2.4-1.9 3.1-1.5 4.8.6 3.3 4.2 9 5.8 14 3.9 5-1.5 8.3-6.1 8.3-11.3.1-20 .2-40 0-60-.1-8-7.6-13.1-15.4-11.5-4.3.9-6.7 3.8-9.1 6.9zm69.3 37.1c-.4 25 20.3 43.9 46.3 41.3 23.9-2.4 39.4-20.3 38.6-45.6-.8-25-19.4-42.1-44.9-41.3-23.9.7-40.8 19.9-40 45.6zm-8.8-19.9c0-15.7.1-31.3 0-47 0-8-5.1-13-12.7-12.9-7.4.1-12.3 5.1-12.4 12.8-.1 4.7 0 9.3 0 14v79.5c0 6.2 3.8 11.6 8.8 12.9 6.9 1.9 14-2.2 15.8-9.1.3-1.2.5-2.4.4-3.7.2-15.5.1-31 .1-46.5z"></path>
                        </svg>
                    </div>
                    <div id="fcta-zalo-tracking" class="fcta-zalo-text">Chat ngay</div>
                </div>
            </div>
        </a>
    </div>

</body>
<footer>
    <div class="col-sm-12 m-t-100">
        <div class="copyright">
            <hr style="width: 77%; margin-left: 300px">
            <p style="margin-left: 300px" >Copyright © 2021 KATEC. All rights reserved. Template by <a href="https://katec.vn">KATEC</a>.
            </p>
        </div>
    </div>

    <script src="{{asset('bootstrap/jquery-3.2.1.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{asset('bootstrap/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('bootstrap/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <script src="{{asset('bootstrap/slick/slick.min.js')}}"></script>
    <script src="{{asset('bootstrap/wow/wow.min.js')}}"></script>
    <script src="{{asset('bootstrap/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <script src="{{asset('bootstrap/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('bootstrap/counter-up/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('bootstrap/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('public/asset/js/chosen.jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('bootstrap/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('bootstrap/select2/select2.min.js')}}"></script>
    <script src="{{asset('public/asset/js/jquery-ui.js')}}"></script>
    <script src="{{asset('bootstrap/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('public/asset/js/image-uploader.min.js')}}"></script>
    <script src="{{asset('public/asset/js/money.js')}}"></script>
    <script src="{{asset('public/asset/js/main.js')}}"></script>
    <script src="{{asset('public/asset/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/asset/js/dropzone/dropzone.js')}}"></script>
    <script src="{{asset('public/asset/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/asset/css/dataTables.bootstrap4.min.css')}}"></script>
</footer>

</html>



