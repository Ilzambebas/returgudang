<aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-10 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
    <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden" sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700 text-center" href="{{url('/dashboard')}}" target="_blank">
            <img src="{{asset('assets')}}/img/logo-ct-dark.png" class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8" alt="main_logo" />
            <img src="{{asset('assets')}}/img/logo-ct.png" class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8" alt="main_logo" />
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">
                <span>PLN NP</span>
                <p>Gudang UJTA</p>
            </span>
        </a>
    </div>

    <hr class="h-px mt-3 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

    <div class="items-center block w-auto max-h-screen overflow-auto grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
            <li class="mt-0.5 w-full">
                <a class="py-2.7 {{ Request::segment(1) == 'dashboard' ? 'bg-blue-500/13 font-semibold' : '' }} dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 text-slate-700 transition-colors" href="{{url('/dashboard')}}">
                    <div class="mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.5 0C5.625 0 0 5.43103 0 12.069C0 18.7069 5.625 24.1379 12.5 24.1379C19.375 24.1379 25 18.7069 25 12.069C25 5.43103 19.375 0 12.5 0ZM12.5 3.01724C17.6875 3.01724 21.875 7.06035 21.875 12.069C21.875 17.0776 17.6875 21.1207 12.5 21.1207C7.3125 21.1207 3.125 17.0776 3.125 12.069C3.125 7.06035 7.3125 3.01724 12.5 3.01724ZM12.5 6.03448C11.625 6.03448 10.9375 6.69828 10.9375 7.5431C10.9375 8.38793 11.625 9.05172 12.5 9.05172C13.375 9.05172 14.0625 8.38793 14.0625 7.5431C14.0625 6.69828 13.375 6.03448 12.5 6.03448ZM7.3125 9.05172C7.05376 9.13194 6.82116 9.27592 6.63766 9.46945C6.45417 9.66298 6.32612 9.89938 6.26617 10.1553C6.20622 10.4112 6.21643 10.6778 6.2958 10.9287C6.37517 11.1797 6.52095 11.4063 6.71875 11.5862L9.5625 14.3319C9.5 14.5733 9.375 14.8147 9.375 15.0862C9.375 16.7457 10.7812 18.1034 12.5 18.1034C14.2188 18.1034 15.625 16.7457 15.625 15.0862C15.625 13.4267 14.2188 12.069 12.5 12.069C12.2188 12.069 11.9688 12.1897 11.7188 12.25L8.875 9.50431C8.70402 9.32161 8.48932 9.18209 8.24964 9.09794C8.00996 9.01379 7.75259 8.98757 7.5 9.02155C7.43756 9.01793 7.37494 9.01793 7.3125 9.02155V9.05172ZM17.1875 9.05172C16.3125 9.05172 15.625 9.71552 15.625 10.5603C15.625 11.4052 16.3125 12.069 17.1875 12.069C18.0625 12.069 18.75 11.4052 18.75 10.5603C18.75 9.71552 18.0625 9.05172 17.1875 9.05172Z" fill="#E35E5E"/>
                        </svg>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a class="{{ Request::segment(1) == 'user' || Request::segment(1) == 'return' || Request::segment(2) == 'return.rusak' || Request::segment(3) == 'return.repair' ? 'bg-blue-500/13 font-semibold' : '' }} dark:text-white rounded-lg dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors cursor-pointer" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <div class="mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0V7.5H7.5V0H0ZM10 0V2.5H20V0H10ZM10 5V7.5H17.5V5H10ZM0 10V17.5H7.5V10H0ZM10 10V12.5H20V10H10ZM10 15V17.5H17.5V15H10Z" fill="#42BE8A"/>
                        </svg>
                    </div>
                    <span class="flex-1 ml-1 text-left whitespace-nowrap" sidebar-toggle-item>Main</span>
                </a>
                <ul id="dropdown-example" class="{{ Request::segment(1) == 'return' || Request::segment(2) == 'return.rusak' || Request::segment(3) == 'return.repair' ? '' : 'hidden' }}  py-2 space-y-2">
                    <li class="px-3">
                        <a href="{{ route('return.index') }}" class="flex py-2 items-center w-full text-gray-900 transition duration-75 rounded-lg group hover:bg-blue-100 dark:text-white dark:hover:bg-gray-700 {{ Request::segment(1) == 'return' ? 'bg-blue-500/13 font-bold' : '' }}" style="padding-left: 68px; font-size: 10pt;">Data Return</a>
                    </li>
                    <li class="px-3">
                        <a href="#" class="flex py-2 items-center w-full text-gray-900 transition duration-75 rounded-lg group hover:bg-blue-100 dark:text-white dark:hover:bg-gray-700" style="padding-left: 68px; font-size: 10pt;">Return Layak Pakai</a>
                    </li>
                    <li class="px-3">
                        <a href="{{ route('return.repair') }}" class="flex py-2 items-center w-full text-gray-900 transition duration-75 rounded-lg group hover:bg-blue-100 dark:text-white dark:hover:bg-gray-700 {{ Request::segment(3) == 'return.repair' ? 'bg-blue-500/13 font-bold' : '' }}" style="padding-left: 68px; font-size: 10pt;">Return Layak Repair</a>
                    </li>
                    <li class="px-3">
                        <a href="{{ route('return.rusak') }}" class="flex py-2 items-center w-full text-gray-900 transition duration-75 rounded-lg group hover:bg-blue-100 dark:text-white dark:hover:bg-gray-700 {{ Request::segment(2) == 'return.rusak' ? 'bg-blue-500/13 font-bold' : '' }}" style="padding-left: 68px; font-size: 10pt;">Return Rusak</a>
                    </li>
                </ul>
             </li>
             <li class="mt-0.5 w-full">
             <span class="flex-1 ml-1 text-left whitespace-nowrap" sidebar-toggle-item>Data Master</span>
                <a class="dark:text-white rounded-lg dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors cursor-pointer" aria-controls="dropdown-examplee" data-collapse-toggle="dropdown-examplee">
                <div class="mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0V7.5H7.5V0H0ZM10 0V2.5H20V0H10ZM10 5V7.5H17.5V5H10ZM0 10V17.5H7.5V10H0ZM10 10V12.5H20V10H10ZM10 15V17.5H17.5V15H10Z" fill="#42BE8A"/>
                        </svg>
                    </div>
                    <span class="flex-1 ml-1 text-left whitespace-nowrap" sidebar-toggle-item>User</span>
                </a>
                <ul id="dropdown-examplee" class="{{ Request::segment(0) == 'user' ? '' : 'hidden' }} py-2 space-y-2">
                <li class="px-4">
                        <a href="{{ route('user.index') }}" class="flex py-2 items-center w-full text-gray-900 transition duration-75 rounded-lg group hover:bg-blue-100 dark:text-white dark:hover:bg-gray-700 {{ Request::segment(0) == 'user' ? 'bg-blue-500/13 font-bold' : '' }}" style="padding-left: 68px; font-size: 10pt;">List</a>
                    </li>
                    </li>
                </ul>
            </li>
            <li class="mt-0.5 w-full">
                <a class="dark:text-white rounded-lg dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors cursor-pointer" aria-controls="dropdownn-example" data-collapse-toggle="dropdownn-example">
                    <div class="mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0V7.5H7.5V0H0ZM10 0V2.5H20V0H10ZM10 5V7.5H17.5V5H10ZM0 10V17.5H7.5V10H0ZM10 10V12.5H20V10H10ZM10 15V17.5H17.5V15H10Z" fill="#42BE8A"/>
                        </svg>
                    </div>
                    <span class="flex-1 ml-1 text-left whitespace-nowrap" sidebar-toggle-item>Barang</span>
                </a>
                <ul id="dropdownn-example" class="{{Request::segment(1) == 'Barang' ? '' : 'hidden' }} py-2 space-y-2">
                <li class="px-4">
                        <a href="{{ route('barang.barang') }}" class="flex py-2 items-center w-full text-gray-900 transition duration-75 rounded-lg group hover:bg-blue-100 dark:text-white dark:hover:bg-gray-700  {{ Request::segment(1) == 'Barang' ? 'bg-blue-500/13 font-bold' : '' }}" style="padding-left: 68px; font-size: 10pt;">List</a>
                    </li>
                    </li>
                </ul>
            </li>
            <li class="mt-0.5 w-full">
                <a class="dark:text-white rounded-lg dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors cursor-pointer" aria-controls="dropdownn-examplee" data-collapse-toggle="dropdownn-examplee">
                    <div class="mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0V7.5H7.5V0H0ZM10 0V2.5H20V0H10ZM10 5V7.5H17.5V5H10ZM0 10V17.5H7.5V10H0ZM10 10V12.5H20V10H10ZM10 15V17.5H17.5V15H10Z" fill="#42BE8A"/>
                        </svg>
                    </div>
                    <span class="flex-1 ml-1 text-left whitespace-nowrap" sidebar-toggle-item>Satuan</span>
                </a>
                <ul id="dropdownn-examplee" class="{{Request::segment(2) == 'satuan' ? '' : 'hidden' }} py-2 space-y-2">
                <li class="px-4">
                        <a href="{{ route('satuan.satuan') }}" class="flex py-2 items-center w-full text-gray-900 transition duration-75 rounded-lg group hover:bg-blue-100 dark:text-white dark:hover:bg-gray-700  {{ Request::segment(2) == 'Satuan' ? 'bg-blue-500/13 font-bold' : '' }}" style="padding-left: 68px; font-size: 10pt;">List</a>
                    </li>
                    </li>
                </ul>
            </li>
            <li class="mt-0.5 w-full">
                <a class="dark:text-white rounded-lg dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors cursor-pointer" aria-controls="dropdownn-examplle" data-collapse-toggle="dropdownn-examplle">
                    <div class="mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0V7.5H7.5V0H0ZM10 0V2.5H20V0H10ZM10 5V7.5H17.5V5H10ZM0 10V17.5H7.5V10H0ZM10 10V12.5H20V10H10ZM10 15V17.5H17.5V15H10Z" fill="#42BE8A"/>
                        </svg>
                    </div>
                    <span class="flex-1 ml-1 text-left whitespace-nowrap" sidebar-toggle-item>Bidang</span>
                </a>
                <ul id="dropdownn-examplle" class="{{Request::segment(3) == 'Bidang' ? '' : 'hidden' }} py-2 space-y-2">
                <li class="px-4">
                        <a href="{{ route('bidang.bidang') }}" class="flex py-2 items-center w-full text-gray-900 transition duration-75 rounded-lg group hover:bg-blue-100 dark:text-white dark:hover:bg-gray-700 {{ Request::segment(3) == 'Bidang' ? 'bg-blue-500/13 font-bold' : '' }}" style="padding-left: 68px; font-size: 10pt;">List</a>
                    </li>
                    </li>
                </ul>
            </li>
            <li class="mt-0.5 w-full">
                <a class="dark:text-white rounded-lg dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors cursor-pointer" aria-controls="dropdownnn-examplee" data-collapse-toggle="dropdownnn-examplee">
                    <div class="mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0V7.5H7.5V0H0ZM10 0V2.5H20V0H10ZM10 5V7.5H17.5V5H10ZM0 10V17.5H7.5V10H0ZM10 10V12.5H20V10H10ZM10 15V17.5H17.5V15H10Z" fill="#42BE8A"/>
                        </svg>
                    </div>
                    <span class="flex-1 ml-1 text-left whitespace-nowrap" sidebar-toggle-item>Jenis</span>
                </a>
                <ul id="dropdownnn-examplee" class="{{Request::segment(4) == 'Jenis' ? '' : 'hidden' }} py-2 space-y-2">
                <li class="px-4">
                        <a href="{{ route('jenis.jenis') }}" class="flex py-2 items-center w-full text-gray-900 transition duration-75 rounded-lg group hover:bg-blue-100 dark:text-white dark:hover:bg-gray-700 {{ Request::segment(4) == 'Jenis' ? 'bg-blue-500/13 font-bold' : '' }}" style="padding-left: 68px; font-size: 10pt;">List</a>
                    </li>
                    </li>
                </ul>
            </li>
            <li class="mt-0.5 w-full">
                <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{url('/report')}}">
                    <div class="mr-2 flex h-10 w-10 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0V18.2857H16V9.14286H6.85714V0H0ZM9.14286 0V6.85714H16L9.14286 0ZM2.28571 4.57143H4.57143V6.85714H2.28571V4.57143ZM2.28571 9.14286H4.57143V11.4286H2.28571V9.14286ZM2.28571 13.7143H11.4286V16H2.28571V13.7143Z" fill="#5E72E3"/>
                        </svg>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Laporan</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
