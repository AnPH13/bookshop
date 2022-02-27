<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../../user/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../user/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../../user/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../../user/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../../user/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../../user/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../../user/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../../user/css/style.css" type="text/css">
</head>

<body>
    <!-- Header Section Begin -->
    @include('user.layout.header')
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    @include('user.layout.search1')
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    {{-- <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Vegetable’s Package</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <a href="./index.html">Vegetables</a>
                            <span>Vegetable’s Package</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="../../Avatar/{{ $data->productImage[0]->link_image }}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            @foreach ($data->productImage as $item)
                                <img data-imgbigurl="../../Avatar/{{ $item->link_image }}"
                                    src="../../Avatar/{{ $item->link_image }}" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $data->name }}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            {{--  <i class="fa fa-star-half-o"></i>  --}}
                            <span>(0 bình luận)</span>
                        </div>
                        <div class="product__details__price">{{ $data->price }} vnđ</div>
                        {{--  <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam
                            vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet
                            quam vehicula elementum sed sit amet dui. Proin eget tortor risus.</p>  --}}
                        {{--  <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div>  --}}
                        <a href="{{ route('cart.add', $data->id) }}" class="primary-btn">Thêm vào giỏ hàng   </a>
                        <a href="{{ route('love.add', $data->id) }}" class="heart-icon" style="{{ $love ? 'background: rgb(255, 0, 98); color:white;' :'' }}"><span class="icon_heart_alt"></span></a>
                        {{--  <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>  --}}
                        <div class="col-lg-12">
                            <div class="product__details__tab">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Mô tả</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                        <div class="product__details__tab__desc">
                                            <h6>Thông tin sản phẩm</h6>
                                            <p>{{ $data->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Đánh giá <span>(0)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Không có đánh giá</h6>
                                    <p>{{--  --}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Sản phẩm khác</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($khac as $item)
                <a href="{{ route('home.show', $item->id) }}">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="../../Avatar/{{ $item->productImage[0]->link_image }}">
                            {{--  <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>  --}}
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">{{ $item->name }}</a></h6>
                            <h5>{{ $item->price }}</h5>
                        </div>
                    </div>
                </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

    <!-- Footer Section Begin -->
    @include('user.layout.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="../../user/js/jquery-3.3.1.min.js"></script>
    <script src="../../user/js/bootstrap.min.js"></script>
    <script src="../../user/js/jquery.nice-select.min.js"></script>
    <script src="../../user/js/jquery-ui.min.js"></script>
    <script src="../../user/js/jquery.slicknav.js"></script>
    <script src="../../user/js/mixitup.min.js"></script>
    <script src="../../user/js/owl.carousel.min.js"></script>
    <script src="../../user/js/main.js"></script>


</body>

</html>
