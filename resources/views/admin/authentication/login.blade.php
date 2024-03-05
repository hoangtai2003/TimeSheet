
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="{{asset('admin/css/login.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="wrapper">
    <form method="post" action="{{route('login.store')}}">
        @csrf
        <h1>Đăng nhập</h1>
        <div class="input-box">
            <input required name="name" type="text" placeholder="Tên đăng nhập"/>
            <i class="fas fa-user"></i>
        </div>
        <div class="input-box">
            <input required name="password" type="password" placeholder="Mật khẩu"/>
            <i class="fas fa-lock"></i>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox"> Remember me</label>
            <a href="#">Quên mật khẩu</a>
        </div>
        <button type="submit" class="btn" name="login_btn">Đăng nhập</button>
        <div class="register-link">
            <p>Chưa có tài khoản?<a href="{{route('register')}}"> Đăng ký</a></p>
        </div>
    </form>
</div>
</body>
</html>
