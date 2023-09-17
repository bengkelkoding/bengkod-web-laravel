<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bengkel Koding</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/admin/images/logos/LogoUdinus.png')}}" />
</head>
<body class="overflow-x-hidden">
    <div class="min-h-[100vh] w-[100vw] flex flex-col relative bg-gray ">
        @include('layouts.navbarBengkod')
        <div class="w-[100%] min-h-screen">
            {{ $slot }}
        </div>
        @include('layouts.footerBengkod')
    </div>
</body>
</html>
