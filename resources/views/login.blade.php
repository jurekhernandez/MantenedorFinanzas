<!doctype html>
<html lang="zxx">

<head>
    <!--=========================*
                Met Data
    *===========================-->
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Zare Bootstrap 4 Admin Template">

    <!--=========================*
              Page Title
    *===========================-->
    <title>Entrar en | Mantenedor Finanzas</title>

    <!--=========================*
                Favicon
    *===========================-->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">

    <!--=========================*
            Bootstrap Css
    *===========================-->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!--=========================*
              Custom CSS
    *===========================-->
    <link rel="stylesheet" href="css/style.css">

    <!--=========================*
               Owl CSS
    *===========================-->
    <link href="css/owl.carousel.min.css" rel="stylesheet" type="text/css">
    <link href="css/owl.theme.default.min.css" rel="stylesheet" type="text/css">

    <!--=========================*
            Font Awesome
    *===========================-->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!--=========================*
             Themify Icons
    *===========================-->
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">

    <!--=========================*
               Ionicons
    *===========================-->
    <link href="{{ asset('css/ionicons.min.css') }}" rel="stylesheet" />

    <!--=========================*
              EtLine Icons
    *===========================-->
    <link href="{{ asset('css/et-line.css') }}" rel="stylesheet" />

    <!--=========================*
              Feather Icons
    *===========================-->
    <link href="{{ asset('css/feather.css') }}" rel="stylesheet" />

    <!--=========================*
              Modernizer
    *===========================-->
    <script src="{{ asset('js/modernizr-2.8.3.min.js') }}"></script>

    <!--=========================*
               Metis Menu
    *===========================-->
    <link rel="stylesheet" href="{{ asset('css/metisMenu.css') }}">

    <!--=========================*
               Slick Menu
    *===========================-->
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}">

    <!--=========================*
            Google Fonts
    *===========================-->

    <!-- Montserrat USE: font-family: 'Montserrat', sans-serif;-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
        rel="stylesheet">

    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    @include('sweetalert::alert')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="login-bg">
                    <div class="login-overlay"></div>
                    <div class="login-left">
                        <img src="{{ asset('images/logo-login.svg') }}" alt="Logo">
                        <p>Bienvenido al mantenedor de Finanzas</p>
                        <a href="javascript:void(0);" class="btn btn-primary">Conoce mas ...</a>
                    </div>
                    <!--login-left-->
                </div>
                <!--login-bg-->
                <div class="login-form">
                    <form action="login" method="post">
                        @csrf
                        <div class="login-form-body">
                            <div class="form-gp">
                                <label for="exampleInputEmail1">Correo</label>
                                <input type="email" id="correo" name="correo"
                                    class="@error('correo') is-invalid @enderror" value="jurek.hernandez@gmail.com">
                                <i class="ti-email"></i>

                                @error('correo')
                                <div class="alert alert-danger">{{ $message }} </div>
                                @enderror
                            </div>

                            <div class="form-gp">
                                <label for="exampleInputPassword1">Clave</label>
                                <input type="password" id="password" name="password"
                                    class="@error('password') is-invalid @enderror" value="jurek">
                                <i class="ti-lock"></i>

                                @error('password')
                                <div class="alert alert-danger">{{ $message }} </div>
                                @enderror
                            </div>


                            <div class="row mb-4 rmber-area">
                                <div class="col-6">

                                </div>
                                <div class="col-6 text-right">
                                    <a href="#" class="text-primary">Recuperar clave</a>
                                </div>
                            </div>
                            <div class="submit-btn-area">
                                <button id="form_submit" type="submit" class="btn btn-primary">Entrar <i
                                        class="ti-arrow-right"></i></button>
                                <div class="login-other row mt-4">
                                    <div class="col-6">
                                        <a class="google-login" href="#"><span class="login_txt">Entrar con</span> <i
                                                class="fa fa-google"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <!--login-form-->

            </div>
            <!--row-->
        </div>
        <!--container-fluid-->
    </div>
    <!--wrapper-->


    <!--=========================*
            Scripts
*===========================-->

    @include("./base.js")
</body>

</html>