<div id="hapusModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
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
            <form method="POST" enctype="multipart/form-data" action="{{ route('bidang.destroy') }}">
                @csrf
                <div class="p-6 space-y-6">
                    <input type="hidden" value="" name="id_bidang" id="id_bidang" required />
                    <div class="flex items-center justify-center p-5">
                        <img src="{{ asset('img/hapus-modal.svg') }}" alt="">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center justify-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <div class="">
                    <a href="{{ route('bidang.bidang') }}"class="bg-danger text-white py-2 px-4 rounded shadow-lg flex items-start mx-3">Tidak</a>
                    </div>
                    <div class="">
                        <button type="submit" class="bg-warning text-white py-2 px-4 rounded shadow-lg flex items-start mx-3">Yakin</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
