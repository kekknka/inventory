<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard [Orders]</title>
    <!--'resources/plugins/typicons.font/font/typicons.css',-->
    @vite([
    'resources/css/vertical-layout-light/style.css'
    ])
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        @include('common.header')
        <div class="container-fluid page-body-wrapper">
            @include('common.navbar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                @include('common.footer')
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script defer="" src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
    @vite([
        'resources/js/hoverable-collapse.js',
        'resources/js/template.js',
        'resources/js/settings.js',
        'resources/js/todolist.js',
    ])
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</body>

</html>
