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
    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border" style="height: 523px;">
                <div class="p-4">
                    <div class="flex justify-between">
                        <div>
                            <h4>Data Return Rusak</h4>
                        </div>
                        <div>
                            <a href="{{ route('return-rusak.create') }}" class="bg-green text-white py-2 px-4 rounded shadow-lg focus:outline-none openModal">
                            Tambah Data</a>
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
                                        <th class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th>
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
                                                    <a href="{{ route('return-rusak.show',$item->id_detail_return) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                        <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-60 ">
                                                        {{ $item->keterangan }}
                                                        </span>
                                                    </a>
                                            </td>
                                            <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                        <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-60">

                                                            {{ $item->status_return }}</span>

                                                </span>
                                            </td>
                                            <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                @if ($item->status_penerimaan == 'Y')
                                                    <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Ya</span>
                                                @elseif ($item->status_penerimaan == 'T')
                                                    <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Tidak</span>
                                                @else
                                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Pending</span>
                                                @endif
                                            </td>

                                            <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <div class="flex items-center justify-center">
                                                    <a href="{{ route('return-rusak.edit',$item->id_detail_return) }}" class="bg-warning text-white py-2 px-4 rounded shadow-lg flex items-center mx-3">
                                                        <div class="font-sm">Edit</div>
                                                        <div class="content-center mx-1">
                                                            <img src="{{ asset('img/edit.svg') }}" alt="">
                                                        </div>
                                                    </a>
                                                    <button type="button" data-modal-target="hapusModal" data-modal-toggle="hapusModal" class="bg-danger text-white py-2 px-4 rounded shadow-lg flex items-center hapus-data" data-id="{{ $item->id_return }}">
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
    <script>
        // hapus data
        $('body').on('click','.hapus-data',function(e) {
            var id_user = $(this).data('id');
            $('.id_user').val(id_user);
        })
    </script>
@endpush
