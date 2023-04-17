<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>futbolPlayers</title>

    <!--favicon -->

    <!-- estilos -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

</head>
<body>
    <!-- header -->

    <!-- nav -->
    <nav class="navbar">
        <a class="navbar-brand" href="{{ route('home.index') }}" style="text-decoration: none; color: #000;">Home</a>
    </nav>
    @yield('content')

    <!-- footer -->

    <!-- script -->
    <script src="{{ asset('js/clickCard.js') }}"></script>
    
</body>
</html>