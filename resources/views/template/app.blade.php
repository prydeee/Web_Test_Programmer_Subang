<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title>
        E-Tiket - @yield('title')
    </title>
    
    @include('template.partials._style')
</head>

<body class="g-sidenav-show  bg-gray-100">
    @include('template.partials._sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        
        @include('template.partials._navbar')
        <div class="container-fluid py-4">
            @yield('content')

            @include('template.partials._footer')
        </div>
    </main>
    <!--   Core JS Files   -->
    @include('template.partials._script')
</body>

</html>
