@extends('admin.layouts.app')
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</script>
@endpush
@section('content')

<!-- delete modal -->
<div id="hapusModal" tabrusak="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" style="z-index: 15;">
            <!-- Modal header -->
            <div class="flex items-start justify-center p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Apakah anda yakin?
                </h3>
            </div>
            <!-- Modal body -->
            <form method="POST" enctype="multipart/form-data" action="{{ route('return-rusak.destroyData') }}">
                @csrf
            <div class="p-6 space-y-6">
                <input type="hidden" value="" class="id_user" name="id_user" id="id_user" required />
                <div class="flex items-center justify-center p-5">
                    <img src="{{ asset('img/hapus-modal.svg') }}" alt="">
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center justify-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <div class="">
                    <button data-modal-hide="defaultModal" type="button" class="bg-danger text-white py-2 px-4 rounded shadow-lg flex items-start mx-3">Tidak</button>
                </div>
                <div class="">
                    <button data-modal-hide="defaultModal" type="submit" class="bg-warning text-white py-2 px-4 rounded shadow-lg flex items-start mx-3">Yakin</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- delete modal -->
<div class="w-full px-6 py-6 mx-auto">
    @include('components.notifications')

    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border" style="height: 523px;">
                <div class="p-4">
                    <div class="flex justify-between">
                        <div>
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Data Return Rusak</h5>
                        </div>
                        <div>
                            @if (Auth::user()->level != 'admin')
                                <a href="{{ route('return-rusak.create') }}" class="bg-green text-white py-2 px-4 rounded shadow-lg focus:outline-none openModal">
                                Tambah Data</a>
                            @endif
                        </div>
                    </div>
                    <div>
                        <div class="p-0 overflow-x-scroll overflow-x-auto mt-4">
                            <table class="items-center justify-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Pengembalian</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Deskripsi</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status Penerimaan</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            @if (Auth::user()->level == 'admin')
                                                Action
                                            @else
                                                Nama PIC
                                            @endif
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="border-t">
                                    @foreach ($data as $item)
                                        <tr>
                                            <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <div class="flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ $loop->iteration }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <p class="mb-0 text-sm font-semibold leading-normal dark:text-white dark:opacity-60">{{ \Carbon\Carbon::parse($item->tgl_pengembalian)->translatedFormat('d-F-Y') }}</p>
                                            </td>
                                            <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-60 ">
                                                {{ $item->keterangan }}
                                                </span>
                                            </td>
                                            <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                        <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-60">

                                                            {{ $item->status_return }}</span>

                                                </span>
                                            </td>
                                            <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                @if ($item->status_penerimaan == 'Y')
                                                    @if (Auth::user()->level == 'admin')
                                                        @if ($item->keperluan != NULL)
                                                            <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Selesai Tindak Lanjut</span>
                                                        @else
                                                            <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300"><a href="{{ route('return-rusak.tindaklanjut',$item->id_detail_return) }}">Tindak Lanjut</a></span>
                                                        @endif
                                                    @else
                                                        <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Diterima</span>

                                                    @endif
                                                @elseif ($item->status_penerimaan == 'T')
                                                    <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Ditolak</span>
                                                @else
                                                    @if (Auth::user()->level == 'admin')
                                                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300"><a href="{{ route('return-rusak.prosesPengecekan',$item->id_detail_return) }}">Proses Pengecekan</a></span>
                                                    @else
                                                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Pending</span>

                                                    @endif
                                                @endif
                                            </td>
                                            <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                @if (Auth::user()->level == 'admin')
                                                <div class="inline-flex rounded-md shadow-sm" role="group">
                                                    <a href="{{ route('return-rusak.show',$item->id_detail_return) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                                        <svg class="w-3 h-3 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">     <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">       <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>       <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z"/>     </g>   </svg>
                                                        Detail
                                                    </a>
                                                    <a href="{{ route('return-rusak.edit',$item->id_detail_return) }}"class="  inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-yellow-300 border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                                                        <svg class="w-3 h-3 mr-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279"/>
                                                        </svg>
                                                      Edit
                                                    </a>
                                                    <button
                                                        type="button"
                                                        data-modal-target="hapusModal"
                                                        data-modal-toggle="hapusModal"
                                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-danger border border-gray-200 rounded-r-md hover:bg-gray-100
                                                        hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600
                                                        dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white hapus-data"
                                                        data-id="{{ $item->id_return }}">
                                                        <svg class="w-3 h-3 mr-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                                        </svg>
                                                      Hapus
                                                    </button>
                                                </div>
                                                @else
                                                    {{ $item->nama_pic }}

                                                @endif
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
    <script>
        // hapus data
        $('body').on('click','.hapus-data',function(e) {
            var id_user = $(this).data('id');
            $('.id_user').val(id_user);
        })
    </script>
@endpush
