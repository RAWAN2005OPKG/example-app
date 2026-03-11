<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>تسجيل الدخول</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('Login_v3/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('Login_v3/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('Login_v3/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('Login_v3/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('Login_v3/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('Login_v3/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('Login_v3/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('Login_v3/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('Login_v3/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('Login_v3/css/main.css') }}">
</head>
<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('{{asset('Login_v3/images/bg-01.jpg')}}');">
            <div class="wrap-login100">
                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-logo">
                        <i class="zmdi zmdi-landscape"></i>
                    </span>
                    <span class="login100-form-title p-b-34 p-t-27">
                        تسجيل الدخول
                    </span>

                    @if ($errors->any())
                        <div style="color: red; text-align: center; margin-bottom: 15px;">
                            بيانات الدخول غير صحيحة.
                        </div>
                    @endif

                    <div class="wrap-input100 validate-input" data-validate="أدخل البريد الإلكتروني">
                        <input class="input100" type="email" name="email" placeholder="البريد الإلكتروني" value="{{ old('email') }}" required>
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="أدخل كلمة المرور">
                        <input class="input100" type="password" name="password" placeholder="كلمة المرور" required>
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            دخول
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('Login_v3/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{asset('Login_v3/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{asset('Login_v3/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{asset('Login_v3/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('Login_v3/vendor/select2/select2.min.js') }}"></script>
    <script src="{{asset('Login_v3/js/main.js') }}"></script>
</body>
</html>
