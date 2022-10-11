<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @vite('resources/css/app.css')
</head>

<body class="antialiased">
    <div class="content m-w-[1275px] mx-auto">
        @yield('content')
    </div>
</body>

</html>

