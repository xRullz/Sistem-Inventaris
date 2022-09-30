@extends('layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Data User</h4>
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
                            <a href="#">Data User</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Data User</h4>
                                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                        data-target="#modalAddUser">
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
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th style="width: 17%">Action</th>
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($user as $row)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->level }}</td>
                                                <td>

                                                    <a href="#modalEditUser{{ $row->id }}" data-toggle="modal"
                                                        class="btn btn-primary btn-xs" data-toggle="tooltip"
                                                        data-original-title="Edit Data"><i class="fa fa-edit"></i> Edit</a>

                                                    <a href="#modalHapusUser{{ $row->id }}" data-toggle="modal"
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

    <div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/user/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama Lengkap ..."
                                required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email ..." required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password ..." required>
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select name="level" class="form-control" required>
                                <option value="" hidden="">--- Pilih Level ---</option>
                                <option value="admin">Admin</option>
                                <option value="gudang">Gudang</option>
                            </select>
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

    @foreach ($user as $d)  
        <div class="modal fade" id="modalEditUser{{ $d->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/user/{{ $d->id }}/update" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <input type="hidden" value="{{ $d->id }}" name="id" required>

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" value="{{ $d->name }}" class="form-control" name="name"
                                    placeholder="Nama Lengkap ..." required>
                            </div>
                                 <div class="form-group">
                                <label>Email</label>
                                <input type="email" value="{{ $d->email }}" class="form-control" name="email"
                                    placeholder="Email ..." required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" value="{{ $d->password }}" class="form-control" name="password" placeholder="Password ..."
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Level</label>
                                <select name="level" class="form-control" required>
                                    <option <?php if ($d->level == 'admin') {
                                        echo 'selected';
                                    } ?> value="admin">Admin</option>
                                    <option <?php if ($d->level == 'gudang') {
                                        echo 'selected';
                                    } ?> value="gudang">Gudang</option>
                                </select>
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

    @foreach ($user as $g)
        <div class="modal fade" id="modalHapusUser{{ $g->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Hapus User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/user/{{ $g->id }}/destroy" method="get" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <input type="hidden" value="{{ $d->id }}" name="id" required>

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
