<html lang="vi" class="translated-ltr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Mẫu</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&amp;display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="user/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="user/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="user/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="user/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="user/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="user/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="user/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="user/css/style.css" type="text/css">
    <link type="text/css" rel="stylesheet" charset="UTF-8"
        href="https://translate.googleapis.com/translate_static/css/translateelement.css">
</head>

<body>
    <!-- Header Section Begin -->
    @include('user.layout.header')
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    @include('user.layout.search1')
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="user/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>
                            Yêu thích
                        </h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">
                                Trang chủ
                            </a>
                            <span>
                                Yêu thích
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">
                                        Các sản phẩm
                                    </th>
                                    <th>
                                        Giá bán
                                    </th>
                                    <th>
                                        Số lượng tồn kho
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_love as $item)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img style="width: 100px; height:auto;"
                                                src="Avatar/{{ $item->product->productImage[0]->link_image }}" alt="">
                                            <h5>
                                                {{ $item->product->name }}
                                            </h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ number_format($item->product->price) }} vnd
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            {{ $item->product->total }}
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <form action="{{ route('love.delete', $item->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button style="background: transparent; border:0px; padding: 0px; margin:0px;" type="submit"><span class="icon_close"></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('home.index') }}" class="primary-btn">TIẾP TỤC MUA SẮM</a>
                        <a href="{{ route('home.index') }}" class="primary-btn cart-btn cart-btn-right"
                            style="background: #7fad39;color:white;">
                            Cập nhật Yêu thích
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->
    @include('user.layout.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="user/js/jquery-3.3.1.min.js"></script>
    <script src="user/js/bootstrap.min.js"></script>
    <script src="user/js/jquery.nice-select.min.js"></script>
    <script src="user/js/jquery-ui.min.js"></script>
    <script src="user/js/jquery.slicknav.js"></script>
    <script src="user/js/mixitup.min.js"></script>
    <script src="user/js/owl.carousel.min.js"></script>
    <script src="user/js/main.js"></script><div id="goog-gt-tt" class="skiptranslate" dir="ltr">
        <div style="padding: 8px;">
            <div>
                <div class="logo"><img
                        src="https://www.gstatic.com/images/branding/product/1x/translate_24dp.png" width="20"
                        height="20" alt="Google Dịch"></div>
            </div>
        </div>
        <div class="top" style="padding: 8px; float: left; width: 100%;">
            <h1 class="title gray">Văn bản gốc</h1>
        </div>
        <div class="middle" style="padding: 8px;">
            <div class="original-text"></div>
        </div>
        <div class="bottom" style="padding: 8px;">
            <div class="activity-links"><span class="activity-link">Đóng góp bản dịch hay hơn</span><span
                    class="activity-link"></span></div>
            <div class="started-activity-container">
                <hr style="color: #CCC; background-color: #CCC; height: 1px; border: none;">
                <div class="activity-root"></div>
            </div>
        </div>
        <div class="status-message" style="display: none;"></div>
    </div>




    <div class="goog-te-spinner-pos">
        <div class="goog-te-spinner-animation"><svg xmlns="http://www.w3.org/2000/svg" class="goog-te-spinner"
                width="96px" height="96px" viewBox="0 0 66 66">
                <circle class="goog-te-spinner-path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33"
                    r="30"></circle>
            </svg></div>
    </div>
</body>

</html>
