<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGN IN</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ url('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('backend/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
    .btn-primary {
        background-color: #20598f;
        font-size: 14px;
    }


    /* .text-info text-center {
        background-text: #08fd76;
    } */
</style>
{{-- <body class="hold-transition login-page"> --}}

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="container-fluid rounded-lg"
                        style="background-image: url('../assets/img/avatar/tch.jpg'); background-repeat: no-repeat; background-size: cover; overflow-hidden; width: 22rem;"
                        id="boxPassword">
                        </br>
                        <div class="d-flex justify-content-center">
                        </div>
                        <br>
                        <br>
                        <div class="card-body card-warning login-card-body">

                            <h3 class="text-center ">
                                <font color="SteelBlue"><b>POKAYOKE </b></font><span
                                    class="text-warning text-center"><b>DELIVERY</b></span>
                            </h3>
                            <br>
                            <form action="/postlogin" method="post">
                                {{ csrf_field() }}
                                <div class="input-group mb-3">
                                    <input type="text" name="user" class="form-control" placeholder="User"
                                        class="form-control" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-duotone fa-user"></span>
                                            {{-- <i class="fa-sharp fa-solid fa-circle-user"></i> --}}
                                            {{-- <span class="fa-light fa-user-lock"></span> --}}
                                        </div>
                                    </div>

                                </div>
                                {{-- @if (Session::has('message'))
                                    <div class="alert ">{{ Session::get('message') }}</div>
                                @endif --}}
                                <div class="input-group mb-3">
                                    {{-- <label>PASSWORD</label> --}}
                                    <input type="password" name="pass" class="form-control" placeholder="Password"
                                        class="form-control" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                @if (Session::has('message'))
                                    <span class="text-danger">{{ Session::get('message') }}</span>
                                @endif
                                <br>
                                @if (Session::has('error'))
                                    <span class="text-danger">{{ Session::get('error') }}</span>
                                @endif
                                <div class="row">
                                    <div class="col-8">
                                        <div class="icheck-primary">
                                            <input type="checkbox" id="remember">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <!-- /.col -->

                                <br>
                                <div class="col-4">
                                    <button type="submit" class="btn-center btn btn-primary btn-block">SIGN IN</button>
                                </div>
                            </form>

                            {{-- </div> --}}
                        </div>
                    </div>
        </section>
    </div>
    <br>
    <br>
    <br>
    <div class="simple-footer text-dark text-center">
        Copyright &copy; {{ date('Y') }}
    </div>
    {{-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> --}}
    {{-- </div> --}}
    <!-- /.login-card-body -->
    {{-- </div> --}}
    {{-- </div> --}}
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ url('backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('backend/dist/js/adminlte.min.js') }}"></script>

</body>

</html>
