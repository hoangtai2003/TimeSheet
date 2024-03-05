
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register</title>
    <link href="{{asset('admin/css/login.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="wrapper">
    <form method="post" action="{{route('register.store')}}">
        @csrf
        <h1>Đăng ký</h1>
        <div class="input-box">
            <input required name="name" type="text" placeholder="Nhập Username"/>
            <i class="fas fa-user"></i>
        </div>
        <div class="input-box">
            <input required name="email" type="email" placeholder="name@example.com"/>
            <i class="fas fa-envelope"></i>
        </div>
        <div class="input-box">
            <input required name="password" type="password" placeholder="Mật khẩu"/>
            <i class="fas fa-lock"></i>
        </div>
        <div class="input-box">
            <input required name="cpassword" type="password" placeholder="Nhập lại mật khẩu"/>
            <i class="fas fa-lock"></i>
        </div>
        <button type="submit" class="btn" name="register_btn">Đăng ký</button>
        <div class="register-link">
            <p>Bạn đã có tài khoản?<a href="{{route('login')}}"> Đăng nhập</a></p>
        </div>
    </form>
</div>
</body>
</html>
