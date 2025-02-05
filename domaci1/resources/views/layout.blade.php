<!doctype html>
<html>
<head>
    <title>@yield('naslovStranice')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    @include("navigation")

<main class="container mt-4">
    @yield("sadrzajStranice")
</main>

    @include("footer")


</body>
</html>
