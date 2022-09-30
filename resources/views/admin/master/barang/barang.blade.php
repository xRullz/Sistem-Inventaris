@extends('layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Data barang</h4>
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
                            <a href="#">Data barang</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Data barang</h4>
                                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                        data-target="#modalAddbarang">
                                        <i class="fa fa-plus"></i>
                                        Tambah Data
                                    </button>

                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th style="width: 17%">Action</th>
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($barang as $row)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $row->nama_barang }}</td>
                                                <td>{{ $row->nama_kategori }}</td>
                                                <td>Rp. {{ number_format($row->harga) }}</td>
                                                <td>{{ $row->stok }} Unit</td>
                                                <td>

                                                    <a href="#modalEditbarang{{ $row->id }}" data-toggle="modal"
                                                        class="btn btn-primary btn-xs" data-toggle="tooltip"
                                                        data-original-title="Edit Data"><i class="fa fa-edit"></i> Edit</a>

                                                    <a href="#modalHapusbarang{{ $row->id }}" data-toggle="modal"
                                                        class="btn btn-danger btn-xs" data-toggle="tooltip"
                                                        data-original-title="Hapus Data"><i class="fa fa-trash"></i>
                                                        Hapus</a>
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
    </div>

    <div class="modal fade" id="modalAddbarang" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/barang/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang ..."
                                required>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="id_kategori" class="form-control" required>
                                <option value="" hidden="">--- Pilih Kategori ---</option>
                                @foreach ($kategori as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                </div>
                                <input type="number" class="form-control" placeholder="Harga ..." name="harga" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" placeholder="Stok ..." name="stok" required>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Unit</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>
                            Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    @foreach ($barang as $d)
        <div class="modal fade" id="modalEditbarang{{ $d->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/barang/{{ $d->id }}/update" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <input type="hidden" value="{{ $d->id }}" name="id" required>

                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" value="{{ $d->nama_barang }}" class="form-control" name="nama_barang" placeholder="Nama Lengkap ..."
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="id_kategori" class="form-control" required>
                                    <option value="{{ $d->id_kategori }}">{{ $d->nama_kategori }}</option>
                                    @foreach ($kategori as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="form-group">
                                <label>Harga</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                    </div>
                                    <input type="number" value="{{ $d->harga }}" class="form-control" placeholder="Harga ..." name="harga" required>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="number" value="{{ $d->stok }}" class="form-control" placeholder="Stok ..." name="stok" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">Unit</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                    class="fa fa-undo"></i> Close</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save
                                changes</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($barang as $g)
        <div class="modal fade" id="modalHapusbarang{{ $g->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Hapus Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/barang/{{ $g->id }}/destroy" method="get" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <input type="hidden" value="{{ $g->id }}" name="id" required>

                            <div class="form-group">
                                <h4>Apakah Anda Ingin Menghapus Data Ini?</h4>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                            class="fa fa-undo"></i> Close</button>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                        Hapus</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
