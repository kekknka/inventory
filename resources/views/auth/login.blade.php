<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }} [login]</title>
    <!-- base:css -->
    @vite([
    'resources/plugins/typicons.font/font/typicons.css',
    'resources/plugins/css/vendor.bundle.base.css',
    'resources/css/vertical-layout-light/style.css'
    ])
    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="https://via.placeholder.com/310x150?text=Logo" alt="logo">
                            </div>
                            <h4>¡Hola! empecemos</h4>
                            <h6 class="font-weight-light">Inicia sesión para continuar.</h6>
                            <form method="POST" action="{{ route('log_in') }}" class="pt-3">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" name="email" id="exampleInputEmail1"
                                        placeholder="Usuario" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" name="password"
                                        id="exampleInputPassword1" placeholder="Contraseña" required>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">INICIAR SESIÓN</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    @vite([
    'resources/plugins/js/vendor.bundle.base.js',
    'resources/js/hoverable-collapse.js',
    'resources/js/template.js',
    'resources/js/settings.js',
    'resources/js/todolist.js',
    ])
    <!-- endinject -->
</body>

</html>
