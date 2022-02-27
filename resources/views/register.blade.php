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

    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Register</h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập Tên">
                    </div>
                    <div class="col-lg-12 text-center">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email">
                    </div>
                    <div class="col-lg-12 text-center">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="col-lg-12 text-center">
                        <input type="number" class="form-control" id="number_phone" name="number_phone" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="col-lg-12 text-center">
                        <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Nhập ngày sinh">
                    </div>
                    <div class="form-group" style="height:254px;">
                        <label for="">Ảnh đại diện</label>
                        <div class="custom-file">
                            <input type="file" class="form-control" id="image_input_avatar"
                                onchange="LoadImage(this, '#image_avatar')" name="avatar"
                                accept="image/gif, image/jpeg, image/png">
                            <img id="image_avatar" src="#" alt="your image"
                                style="border: 2px solid; display:none; height:200px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">giới tính nam</label>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="gender" name="gender">
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <input type="submit" class="form-control site-btn" value="Đăng ký" style="color:white;">
                    </div>
                </div>
            </form>
        </div>
    </div>

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
