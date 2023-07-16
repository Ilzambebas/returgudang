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
        <div id="logoutModal" tabrusak="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" style="z-index: 15;">
                    <!-- Modal header -->
                    <div class="flex items-start justify-center p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Apakah anda yakin ingin keluar?
                        </h3>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <input type="hidden" value="" class="id_user" name="id_user" id="id_user" required />
                        <div class="flex items-center justify-center p-5">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3"/>
                            </svg>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center justify-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <div class="">
                            <button data-modal-hide="defaultModal" type="button" class="bg-danger text-white py-2 px-4 rounded shadow-lg flex items-start mx-3">Tidak</button>
                        </div>
                        <div class="">
                            <a
                            data-modal-hide="defaultModal"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            class="bg-warning text-white py-2 px-4 rounded shadow-lg flex items-start mx-3">Yakin</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
