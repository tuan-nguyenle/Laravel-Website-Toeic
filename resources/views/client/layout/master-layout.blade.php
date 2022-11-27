<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="English 4 Future">
    <meta name="description" content="English 4 Future">
    <meta name="robots" content="noindex,nofollow">
    <title>{{ $title }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-32x32.png') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('mdb5/css/all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('mdb5/css/mdb.min.css') }}" rel="stylesheet" />
    @yield('css')
</head>

<body>
    @yield('content')
    <script type="text/javascript" src="{{ asset('mdb5/js/mdb.min.js') }}"></script>
    @yield('js')
</body>

</html>
