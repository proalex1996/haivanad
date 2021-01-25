
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="asset/images/icon/logo.png" alt="HaiVanAD.vn" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                @foreach ($menus as $menu)

                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="{{$menu->icoin}} m-r-10"></i>{{$menu->item_menu}}</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            @foreach (\App\Model\MenuModel::where('id_parent',$menu->id)->get() as $item)
                                <li>
                                    <a href="index.html"><i class="{{$item->icoin}} m-r-10"></i>{{$item->item_menu}}</a>
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

