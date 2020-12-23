<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Diary</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    @yield('pageCss')
</head>

<body>
    @include('commons.navbar')
    @include('commons.error_messages')
    @yield('content')
</body>

@yield('footer')

</html>