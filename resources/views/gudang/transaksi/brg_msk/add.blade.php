@extends('layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Add Barang Masuk</h4>
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
                            <a href="#">Add</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Barang Masuk</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Add Barang Masuk</div>
                            </div>
                            <form action="/brg_msk/store" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}" required>
                                            <div class="form-group">
                                                <label>No Barang Masuk</label>
                                                <input type="text" class="form-control" readonly="" value="{{ 'CD-'.$kd }}" placeholder="No Barang Masuk ..."
                                                    name="no_brg_msk" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Masuk</label>
                                                <input type="date" class="form-control" 
                                                    name="tgl_brg_msk" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Barang</label>
                                                <select id="id_barang" name="id_barang" class="form-control" required>
                                                    <option value="" hidden="">--- Pilih Barang ---</option>
                                                    @foreach ($barang as $p)
                                                        <option value="{{ $p->id }}">{{ $p->nama_barang }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div id="detail_barang"></div>

                                            <div class="form-group">
                                                <label>Jumlah Barang</label>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control"
                                                        placeholder="Jumlah Barang ..." id="jml_brg_msk" name="jml_brg_msk"
                                                        required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2">Unit</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Total</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="total"
                                                        placeholder="Total ..." name="total" readonly=""
                                                        required>
                                                </div>
                                            </div>

                                            <div class="card-action">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-save"> </i>
                                                    Submit</button>
                                                <a href="/brg_msk" class="btn btn-danger"><i class="fa fa-undo"> </i>
                                                    Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/js/core/jquery.3.2.1.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#jml_brg_msk").keyup(function() {
                var jml_brg_msk = $("#jml_brg_msk").val();
                var harga = $("#harga").val();

                var total = parseInt(harga) * parseInt(jml_brg_msk);
                $("#total").val(total);
            });
        });
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script type="text/javascript">
        $("#id_barang").change(function(){
            var id_barang = $("#id_barang").val();
            $.ajax({
                type: "GET",
                url: "/brg_msk/ajax",
                data: "id_barang="+id_barang,
                cache:false,
                success: function(data){
                    $('#detail_barang').html(data);
                }
            });
        });
    </script>
@endsection
