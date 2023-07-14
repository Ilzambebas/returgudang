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
                            <h4>Data Return</h4>
                        </div>
                    </div>
                    <div>
                        <!-- Validation Errors -->
                        <div class="py-4">
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        </div>
                        <div class="p-0 overflow-x-scroll overflow-x-auto mt-4">
                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full md:w-1/2 px-2 mb-4">
                                    <label class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">
                                        NO PO/ Stock Code
                                    </label>
                                    <input
                                        readonly
                                        name="no_po"
                                        type="text"
                                        value="{{ $data->no_po }}"
                                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Ketik disini" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mb-4">
                                    <label class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">
                                        Jumlah
                                    </label>
                                    <input
                                        name="jumlah"
                                        type="text"
                                        readonly
                                        value="{{ $data->jumlah }}"
                                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Ketik disini" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mb-4">
                                    <label class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">
                                        PIC Yang Ambil
                                    </label>
                                    <input
                                        name="pic"
                                        value="{{ $data->nama_pic }}"
                                        type="text"
                                        readonly
                                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Ketik disini" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mb-4">
                                    <label class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">
                                        Nomor Pekerjaan
                                    </label>
                                    <input
                                        name="no_pekerjaan"
                                        type="text"
                                        readonly
                                        value="{{ $data->no_pekerjaan }}"
                                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Ketik disini" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mb-4">
                                    <label class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">
                                        Bidang
                                    </label>
                                    <select readonly disabled name="bidang_id" id="jenis_id" required class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 jenis_id" >
                                        @foreach ($barang as $item)
                                            <option value="{{ $item->id_bidang }}" {{ $data->id_bidang == $item->id_bidang ? 'selected' : ''}}>{{ ucwords($item->nama_bidang) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full md:w-1/2 px-2 mb-4">
                                    <label class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">
                                        Jenis Material
                                    </label>
                                    <select disabled readonly name="jenis_id"  id="jenis_id" required class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 jenis_id" >
                                        @foreach ($jenis as $itemJenis)
                                            <option value="{{ $itemJenis->id_jenis }}" {{ $itemJenis->id_jenis == $data->id_jenis ? 'selected' : '' }}>{{ ucwords($itemJenis->nama_jenis) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full md:w-full px-2 mb-4">
                                    <label class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">
                                        Deskripsi
                                    </label>
                                    <input
                                        name="no_pekerjaan"
                                        type="text"
                                        readonly
                                        value="{{ $data->keterangan }}"
                                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Ketik disini" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
