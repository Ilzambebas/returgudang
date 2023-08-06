<div id="editModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" style="z-index: 15;">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Data Satuan
                </h3>
            </div>
            <!-- Modal body -->

                <div class="p-6 space-y-6">
                    <input type="hidden" value="" name="id_satuan" required />
                    <div>
                        <label class="block text-sm">
                            Nama Satuan
                        </label>
                        <input type="text" value="" name="nama_satuan" id="nama_satuan" placeholder="Nama Satuan" required class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" />
                        <input type="text" value="" hidden name="id" id="id" hidden placeholder="Nama Satuan" required class="hidden placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" />
                    </div>
                    <div>
                        <label class="block text-sm">
                            Status
                        </label>
                        <select name="status"  id="status_satuan" required class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            <option value="Ya">YA</option>
                            <option value="Tidak">TIDAK</option>
                        </select>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-end justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <div class="flex justify-between">
                        <div class="flex justify-between">
                        <button type="reset" data-modal-hide="editModal" class="bg-danger text-white py-2 px-4 rounded shadow-lg flex items-start mx-3">Batal</button>
                            <button type="button" id="SubmitUpdateForm" class="bg-warning text-white py-2 px-4 rounded shadow-lg flex items-start mx-3">Simpan</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
