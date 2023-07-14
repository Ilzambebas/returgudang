<x-guest-layout>
    <x-auth-card>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <div class="flex flex-col md:flex-row">
            <div class="h-32 md:h-auto md:w-1/2 relative">
                <div class=" h-full">
                    <img class="absolute object-cover w-full h-full rounded-md" src="{{ asset('img/bg-login.png') }}"
                    alt="img" />
                    <div class="flex justify-center items-center h-full md:h-full">
                        <div class=" text-4xl"><img src="{{ asset('img/bg-login-2.png') }}" class="inset-0" alt=""></div>
                    </div>
                </div>
                <div class="absolute -bottom-4 -left-5 z-0 overflow-hidden hidden md:block" style="bottom: -150px; left: -150px;">
                    <img src="{{ asset('img/vektor-1.svg') }}" alt="" class="w-full h-full">
                </div>
            </div>
            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                <div class="w-full">
                    <div class="flex justify-center">
                        <div class="bg-regalBlue px-4 py-3 mt-4 mb-4 md:w-1/2 rounded-md">
                            <h1 class="font-medium leading-5 font-bold text-center text-white text-sm text-2xl">
                              Login
                            </h1>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('login') }}">

                    @csrf
                    <div>
                        <label class="block text-sm">
                            Username
                        </label>
                        <input type="text"
                            name="username"
                            class="w-full px-4 py-2 text-sm border border-blue-400 rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600"
                            placeholder="Masukkan Username" />
                    </div>
                    <div>
                        <label class="block mt-4 text-sm">
                            Password
                        </label>
                        <input
                            name="password"
                            class="w-full px-4 py-2 text-sm border border-blue-400 rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600"
                            placeholder="Masukkan Password" type="password" />
                    </div>

                    <div class="
                        flex
                        justify-center">
                        <button type="submit"
                            class="
                                block
                                inline-flex
                                rounded-full
                                items-center
                                px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white
                                transition-colors duration-150 bg-regalBlue
                                border border-transparent rounded-lg
                                active:bg-blue-600 hover:bg-blue-700
                                focus:outline-none
                                focus:shadow-outline-blue"
                            >
                            Sign In
                        </button>
                    </div>
        </form>

                    <hr class="my-8" />


                </div>
            </div>
        </div>

    </x-auth-card>

</x-guest-layout>
