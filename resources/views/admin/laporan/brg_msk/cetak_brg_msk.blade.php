<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cetak Laporan Barang Masuk</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body style="background-color: white;" onload="window.print()">
    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table style="width: 100%;">
                        <tr>
                            <td align="center">
                                <span style="line-height: 1.6; font-weight: bold;">
                                    SISTEM INFORMASI INVENTORY
                                    <br>RULLZZ
                                </span>
                            </td>
                        </tr>
                    </table>

                    <hr class="line-title">
                    <p align="center">
                        LAPORAN DATA BARANG MASUK
                    </p>
                    <p align="center">
                        Periode Tanggal {{ date('d M Y', strtotime($tgl_awal)) }} s/d
                        {{ date('d M Y', strtotime($tgl_akhir)) }}
                    </p>
                    <hr />

                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>No Barang Masuk</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Tanggal Masuk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if ($sum_total == 0)
                                <tr>
                                    <td colspan="8">
                                        <center><b>Data Tidak Ada Pada Periode Tanggal
                                                {{ date('d M Y', strtotime($tgl_awal)) }} s/d
                                                {{ date('d M Y', strtotime($tgl_akhir)) }}</b></center>
                                    </td>
                                </tr>
                            @else
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($brg_msk as $row)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->no_brg_msk }}</td>
                                        <td>{{ $row->nama_barang }}</td>
                                        <td>{{ $row->nama_kategori }}</td>
                                        <td>{{ date('d M Y', strtotime($row->tgl_brg_msk)) }}</td>
                                        <td>Rp. {{ number_format($row->harga) }}</td>
                                        <td>{{ $row->jml_brg_msk }} Unit</td>
                                        <td>Rp. {{ number_format($row->total) }}</td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td colspan="7">Total Harga</td>
                                    <td>Rp. {{ number_format($sum_total) }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
