<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}" />
        <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}" />
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Retur Barang</title>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

        <link href="{{asset('assets')}}/css/nucleo-icons.css" rel="stylesheet" />
        <link href="{{asset('assets')}}/css/nucleo-svg.css" rel="stylesheet" />

        <script src="https://unpkg.com/@popperjs/core@2"></script>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css"  rel="stylesheet" />
        <link href="{{asset('assets')}}/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" />
    </head>

    <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
        <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
        @include('admin.components.sidebar')
        <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
            @include('admin.components.navbar')

            @yield('content')
        </main>
    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="{{asset('assets')}}/js/plugins/chartjs.min.js" async></script>
    <script src="{{asset('assets')}}/js/plugins/perfect-scrollbar.min.js" async></script>
    <script src="{{asset('assets')}}/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>
    @stack('js')
</html>
