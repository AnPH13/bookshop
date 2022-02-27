<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            {{-- <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                            <li>Free Shipping for all Order of $99</li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="https://www.facebook.com/myyou.k3/"><i class="fa fa-facebook"></i></a>
                            {{-- <a href="#"><i class="fa fa-twitter"></i></a> --}}
                            <a href="https://www.linkedin.com/in/ho%C3%A0ng-%C4%91%C3%B4ng-h%E1%BA%A1-03519b232/"><i
                                    class="fa fa-linkedin"></i></a>
                            {{-- <a href="https://www.pinterest.com/anph13"><i class="fa fa-pinterest-p"></i></a> --}}
                        </div>
                        <div class="header__top__right__social">
                            <a href="{{ route('login') }}"><i
                                    class="fa fa-user"></i>{{ Auth::check() ? Auth::user()->userDetail->name : 'Đăng nhập' }}</a>
                        </div>
                        @if (Auth::check())
                            <div class="header__top__right__auth">
                                <a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i>Đăng xuất</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="./index.html"><img src="user/img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="{{ $active == 'home' ? 'active' : '' }}"><a
                                href="{{ route('home.index') }}">Trang chủ</a></li>
                        <li class="{{ $active == 'list' ? 'active' : '' }}"><a href="{{ route('list.index') }}">Danh
                                sách</a></li>
                        <li class="{{ $active == 'trang' ? 'active' : '' }}"><a href="#">Trang</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="{{ route('cart.index') }}">Giỏ hàng</a></li>
                                <li><a href="./checkout.html">Đơn hàng</a></li>
                            </ul>
                        </li>
                        {{-- <li><a href="./blog.html">Bài viết</a></li> --}}
                        <li><a href="./contact.html">{{ Auth::check() ? 'Tài khoản' : '' }}</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="{{ route('love.index') }}"><i class="fa fa-heart"></i>
                                {{-- <span>1</span> --}}</a></li>
                        <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-bag"></i>
                                {{-- <span>1</span> --}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
