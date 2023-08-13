@extends('admin.layouts.app')
@section('content')

<!-- create modal -->
@include('admin.master.pic.create')
<!-- create modal -->

<!-- edit modal -->
<div id="editModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" style="z-index: 15;">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Data PIC
                </h3>
            </div>
            <!-- Modal body -->

                <div class="p-6 space-y-6">
                    <input type="hidden" value="" name="id_pic" required />
                    <div>
                        <label class="block text-sm">
                            Nama PIC
                        </label>
                        <input
                            type="text"
                            value=""
                            name="nama_pic"
                            id="nama_pic"
                            placeholder="Nama PIC"
                            required
                            class="placeholder:text-gray-500
                            text-sm focus:shadow-primary-outline
                            leading-5.6 ease block w-full
                            appearance-none rounded-lg
                            border border-solid
                            border-gray-300 bg-white
                            bg-clip-padding py-2 px-3
                            font-normal text-gray-700 transition-all
                            focus:border-blue-500 focus:bg-white focus:text-gray-700
                            focus:outline-none
                            focus:transition-shadow" />
                        <input type="text" value="" hidden name="id" id="id" hidden placeholder="Nama PIC" required class="hidden placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" />
                    </div>
                    <div>
                        <label class="block text-sm">
                            Status
                        </label>
                        <select name="status"  id="status_pic" required class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
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
<!-- edit modal -->

<!-- hapus modal -->
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
            <form method="POST" enctype="multipart/form-data" action="{{ route('pic.destroy') }}">
                @csrf
                <div class="p-6 space-y-6">
                    <input type="hidden" value="" name="id_pic" id="id_pic" required />
                    <div class="flex items-center justify-center p-5">
                        <img src="{{ asset('img/hapus-modal.svg') }}" alt="">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center justify-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <div class="">
                    <a href="{{ route('pic.pic') }}"class="bg-danger text-white py-2 px-4 rounded shadow-lg flex items-start mx-3">Tidak</a>
                    </div>
                    <div class="">
                        <button type="submit" class="bg-warning text-white py-2 px-4 rounded shadow-lg flex items-start mx-3">Yakin</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- hapus modal -->

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
                            <h4>Data PIC</h4>
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
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama PIC</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-t">
                                    @php $no=1; @endphp
                                    @foreach($pic as $row)
                                    <tr>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2">
                                                <div class="my-auto">
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ $no++}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-sm font-semibold leading-normal dark:text-white dark:opacity-60">{{ $row->nama_pic }}</p>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-60">{{ $row->status }}</span>
                                        </td>
                                        <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        <div class="flex items-center justify-center">
                                                <button id="edit" data-modal-target="editModal" data-modal-toggle="editModal" class="bg-warning text-white py-2 px-4 rounded shadow-lg flex items-center mx-3 edit-data"  data-id="{{ $row->id_jenis }}">
                                                    <div class="font-sm">Edit</div>
                                                    <div class="content-center mx-1">
                                                        <img src="{{ asset('img/edit.svg') }}" alt="">
                                                    </div>
                                                </button>
                                                <button data-modal-target="hapusModal" data-modal-toggle="hapusModal" class="bg-danger text-white py-2 px-4 rounded shadow-lg flex items-center hapus-data" data-id="{{ $row->id_jenis }}">
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
<script>
    var id;
    // edit data
    $('body').on('click','#edit',function(e) {
        id = $(this).data('id');
        $.ajax({
            url: `{{ route('pic.edit') }}`,
            method: 'GET',
            data:{
                id:id
            },
            success: function(data) {
                $.map(data,function(i) {
                    $('#id').val(i.id_pic);
                    $('#nama_pic').val(i.nama_pic);
                    // $('#status option[value="' + i.status+ '"]').prop('selected', true);
                    $("#status_pic").find(`option[value=${i.status}]`).prop('selected', true);
                })
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
            url: `{{ route('pic.update') }}`,
            method: 'POST',
            data: {
                id: $('#id').val(),
                nama_jenis: $('#nama_pic').val(),
                status: $('#status_pic').val(),
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
                    }, 25000);
                    location.reload();
                    $('#editModal').modal('hide');
                }
            }
        });
    })
    // hapus data
    $('body').on('click','.hapus-data',function(e) {
        id = $(this).data('id');
        $('#id_pic').val(id);
    })
</script>
@endpush
