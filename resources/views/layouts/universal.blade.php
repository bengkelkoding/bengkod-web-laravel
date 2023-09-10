<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bengkel Koding</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="overflow-x-hidden ">
    <div class="min-h-screen w-[100vw] flex flex-col bg-gray">
        @include('layouts.navbarBengkod')
        <div class="w-[100%] min-h-[40vh]">
            {{ $slot }}
        </div>
        @include('layouts.footerBengkod')
    </div>
</body>
</html>