<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="icon" type="image/png" href="/css/auth/images/icons/favicon.ico"/>

    <link rel="stylesheet" type="text/css" href="/css/auth/vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="/css/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="/css/auth/vendor/animate/animate.css">

    <link rel="stylesheet" type="text/css" href="/css/auth/vendor/css-hamburgers/hamburgers.min.css">

    <link rel="stylesheet" type="text/css" href="/css/auth/vendor/select2/select2.min.css">

    <link rel="stylesheet" type="text/css" href="/css/auth/css/util.css">
    <link rel="stylesheet" type="text/css" href="/css/auth/css/main.css">

</head>
<body>

<div class="limiter">

    @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
    @endif

    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="/css/auth/images/img-01.png" alt="IMG">
            </div>
            
            <form method="POST" class="login100-form validate-form"  action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <span class="login100-form-title">
						Inicio de sesión
                </span>

                <div class="wrap-input100 validate-input" data-validate = "Un email valido es requerido: ex@abc.xyz">
                    <input class="input100{{ $errors->has('email') ? ' is-invalid' : '' }}"  type="email" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                         </span>
                    @endif
                </div>



                <div class="wrap-input100 validate-input" data-validate = "la contraseña es requerida">
                    <input class="input100{{ $errors->has('password') ? ' is-invalid' : ''}}" type="password" name="password" placeholder="Contraseña">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
                    </span>

                </div>

                <div class="wrap-input100 validate-input" data-validate = "la contraseña es requerida">
                    <input class="input100{{ $errors->has('password') ? ' is-invalid' : ''}}" type="password" name="password_confirmation" placeholder="repetir contraseña">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
                    </span>

                </div>


                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Restablecer contraseña
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>





<script src="/css/auth/vendor/jquery/jquery-3.2.1.min.js"></script>

<script src="/css/auth/vendor/bootstrap/js/popper.js"></script>
<script src="/css/auth/vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="/css/auth/vendor/select2/select2.min.js"></script>

<script src="/css/auth/vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>

<script src="/css/auth/js/main.js"></script>

</body>
</html>


