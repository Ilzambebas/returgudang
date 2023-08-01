@extends('admin.layouts.app')
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</script>
@endpush
@section('content')

<div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border" >
                <div class="p-4">
                    <div class="flex justify-between">
                        <div>
                            <h4>Data User</h4>
                        </div>
                    </div>
                    <div>
                        <!-- Validation Errors -->
                        <div class="py-4">
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        </div>
                        <form action="{{ route('return-layak-repair.store') }}" method="POST">
                        @csrf
                        <div class="p-0 overflow-x-scroll overflow-x-auto mt-4">
                            <div class="flex flex-wrap -mx-2">
                                <div class="p-6 space-y-6">
                                    <div>
                                        <label class="block text-sm">
                                            Nama User
                                        </label>
                                        <input type="text" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" name="nama_user" placeholder="Nama Lengkap" required/>
                                    </div>
                                    <div>
                                        <label class="block text-sm">
                                            Username
                                        </label>
                                        <input type="text" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" name="username" placeholder="Username"/>
                                    </div>
                                    <div>
                                        <label class="block text-sm">
                                            Password
                                        </label>
                                        <div class="relative w-full">
                                            <div class="absolute inset-y-0 right-0 flex items-center px-2">
                                              <input class="hidden js-password-toggle" id="toggle" type="checkbox" />
                                              <label class="bg-gray-300 hover:bg-gray-400 rounded px-2 py-1 text-sm text-gray-600 font-mono cursor-pointer js-password-label" for="toggle">show</label>
                                            </div>
                                            <input id="password" class="
                                                            block mt-1 w-full js-password
                                                            placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                            type="password"
                                                            name="password"
                                                            placeholder="Masukkan password"
                                                            required autocomplete="current-password" />
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm">
                                            No HP
                                        </label>
                                        <input type="text" name="no_hp" placeholder="No HP" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" />
                                    </div>

                                    <div>
                                        <label class="block text-sm">
                                            Level
                                        </label>
                                        <select name="level"  id="level" required class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                            <option value="0" hidden="">-- Pilih Disini --</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <div class="flex justify-between">
                                        <button type="submit" class="bg-warning text-white py-2 px-4 rounded shadow-lg flex items-start mx-3">Simpan</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
