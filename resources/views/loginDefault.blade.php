<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>home</title>
</head>

<body>
    <main style="padding-top: 20px;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 style="text-align: center;">Login</h1>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">email</label>
                            <input required type="text" name="email" id="email" class="form-control"
                                placeholder="vui lòng nhập email" autocomplete=false>
                        </div>
                        <div class="form-group">
                            <label for="">password</label>
                            <input required type="password" name="password" id="password" class="form-control"
                                placeholder="vui lòng nhập password" autocomplete=false>
                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="remember"> Remember me
                            </label>
                          </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>
