@extends('admin.layouts.app')
@section('content')
<!-- create modal -->
@include('admin.master.user.create')
<!-- create modal -->

<div class="w-full px-6 py-6 mx-auto">
    @include('components.notifications')
    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border" style="height: 523px;">
                <div class="p-4">
                    <div class="flex justify-between">
                        <div>
                            <h4>Data User</h4>
                        </div>
                        <div>
                            <button data-modal-target="createModal" data-modal-toggle="createModal" class="bg-green text-white py-2 px-4 rounded shadow-lg focus:outline-none openModal">
                                Tambah Data</button>
                        </div>
                    </div>
                    <div>
                        <div class="p-0 overflow-x-auto mt-4">
                            <table class="items-center justify-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama User</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Username</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Level</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-t">
                                    @php $no=1; @endphp
                                    @foreach($user as $row)
                                    <tr>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2">
                                                <div class="my-auto">
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ $no++}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-sm font-semibold leading-normal dark:text-white dark:opacity-60">{{ $row->nama_user }}</p>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-60">{{ $row->username }}</span>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-60">{{ $row->level }}</span>
                                        </td>
                                        <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <div class="flex items-center justify-center">
                                                <button data-modal-target="editModal{{ $row->id_user}}" data-modal-toggle="editModal {{ $row->id_user}}" class="bg-warning text-white py-2 px-4 rounded shadow-lg flex items-center mx-3">
                                                    <div class="font-sm">Edit</div>
                                                    <div class="content-center mx-1">
                                                        <img src="{{ asset('img/edit.svg') }}" alt="">
                                                    </div>
                                                </button>
                                                <button data-modal-target="hapusModal{{ $row->id_user}}" data-modal-toggle="hapusModal{{ $row->id_user}}" class="bg-danger text-white py-2 px-4 rounded shadow-lg flex items-center">
                                                    <div class="font-sm">Hapus</div>
                                                    <div class="content-center mx-1">
                                                        <img src="{{ asset('img/hapus.svg') }}" alt="">
                                                    </div>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    const passwordToggle = document.querySelector('.js-password-toggle')

    passwordToggle.addEventListener('change', function() {
    const password = document.querySelector('.js-password'),
        passwordLabel = document.querySelector('.js-password-label')

    if (password.type === 'password') {
        password.type = 'text'
        passwordLabel.innerHTML = 'hide'
    } else {
        password.type = 'password'
        passwordLabel.innerHTML = 'show'
    }

    password.focus()
    })

</script>
@endpush
