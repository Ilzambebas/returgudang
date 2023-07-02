@extends('admin.layouts.app')
@section('content')

<!-- create modal -->
@include('admin.master.satuan.create')
<!-- create modal -->

<!-- edit modal -->
@include('admin.master.satuan.edit')
<!-- edit modal -->

<!-- hapus modal -->
@include('admin.master.satuan.delete')
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
                            <h4>Data Satuan</h4>
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
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Satuan</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                                        <th class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-t">
                                    @php $no=1; @endphp
                                    @foreach($satuan as $row)

                                    <tr>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2">
                                                <div class="my-auto">
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ $no++}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-sm font-semibold leading-normal dark:text-white dark:opacity-60">{{ $row->nama_satuan }}</p>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-60">{{ $row->status }}</span>
                                        </td>
                                        <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex items-center justify-center">
                                                <button id="edit" data-modal-target="editModal" data-modal-toggle="editModal" class="bg-warning text-white py-2 px-4 rounded shadow-lg flex items-center mx-3 edit-data"  data-id="{{ $row->id_satuan }}">
                                                    <div class="font-sm">Edit</div>
                                                    <div class="content-center mx-1">
                                                        <img src="{{ asset('img/edit.svg') }}" alt="">
                                                    </div>
                                                </button>
                                                <button data-modal-target="hapusModal" data-modal-toggle="hapusModal" class="bg-danger text-white py-2 px-4 rounded shadow-lg flex items-center hapus-data" data-id="{{ $row->id_satuan }}">
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
            url: `{{ route('satuan.edit') }}`,
            method: 'GET',
            data:{
                id:id
            },
            success: function(data) {
                $.map(data,function(i) {
                    $('#id').val(i.id_satuan);
                    $('#nama_satuan').val(i.nama_satuan);
                    // $('#status option[value="' + i.status+ '"]').prop('selected', true);
                    $("#status_satuan").find(`option[value=${i.status}]`).prop('selected', true);
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
            url: `{{ route('satuan.update') }}`,
            method: 'POST',
            data: {
                id: $('#id').val(),
                nama_satuan: $('#nama_satuan').val(),
                status: $('#status_satuan').val(),
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
        $('#id_satuan').val(id);
    })
</script>
@endpush
