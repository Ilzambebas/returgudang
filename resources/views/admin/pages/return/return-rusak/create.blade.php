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
                        <form action="{{ route('return-rusak.store') }}" method="POST">
                        @csrf
                        <div class="p-0 overflow-x-scroll overflow-x-auto mt-4">
                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full md:w-1/2 px-2 mb-4">
                                    <label class="block text-sm">
                                        NO PO/ Stock Code
                                    </label>
                                    <input
                                        name="no_po"
                                        type="text"
                                        class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                        placeholder="Ketik disini" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mb-4">
                                    <label class="block text-sm">
                                        Jumlah
                                    </label>
                                    <input
                                        name="jumlah"
                                        type="text"
                                        class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                        placeholder="Ketik disini" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mb-4">
                                    <label class="block text-sm">
                                        PIC Yang Ambil
                                    </label>
                                    <select name="pic_id"  id="pic_id" required class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 pic_id" >
                                        @foreach ($pic as $items)
                                            <option value="" hidden="">-- Pilih Disini --</option>
                                            <option value="{{ $items->id_pic }}">{{ ucwords($items->nama_pic) }}</option>
                                        @endforeach
                                    </select>
                                </div>w-full md:w-1/2 px-2 mb-4">
                                    <label class="block text-sm">
                                        Nomor Pekerjaan
                                    </label>
                                    <input
                                        name="no_pekerjaan"
                                        type="text"
                                        class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                        placeholder="Ketik disini" />
                                </div>
                                <div class="w-full md:w-1/2 px-2 mb-4">
                                    <label class="block text-sm">
                                        Bidang
                                    </label>
                                    <select name="bidang_id"  id="jenis_id" required class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 jenis_id" >
                                        @foreach ($barang as $item)
                                            <option value="{{ $item->id_bidang }}">{{ ucwords($item->nama_bidang) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full md:w-1/2 px-2 mb-4">
                                    <label class="block text-sm">
                                        Jenis Material
                                    </label>
                                    <select name="jenis_id"  id="jenis_id" required class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 jenis_id" >
                                        @foreach ($jenis as $itemJenis)
                                            <option value="{{ $itemJenis->id_jenis }}">{{ ucwords($itemJenis->nama_jenis) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full md:w-full px-2 mb-4">
                                    <label class="block text-sm">
                                        Deskripsi
                                    </label>
                                    <textarea name="deskripsi" id="" cols="30" rows="10" placeholder="Ketik disini" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"></textarea>
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
