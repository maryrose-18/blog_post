<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Post</title>

    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{asset('css/navbar.css')}}" rel="stylesheet">
    @yield('custom_css')
</head>
<body class="my-body">
    <div class="content-container">
        @yield('content')
    </div>

    <script> const _TOKEN = "{{csrf_token()}}"; </script>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>
    
    <!-- <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script> -->
    
    @yield('custom_js')
    
</body>
</html>