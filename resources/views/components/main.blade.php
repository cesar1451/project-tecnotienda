<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/usuarios.css') }}">
    <!-- component -->
    <link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
    <script src="{{ asset('js/app.js') }}"></script>
    <title> {{ $title ?? 'TecnoTienda' }} </title>
</head>
<body>
    {{ $slot }}
</body>
<footer class="bg-gradient-to-r from-gray-100 via-[#bce1ff] to-gray-100">
    <x-footer></x-footer>
</footer>
</html>