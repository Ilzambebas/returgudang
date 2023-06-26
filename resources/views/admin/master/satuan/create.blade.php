@extends('admin.layouts.app')
@section('content')
<from method="POST" action="{{ route('satuan.satuan') }}" enctype="multipart/form-data">
    @csrf
    <div class="p-6 space-y-6">
        <div>
            <label class="block text-sm">
                Nama Satuan
            </label>
            <input type="text" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" name="nama_satuan" placeholder="Nama Satuan" required />
        </div>
        <div>
            <label class="block text-sm">
                Status
            </label>
            <input type="text" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" name="status" placeholder="Satatus" />
        </div>
    </div>
    <!-- Modal footer -->
    <div class="flex items-end justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
        <div class="flex justify-between">
            <button type="submit" class="bg-warning text-white py-2 px-4 rounded shadow-lg flex items-start mx-3">Simpan</button>
        </div>
    </div>
</from>
@endsection