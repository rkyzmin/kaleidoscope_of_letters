<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', config('app.name', 'words'))</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/app.css') }}" />

</head>

<body class="background-color: #ffe1a5;">
    <div class="wrapper">
        <div class="header" style="height: 60px;">
            <a href="{{ route('index') }}"><image id="back" width="30" src="{{ asset('assets/images/icons/back-svgrepo-com.svg') }}"/></a>
        </div>
        @yield('content')
        <div class="footer" style="height: 100px;"></div>
    </div>


    <!-- <script src="{{ asset('assets/js/app.min.js') }}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- <script src="{{ asset('assets/js/app.js') }}"></script> -->
    @yield('script')
</body>

</html>