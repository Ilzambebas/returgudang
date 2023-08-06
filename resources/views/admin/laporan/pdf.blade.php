<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Laporan Data Return</title>
  </head>
    <style>
        .table-bordered th, .table-bordered td {
            border-width: 1px;
            border: 1px solid #42424228;
        }
        .table-bordered>:not(caption)>*{
            border-width: 1px;
            border: 1px solid #42424298;
        }
        .btn-primary{
            background-color: #219ebc !important;
        }
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font-family: 'Tinos', serif;
            font: 12pt;
        }
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        p, table, ol{
            font-size: 9pt;
        }
        @page {
            size: A3 landscape;
            /* size: A4; */
            padding: 10px
        }
        @media print {
            * {
                -webkit-print-color-adjust: exact !important;   /* Chrome, Safari, Edge */
                color-adjust: exact !important;                 /*Firefox*/     /*Firefox*/
            }
            html, body {
                width: 100%;
                height: max-content;
            }
            .card{
                padding: 0;
            }
            .card-body{
                padding: 0 10px 0 10px;
            }
            .no-print, .no-print *
            {
                display: none !important;
            }
        /* ... the rest of the rules ... */
        }
    </style>
  <body>
    <div class="container my-5">
        <div class="card my-2" style="background: #FAFAFA; border: none">
            <div class="card-header " style="background: #FAFAFA">
                <h4 class="fw-bold text-center">Laporan Data Return test</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <button onclick="history.back()" class="btn btn-primary no-print">Kembali</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="">
                                    No
                                 </th>
                                 <th scope="col" class="">
                                    NO PO/ Stock Code
                                 </th>
                                 <th scope="col" class="">
                                    JUMLAH
                                 </th>
                                 <th scope="col" class="">
                                     PIC YANG AMBIL  / RETURN
                                 </th>
                                 <th scope="col" class="">
                                     BIDANG
                                 </th>
                                 <th scope="col" class="">
                                     JENIS MATERIAL
                                 </th>
                                 <th scope="col" class="">
                                     DESKRIPSI
                                 </th>
                                 <th scope="col" class="">
                                     TGL PENGEMBALIAN
                                 </th>

                            </tr>
                        </thead>
                        <tbody>
                                @forelse ($data as $item)
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <td class="">
                                            {{ $loop->iteration }}
                                        </td>
                                        <th scope="row" class=" font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                            {{ $item->no_po }}
                                        </th>
                                        <td class="">
                                            {{ $item->jumlah }}
                                        </td>
                                        <td class=" bg-gray-50 dark:bg-gray-800">
                                            {{ $item->nama_pic }}
                                        </td>
                                        <td class=" bg-gray-50 dark:bg-gray-800">
                                            {{ $item->nama_bidang }}
                                        </td>
                                        <td class="">
                                        {{ $item->nama_jenis }}
                                        </td>
                                        <td class="">
                                        {{ $item->keterangan }}
                                        </td>

                                        <td class="">
                                            {{ $item->tgl_pengembalian != null ? \Carbon\Carbon::parse($item->tgl_bon)->translatedFormat('d-F-Y') : '-' }}
                                        </td>


                                    </tr>
                                @empty
                                    <tr>
                                        <td>tidak ada data</td>
                                    </tr>

                                @endforelse

                        </tbody>
                    </table>
                </div>
                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
            </div>
            <div class="card-footer" style="background: #FAFAFA;">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="fw-bold">Penerima</h6>
                        <div class="py-4"></div>
                        <h4 class="fw-bold text-center " style="font-size: 14px;">
                            <u>(&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; )</u>
                        </h4>
                    </div>
                    <div>
                        <h6 class="fw-bold">Yang Bersangkutan</h6>
                        <div class="py-4"></div>
                        <h4 class="fw-bold text-center " style="font-size: 14px;">
                            <u>(&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; )</u>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<script>
    print();
</script>
