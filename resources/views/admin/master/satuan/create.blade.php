<div id="createModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" style="z-index: 15;">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambahkan Satuan
                </h3>
            </div>
            <!-- Modal body -->
                <form action="{{ route('satuan.store') }}" method="POST">
                @csrf
                <div class="p-6 space-y-6">
                    <div>
                        <label class="block text-sm">
                            Nama Satuan
                        </label>
                        <input type="text" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" name="nama_satuan" placeholder="Nama Satuan" required/>
                    </div>
                    <div>
                        <label class="block text-sm">
                            Status
                        </label>
                        <select name="status"  id="status_jenis" required class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            <option value="Ya">YA</option>
                            <option value="Tidak">TIDAK</option>
                        </select>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-end justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <div class="flex justify-between">
                    <button type="reset" data-modal-hide="createModal" class="bg-danger text-white py-2 px-4 rounded shadow-lg flex items-start mx-3">Batal</button>
                        <button type="submit" class="bg-warning text-white py-2 px-4 rounded shadow-lg flex items-start mx-3">Simpan</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
