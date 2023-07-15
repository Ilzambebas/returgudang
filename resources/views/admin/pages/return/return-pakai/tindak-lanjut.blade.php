@extends('admin.layouts.app')
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</script>
@endpush
@section('content')

<div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full md:w-1/2 px-3 mt-0 mb-6 lg:mb-0 lg:flex-none">
            <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" >
                <div class="p-4">
                    <div class="">
                        <div>
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Data Return Rusak</h5>
                            <hr class="w-full h-px my-4 bg-gray-400 border-0 dark:bg-gray-900">
                        </div>
                    </div>
                    <div>
                        <!-- Validation Errors -->
                        <div class="p-0 overflow-x-scroll overflow-x-auto mt-4">
                            <div class="flex flex-wrap -mx-2">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr class="">
                                            <th width="20%" class="px-6 py-4 text-gray-900 whitespace-nowrap bg-gray-50 dark:bg-gray-800 dark:text-white dark:bg-gray-400">NO PO/ Stock Code</th>
                                            <td width="1%">:</td>
                                            <td>{{ $data->no_po }}</td>
                                        </tr>
                                        <tr>
                                            <th width="20%" class="px-6 py-4 text-gray-900 whitespace-nowrap bg-gray-50 dark:bg-gray-800 dark:text-white dark:bg-gray-400">Jumlah</th>
                                            <td width="1%">:</td>
                                            <td>{{ $data->jumlah }}</td>
                                        </tr>
                                        <tr>
                                            <th width="20%" class="px-6 py-4 text-gray-900 whitespace-nowrap bg-gray-50 dark:bg-gray-800 dark:text-white dark:bg-gray-400">PIC Yang Diambil</th>
                                            <td width="1%">:</td>
                                            <td>{{ $data->nama_pic }}</td>
                                        </tr>
                                        <tr>
                                            <th width="20%" class="px-6 py-4 text-gray-900 whitespace-nowrap bg-gray-50 dark:bg-gray-800 dark:text-white dark:bg-gray-400">Bidang</th>
                                            <td width="1%">:</td>
                                            <td>{{ $data->nama_bidang }}</td>
                                        </tr>
                                        <tr>
                                            <th width="20%" class="px-6 py-4 text-gray-900 whitespace-nowrap bg-gray-50 dark:bg-gray-800 dark:text-white dark:bg-gray-400">Jenis Material</th>
                                            <td width="1%">:</td>
                                            <td>{{ $data->nama_jenis }}</td>
                                        </tr>
                                        <tr>
                                            <th width="20%" class="px-6 py-4 text-gray-900 whitespace-nowrap bg-gray-50 dark:bg-gray-800 dark:text-white dark:bg-gray-400">Deskripsi</th>
                                            <td width="1%">:</td>
                                            <td>{{ $data->keterangan }}</td>
                                        </tr>
                                        <tr>
                                            <th width="20%" class="px-6 py-4 text-gray-900 whitespace-nowrap bg-gray-50 dark:bg-gray-800 dark:text-white dark:bg-gray-400">Tgl Pengembalian</th>
                                            <td width="1%">:</td>
                                            <td>{{ \Carbon\Carbon::parse($data->tgl_pengembalian)->translatedFormat('d-F-Y') }}</td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/2 px-3 mt-0 mb-6 lg:mb-0 lg:flex-none">
            <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 " >
                <div class="p-4">
                    <div class="">
                        <div>
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Proses Tindak Lanjut</h5>
                            <hr class="w-full h-px my-4 bg-gray-400 border-0 dark:bg-gray-900">
                        </div>
                    </div>
                    <div>
                        <div class="p-0 overflow-x-scroll overflow-x-auto mt-4">
                            <form action="{{ route('return-layak-pakai.tindaklanjutpost') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="" value="{{ $data->id_detail_return }}">
                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full md:w-full px-2 mb-4">
                                    <div class="mb-6">
                                        <label
                                            for="email"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keperluan</label>
                                        <input
                                            type="text"
                                            id="email"
                                            name="keperluan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                                dark:focus:border-blue-500"
                                            placeholder="Masukkan Keperluan"
                                            required>
                                    </div>
                                    <div class="mb-6">
                                        <label
                                            for="email"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No BON</label>
                                        <input
                                            type="text"
                                            id="email"
                                            name="no_bon"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                                dark:focus:border-blue-500"
                                            placeholder="Masukkan No BON"
                                            required>
                                    </div>
                                    <div class="mb-6">
                                        <label
                                            for="email"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tgl BON</label>
                                            <div class="relative w-full">
                                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none px-2">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                    </svg>
                                                </div>
                                                <input
                                                        name="tgl_bon"
                                                        datepicker
                                                        type="text"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tgl BON">
                                            </div>
                                    </div>
                                    <div class="mb-6">
                                        <label
                                            for="email"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status Material</label>
                                        <input
                                            type="text"
                                            id="email"
                                            name="status_material"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                                dark:focus:border-blue-500"
                                            placeholder="Masukkan Status Material"
                                            required>
                                    </div>
                                    <div class="flex flex-wrap">
                                        <div class="w-full md:w-1/2">
                                            <div class="mb-6">
                                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satuan</label>
                                                <select name="satuan" id="jenis_id" required class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 jenis_id" >
                                                    @foreach ($satuan as $item)
                                                        <option value="{{ $item->id_satuan }}">{{ ucwords($item->nama_satuan) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="w-full md:w-1/2 px-3">
                                            <div class="mb-6">
                                                <label
                                                    for="email"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat/KG</label>
                                                <input
                                                    type="text"
                                                    id="email"
                                                    name="berat"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                                        dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                                        dark:focus:border-blue-500"
                                                    placeholder="Masukkan Berat/KG"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-6">
                                        <label
                                            for="email"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi Penyimpanan</label>
                                        <input
                                            type="text"
                                            id="email"
                                            name="lokasi_penyimpanan"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                                dark:focus:border-blue-500"
                                            placeholder="Masukkan Nama Lokasi Penyimpanan"
                                            required>
                                    </div>
                                    <div class="mb-6">

                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload file</label>
                                        <input
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg
                                                cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700
                                                dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help"
                                                id="user_avatar"
                                                name="file"
                                                type="file">
                                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Masukkan Lokasi Penyimpanan</div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>

                    <button type="submit" class="bg-warning text-white py-2 px-5 rounded shadow-lg flex items-start mx-4">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/datepicker.min.js"></script>

@endpush
