<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- description of page -->
    <title>@yield('title') - titulo </title>
    <meta name="author" content="name">
    <meta name="description" content="Web app for monitoring hives in real time">
    <meta name="keywords" content="super ">

    <!-- Google Font/Icons CDN -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,1,0" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles()
    </head>
    <body class="antialiased">

        <div class="flex flex-col min-h-dvh">

            @yield('content')

        </div>

        @livewireScripts()
    </body>

    </html>
