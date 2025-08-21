<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Admin template styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>

    <!-- Sidebar -->
    @include('admin.partials.sidebar')

    <!-- Main -->
    <div class="main-content">
        @include('admin.partials.navbar')

        <div class="container mt-4">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
