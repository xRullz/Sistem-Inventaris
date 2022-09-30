@extends('layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Data Barang Masuk</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="/home">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Data Barang Masuk</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Data Barang Masuk</h4>
                                    <a class="btn btn-primary btn-round ml-auto" href="brg_msk/create">
                                        <i class="fa fa-plus"></i>
                                        Tambah Data
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
