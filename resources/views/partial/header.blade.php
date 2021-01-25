
<div class="animsition">
    <div class="page-wrapper">
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="asset/images/icon/logo.png" alt="CoolAdmin" />
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
                                <a class="js-arrow" href="#">
                                    <i class="{{$menu->icoin}} m-r-10"></i>{{$menu->item_menu}}</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    @foreach (\App\Model\MenuModel::where('id_parent',$menu->id)->get() as $item)
                                        <li>
                                            <a href="{{$item->link}}"><i class="{{$item->icoin}} m-r-10"></i>{{$item->item_menu}}</a>
                                        </li>
                                    @endforeach


                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </nav>
        </header>
    </div>
</div>
