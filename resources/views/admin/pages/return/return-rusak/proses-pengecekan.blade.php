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
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Proses Pengecekan</h5>
                            <hr class="w-full h-px my-4 bg-gray-400 border-0 dark:bg-gray-900">
                        </div>
                    </div>
                    <div>
                        <div class="p-0 overflow-x-scroll overflow-x-auto mt-4">
                            <form action="{{ route('return-rusak.prosesPengecekanPost') }}" method="POST">
                            @csrf

                            <div class="flex flex-wrap -mx-2">
                                <div class="w-full md:w-full px-2 mb-4">
                                    <label class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">
                                        Deskripsi
                                    </label>
                                    <div class="flex items-center mb-4">
                                        <input id="country-option-2" type="radio" name="status" value="ya" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="country-option-2" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                          Ya
                                        </label>
                                      </div>
                                    <div class="flex items-center mb-4">
                                    <input id="country-option-1" type="radio" name="status" value="tidak" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" checked>
                                    <label for="country-option-1" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Tidak
                                    </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <input type="hidden" name="id" id="" value="{{ $data->id_detail_return }}">
                    <button type="submit" class="bg-warning text-white py-2 px-4 rounded shadow-lg flex items-start mx-3">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
