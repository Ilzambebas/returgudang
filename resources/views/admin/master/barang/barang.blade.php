@extends('admin.layouts.app')
@section('content')
<!-- create modal -->
<div id="createModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" style="z-index: 15;">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambahkan Barang
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="createModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
                <form action="{{ route('barang.store') }}" method="POST">
                @csrf
                <div class="p-6 space-y-6">
                    <div>
                        <label class="block text-sm">
                            Nama Barang
                        </label>
                        <input type="text" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" name="nama_barang" placeholder="Nama Bidang" required/>
                    </div>
                    <div>
                        <label class="block text-sm">
                            Nama Jenis
                        </label>
                        <select name="jenis_id"  id="jenis_id" required class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            @foreach ($jenis as $item)
                                <option value="{{ $item->id_jenis }}">{{ ucwords($item->nama_jenis) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm">
                            Nama Satuan
                        </label>
                        <select name="satuan_id"  id="satuan_id" required class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            @foreach ($satuan as $item)
                                <option value="{{ $item->id_satuan }}">{{ ucwords($item->nama_satuan) }}</option>
                            @endforeach
                        </select>
                        {{-- <select class="form-control" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" name="nama_satuan" required>
                            <option value="" hidden="">-- Pilih Disini --</option>
                            <option value="{{ $k->nama_satuan }}">{{ $k->nama_satuan }}</option>
                        </select> --}}
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-end justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <div class="flex justify-between">
                        <button type="submit" class="bg-warning text-white py-2 px-4 rounded shadow-lg flex items-start mx-3">Simpan</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
<!--end create modal -->

<!-- edit modal -->
<div id="editModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" style="z-index: 15;">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Barang
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="createModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div>
                    <label class="block text-sm">
                        Nama Barang
                    </label>
                    <input type="text" value="" hidden name="id" id="id" hidden placeholder="Nama Bidang" required class="hidden placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" />
                    <input type="text" name="nama_barang" id="nama_barang" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" name="nama_barang" placeholder="Nama Barang" required/>
                </div>
                <div>
                    <label class="block text-sm">
                        Nama Jenis
                    </label>
                    <select name="jenis_id"  id="jenis_id" required class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 jenis_id" >

                    </select>
                </div>
                <div>
                    <label class="block text-sm">
                        Nama Satuan
                    </label>
                    <select name="satuan" id="satuan_id" required class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 satuan_id" >
                    </select>
                    {{-- <select class="form-control" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" name="nama_satuan" required>
                        <option value="" hidden="">-- Pilih Disini --</option>
                        <option value="{{ $k->nama_satuan }}">{{ $k->nama_satuan }}</option>
                    </select> --}}
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-end justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <div class="flex justify-between">
                    <button type="button" id="SubmitUpdateForm" class="bg-warning text-white py-2 px-4 rounded shadow-lg flex items-start mx-3">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- hapus modal --}}
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
            <form method="POST" enctype="multipart/form-data" action="{{ route('barang.destroy') }}">
                @csrf
                <div class="p-6 space-y-6">
                    <input type="hidden" value="" name="id_barang" id="id_barang" required />
                    <div class="flex items-center justify-center p-5">
                        <img src="{{ asset('img/hapus-modal.svg') }}" alt="">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center justify-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <div class="">
                    <a href="{{ route('barang.barang') }}"class="bg-danger text-white py-2 px-4 rounded shadow-lg flex items-start mx-3">Tidak</a>
                    </div>
                    <div class="">
                        <button type="submit" class="bg-warning text-white py-2 px-4 rounded shadow-lg flex items-start mx-3">Yakin</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="w-full px-6 py-6 mx-auto">
    @include('components.notifications')
    <div class="alert alert-danger p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert" style="display: none;">

    </div>
    <div class="alert alert-success p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert" style="display: none;">

    </div>
    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border" style="height: 523px;">
                <div class="p-4">
                    <div class="flex justify-between">
                        <div>
                            <h4>Data Barang</h4>
                        </div>
                        <div>
                            <button data-modal-target="createModal" data-modal-toggle="createModal" class="bg-green text-white py-2 px-4 rounded shadow-lg focus:outline-none openModal">
                                Tambah Data</button>
                        </div>
                    </div>
                    <div>
                        <div class="p-0 overflow-x-auto mt-4">
                            <table class="items-center justify-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-bottom">
                                    <tr>
                                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Barang</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama jenis</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Satuan</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-t">
                                    @php $no=1; @endphp
                                    @foreach($barang as $row)
                                    <tr>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2">
                                                <div class="my-auto">
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ $no++}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-sm font-semibold leading-normal dark:text-white dark:opacity-60">{{ $row->nama_barang }}</p>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-sm font-semibold leading-normal dark:text-white dark:opacity-60">{{ $row->nama_jenis }}</p>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-sm font-semibold leading-normal dark:text-white dark:opacity-60">{{ $row->nama_satuan }}</p>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-sm font-semibold leading-normal dark:text-white dark:opacity-60">{{ \Carbon\Carbon::parse($row->created_at)->translatedFormat('d M Y - H:i:s') }}</p>
                                        </td>
                                        <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <div class="flex items-center justify-center">
                                                <button id="edit" data-modal-target="editModal" data-modal-toggle="editModal" class="bg-warning text-white py-2 px-4 rounded shadow-lg flex items-center mx-3 edit-data"  data-id="{{ $row->id_barang }}">
                                                    <div class="font-sm">Edit</div>
                                                    <div class="content-center mx-1">
                                                        <img src="{{ asset('img/edit.svg') }}" alt="">
                                                    </div>
                                                </button>
                                                <button data-modal-target="hapusModal" data-modal-toggle="hapusModal" class="bg-danger text-white py-2 px-4 rounded shadow-lg flex items-center hapus-data" data-id="{{ $row->id_barang }}">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" integrity="sha512-TPh2Oxlg1zp+kz3nFA0C5vVC6leG/6mm1z9+mA81MI5eaUVqasPLO8Cuk4gMF4gUfP5etR73rgU/8PNMsSesoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
     var id;
    // edit data
    function dataSatuan(id) {
        var data_satuan = @json($satuan);
        var selectElement = $('.satuan_id');
        // Clear existing options
        selectElement.empty();
        $.each(data_satuan, function(index, satuan) {
            // $('.satuan_id').append('<option value="' + satuan.id_satuan + '">' + satuan.nama_satuan + '</option>');
            var option = $('<option></option>');
            option.val(satuan.id_satuan); // Set the value attribute (modify according to your data structure)
            option.text(satuan.nama_satuan); // Set the display text (modify according to your data structure)

            // Check if the current task ID matches the selectedTaskId and set the selected attribute
            if (satuan.id_satuan == id) {
                option.attr('selected', 'selected');
            }

            // Append the option to the select element
            selectElement.append(option);
        })
    }
    function dataJenis(id) {
        var data_jenis = @json($jenis);
        var selectJenis = $('.jenis_id');
        // Clear existing options
        selectJenis.empty();
        $.each(data_jenis, function(index, jenis) {
            // $('.satuan_id').append('<option value="' + satuan.id_satuan + '">' + satuan.nama_satuan + '</option>');
            var option = $('<option></option>');
            option.val(jenis.id_jenis); // Set the value attribute (modify according to your data structure)
            option.text(jenis.nama_jenis); // Set the display text (modify according to your data structure)

            // Check if the current task ID matches the selectedTaskId and set the selected attribute
            if (jenis.id_jenis == id) {
                option.attr('selected', 'selected');
            }

            // Append the option to the select Jenis
            selectJenis.append(option);
        })

    }
    $('body').on('click','#edit',function(e) {
        id = $(this).data('id');

        $.ajax({
            url: `{{ route('barang.edit') }}`,
            method: 'GET',
            data:{
                id:id
            },
            success: function(data) {
                console.log(data.id_barang);
                $('#id').val(data.id_barang);
                $('#nama_barang').val(data.nama_barang);
                // $("#jenis_id").find(`option[value=${i.id_jenis}]`).prop('selected', true);
                // .find(`option[value=${i.id_satuan}]`).prop('selected', true)
                // var selectedTaskId = 2;
                // $('#satuan_id').val(selectedTaskId);
                dataSatuan(data.id_satuan)
                dataJenis(data.id_jenis)

            }
        })
    })

    $('#SubmitUpdateForm').click(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: `{{ route('barang.update') }}`,
            method: 'POST',
            data: {
                id: $('#id').val(),
                nama_barang: $('#nama_barang').val(),
                jenis_id:$('.jenis_id').val(),
                satuan_id: $('.satuan_id').val(),
            },
            success: function(result) {
                if (result.errors) {
                    $('.alert-danger').html('');
                    $.each(result.errors, function(key, value) {
                        $('.alert-danger').show();
                        $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                    });
                } else {
                    $('.alert-danger').hide();
                    $('.alert-success').show();
                    // setInterval(() => {
                        // }, 2000);
                    // var refreshIntervalId = setInterval($('#EditArticleModal').hide(), 10000);
                    $(".alert-success").append(`<p id="">${result.message}</p>`);
                    setInterval(function(){
                        $('.alert-success').hide();
                    }, 60000);
                    location.reload();
                    $('#editModal').modal('hide');
                }
            }
        });
    })
    // hapus data
    $('body').on('click','.hapus-data',function(e) {
        id = $(this).data('id');
        $('#id_barang').val(id);
    })
</script>
@endpush
