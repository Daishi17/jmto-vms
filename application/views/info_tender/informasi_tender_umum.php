<main class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card border-dark mt-3">
                <div class="card-header border-dark bg-white text-black">
                    <ul class="nav nav-tabs">
                        <!-- <li class="nav-item">
                            <a class="nav-link " aria-current="page"><i class="fa fa-list-alt" aria-hidden="true"> </i> Menu Tender</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link active" style="margin-left: 5px;" href="#"><i class="fa fa-columns" aria-hidden="true"></i> Informasi Pengadaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/aanwijzing') ?>"><i class="fa fa-comments" aria-hidden="true"></i> Aanwijzing</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('panitia/info_tender/informasi_tender/evaluasi') ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i> Evaluasi</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/negosiasi') ?>"><i class="fa fa-tags" aria-hidden="true"></i> Negosiasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white " style="margin-left: 5px;" href="<?= base_url('tender_diikuti/sanggahan_prakualifikasi') ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan Prakualifikasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/sanggahan_akhir') ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="#"><i class="fa fa-suitcase" aria-hidden="true"></i> Berita Acara</a>
                        </li> -->
                    </ul>
                </div>
            </div>
            <hr>
            <div class="card border-dark">
                <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-dark">
                            <small class="text-white"><strong><i class="fa-solid fa-table px-1"></i> Data Tabel - Info Pengadaan</strong></small>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th style="width: 300px;">Kode Pengadaan</th>
                            <th> B.04.003.0001.00001.JMTM.280320220002</th>
                        </tr>
                        <tr>
                            <th>Nama Paket</th>
                            <th>PAKET KEMERDEKAAN 78 RI BOGOR</th>
                        </tr>
                        <tr>
                            <th>TKDN/PDN/IMPORT</th>
                            <th>TKDN (80%)</th>
                        </tr>
                        <tr>
                            <th>Jadwal Pengadaan</th>
                            <th><button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#lihat_jadwal_tender">
                                    <i class="fa fa-calendar" aria-hidden="true"></i> Lihat
                                </button></th>
                        </tr>
                        <tr>
                            <th>Jumlah Peserta</th>
                            <th><button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#lihat_peserta">
                                    <i class="fa fa-users" aria-hidden="true"></i> 2 Peserta
                                </button></th>
                        </tr>
                        <tr>
                            <th>Dokumen Lelang</th>
                            <th>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header bg-primary text-white">
                                                List Dokumen Lelang
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama File</th>
                                                            <th>File</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td scope="row">1</td>
                                                            <td>Dok.lelang 1</td>
                                                            <td><a href="" class="btn btn-sm btn-danger"><i class="fas fa fa-file"></i> Lihat</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header bg-primary text-white">
                                                Persyaratan Tambahan
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Persyaratan</th>
                                                            <th>Keterangan</th>
                                                            <th>File</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td scope="row">1</td>
                                                            <td>Iso 5000</td>
                                                            <td>Keternagan </td>
                                                            <td><a href="" class="btn btn-sm btn-danger"><i class="fas fa fa-file"></i> Lihat</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">2</td>
                                                            <td>Iso 1200</td>
                                                            <td>Keternagan </td>
                                                            <td><a href="" class="btn btn-sm btn-danger"><i class="fas fa fa-file"></i> Lihat</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th>Persyaratan Tambahan</th>
                            <th>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-primary text-white">
                                                Persyaratan Tambahan
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Persyaratan</th>
                                                            <th>Keterangan</th>
                                                            <th>File</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td scope="row">1</td>
                                                            <td>Iso 5000</td>
                                                            <td>Keternagan </td>
                                                            <td><a href="" class="btn btn-sm btn-danger"><i class="fas fa fa-file"></i> Lihat</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">2</td>
                                                            <td>Iso 1200</td>
                                                            <td>Keternagan </td>
                                                            <td><a href="" class="btn btn-sm btn-danger"><i class="fas fa fa-file"></i> Lihat</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-primary text-white">
                                                Persyaratan Tambahan Yang Sudah Di Upload
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Persyaratan</th>
                                                            <th>File</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td scope="row">1</td>
                                                            <td>Iso 5000</td>
                                                            <td><a href="" class="btn btn-sm btn-danger"><i class="fas fa fa-file"></i> Lihat</a></td>
                                                            <td>
                                                                <a href="" class="text-danger">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row">2</td>
                                                            <td>Iso 1200</td>
                                                            <td><a href="" class="btn btn-sm btn-danger"><i class="fas fa fa-file"></i> Lihat</a></td>
                                                            <td>
                                                                <a href="" class="text-danger">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th>Bobot Teknis</th>
                            <th>50</th>
                        </tr>
                        <tr>
                            <th>Bobot Biaya</th>
                            <th>50</th>
                        </tr>
                        <!-- <tr>
                            <th>Bobot Teknis</th>
                            <th>60</th>
                        </tr> -->
                        <tr>
                            <th>Undangan Pembuktian</th>
                            <th><button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#undangan_pembuktian">
                                    <i class="fa fa-download" aria-hidden="true"></i> Lihat Undangan Pembuktian
                                </button></th>
                        </tr>
                        <tr>
                            <th>Pengumuman Hasil Prakualifikasi</th>
                            <th><button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hasil_prakualifikasi">
                                    <i class="fa fa-download" aria-hidden="true"></i> Lihat Hasil Prakualifikasi
                                </button></th>
                        </tr>
                        <tr>
                            <th>Dokumen Penawaran</th>
                            <th>
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#buka_dokumen_penawaran">
                                    <i class="fa fa-folder-open" aria-hidden="true"></i> Upload Dokumen Penawaran
                                </button>
                            </th>
                        </tr>
                        <tr>
                            <th>Berita Acara Pengadaan</th>
                            <th>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header bg-primary text-white">
                                                Berita Acara Pengadaan

                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama File</th>
                                                            <th>File</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td scope="row">1</td>
                                                            <td>Peringkat Teknis</td>
                                                            <td><a href="" class="btn btn-sm btn-warning"><i class="fas fa fa-file"></i> </a></td>

                                                        </tr>
                                                        <tr>
                                                            <td scope="row">2</td>
                                                            <td>Peringkat Penawaran Harga</td>
                                                            <td><a href="" class="btn btn-sm btn-warning"><i class="fas fa fa-file"></i> </a></td>

                                                        </tr>
                                                        <tr>
                                                            <td scope="row">3</td>
                                                            <td>Pengumuman Pemenang</td>
                                                            <td><a href="" class="btn btn-sm btn-warning"><i class="fas fa fa-file"></i> </a></td>

                                                        </tr>
                                                        <tr>
                                                            <td scope="row">4</td>
                                                            <td>Undangan Presentasi</td>
                                                            <td><a href="" class="btn btn-sm btn-warning"><i class="fas fa fa-file"></i> </a></td>

                                                        </tr>
                                                        <tr>
                                                            <td scope="row">5</td>
                                                            <td>Addendum Dokumen Pengadaan</td>
                                                            <td><a href="" class="btn btn-sm btn-warning"><i class="fas fa fa-file"></i> </a></td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th>Pengumuman Pemenang</th>
                            <th> <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#pengumuman_pemenang">
                                    <i class="fa fa-bullhorn" aria-hidden="true"></i> Pengumuman Pemenang
                                </button></th>
                        </tr>
                        <tr>
                            <th>Surat Penunjukan Pemenang Pengadaan</th>
                            <th><button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#surat_penunjukan">
                                    <i class="fa fa-download" aria-hidden="true"></i> Download Surat Penunjukan
                                </button></th>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
</main>


<div class="modal fade" id="buka_dokumen_penawaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-folder-open" aria-hidden="true"></i> Upload Dokumen Penawaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <div>
                            <i class="fa fa-info-circle" aria-hidden="true"></i> Silakan Masukan Username Panitia Anda Untuk Dapat Mengakses Pembukan Dokumen Penawaran !!!
                        </div>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <center>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"> <i class="fas fa fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"> <i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" readonly value="radxH8GTvQwcdX8sSLoAtfFJu63uCykCUjyn6x7PXeexHrMJbfE45lnRPJDC1aggY2nP7j9BUWF6DvhYbqpIOBtOsphTW0m2omFB04wb9h5stGKEzS9TLOXeNYR71KV3" aria-describedby="basic-addon1">
                            </div>
                            <br>
                            <a target="_blank" href="<?= base_url('panitia/info_tender/informasi_tender/buka_penawaran') ?>" class="btn btn-warning" style="width: 300px;"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Akses Halaman Upload Dokumen Penawaran</a>
                        </center>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="upload_berita_acara_tender" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-upload" aria-hidden="true"></i> Berita Acara Pengadaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i> Dokumen Umum Untuk Di Upload !!! <br>
                        <label>1. Peringkat Teknis</label>
                        <label>2. Peringkat Penawaran Harga</label>
                        <label>3. Pengumuman Pemenang</label>
                        <label>4. Undangan Presentasi</label>
                        <label>5. Addendum Dokumen Pengadaan</label>
                    </div>
                </div>
                <br>
                <form id="form_upload_berita_acara_tender" action="javascript:;" enctype="multipart/form-data">
                    <div class="input-group">
                        <input type="file" class="form-control" accept=".xlsx, .xls, .pdf" name="file_hps">
                        <button class="btn btn-outline-secondary file_hps_btn" type="submit">Upload</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pengumuman_pemenang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Pengumuman Pemenang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i> Kirim Pengumuman Pemenang Pengadaan !!! <br>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Email</th>
                            <th>Pemenang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>METRINDOCRB</td>
                            <td>metrindocirebon@yahoo.co.id</td>
                            <td><i class="fas fa fa-star text-warning"></i></td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>PT Agung Solusi Trans </td>
                            <td>bambang.triyono@agungrent.co.id</td>
                            <td><i class="fas fa fa-times text-danger"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fa fa-paper-plane" aria-hidden="true"></i> Kirim Pengumuman</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="undangan_pembuktian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Undangan Pembuktian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i> Undangan Pembuktian Pengadaan !!! <br>
                    </div>
                </div>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama File</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Undangan Pembuktian</td>
                            <td><label for="" class="btn btn-sm btn-danger"> Belum Upload Undangan</label></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hasil_prakualifikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Pengumuman Hasil Prakualifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i> Pengumuman Hasil Prakualifikasi Pengadaan !!! <br>
                    </div>
                </div>
                <!-- <form id="form_upload_hasil_rakualifikasi" action="javascript:;" enctype="multipart/form-data">
                    <div class="input-group">
                        <input type="file" class="form-control" accept=".xlsx, .xls, .pdf" name="file_hps">
                        <button class="btn btn-outline-secondary file_hps_btn" type="submit">Upload</button>
                    </div>
                </form> -->
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama File</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Pengumuman Hasil Prakualifikasi</td>
                            <td><label for="" class="btn btn-sm btn-danger"> Lihat</label></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="surat_penunjukan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Surat Penunjukan Pemenang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"></i> Upload Surat Penunjukan Pemenang Pengadaan !!! <br>
                    </div>
                </div>
                <!-- <form id="form_upload_surat_penunjukan" action="javascript:;" enctype="multipart/form-data">
                    <div class="input-group">
                        <input type="file" class="form-control" accept=".xlsx, .xls, .pdf" name="file_hps">
                        <button class="btn btn-outline-secondary file_hps_btn" type="submit">Upload</button>
                    </div>
                </form> -->
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama File</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Surat Penunjukan</td>
                            <td><label for="" class="btn btn-sm btn-danger"><i class="fas fa fa-file"></i> Lihat</label></td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <hr>
                <center>
                    Vendor Pemenang
                </center>
                <hr>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Email</th>
                            <th>Pemenang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>METRINDOCRB</td>
                            <td>metrindocirebon@yahoo.co.id</td>
                            <td><i class="fas fa fa-star text-warning"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="lihat_jadwal_tender" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Jadwal Pengadaan Berlangsung</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i> Jadwal Pengadaan Berlangsung !!! <br>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Tahap</th>
                            <th>Status Tahap</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Diubah Oleh</th>
                            <th>Alasan Perubahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Pengumuman Prakualifikasi</td>
                            <td><span class="badge bg-success"> <i class="fas fa fa-check"></i> Tahap Sudah Selesai</span>
                            <td>01 April 2022 16:00 </td>
                            <td>05 April 2022 23:59 </td>
                            <td>Ferry</td>
                            <td>Mau Ubah Ajah</td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td> Download Dokumen Kualifikasi </td>
                            <td><span class="badge bg-secondary"> <i class="fas fa fa-clock"></i> Tahap Sedang Berlangsung</span>
                            <td>01 April 2022 16:00 </td>
                            <td>05 April 2022 23:59 </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row">3</td>
                            <td>Upload Dokumen Prakualifikasi </td>
                            <td><span class="badge bg-danger"> <i class="fas fa fa-times"></i> Tahap Belum Dimulai</span>
                            <td>01 April 2022 16:00 </td>
                            <td>05 April 2022 23:59 </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row">4</td>
                            <td>Evaluasi Dokumen Kualifikasi </td>
                            <td><span class="badge bg-danger"> <i class="fas fa fa-times"></i> Tahap Belum Dimulai</span>
                            <td>01 April 2022 16:00 </td>
                            <td>05 April 2022 23:59 </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row">5</td>
                            <td>Pembuktian Kualifikasi </td>
                            <td><span class="badge bg-danger"> <i class="fas fa fa-times"></i> Tahap Belum Dimulai</span>
                            <td>01 April 2022 16:00 </td>
                            <td>05 April 2022 23:59 </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row">6</td>
                            <td>Penetapan Hasil Kualifikasi </td>
                            <td><span class="badge bg-danger"> <i class="fas fa fa-times"></i> Tahap Belum Dimulai</span>
                            <td>01 April 2022 16:00 </td>
                            <td>05 April 2022 23:59 </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row">7</td>
                            <td>Pengumuman Hasil Prakualifikasi </td>
                            <td><span class="badge bg-danger"> <i class="fas fa fa-times"></i> Tahap Belum Dimulai</span>
                            <td>01 April 2022 16:00 </td>
                            <td>05 April 2022 23:59 </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row">8</td>
                            <td>Masa Sanggah Prakualifikasi </td>
                            <td><span class="badge bg-danger"> <i class="fas fa fa-times"></i> Tahap Belum Dimulai</span>
                            <td>01 April 2022 16:00 </td>
                            <td>05 April 2022 23:59 </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row">9</td>
                            <td>Download Dokumen Pengadaan </td>
                            <td><span class="badge bg-danger"> <i class="fas fa fa-times"></i> Tahap Belum Dimulai</span>
                            <td>01 April 2022 16:00 </td>
                            <td>05 April 2022 23:59 </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row">10</td>
                            <td>Pemberian Penjelasan </td>
                            <td><span class="badge bg-danger"> <i class="fas fa fa-times"></i> Tahap Belum Dimulai</span>
                            <td>01 April 2022 16:00 </td>
                            <td>05 April 2022 23:59 </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row">11</td>
                            <td>Upload Dokumen Penawaran </td>
                            <td><span class="badge bg-danger"> <i class="fas fa fa-times"></i> Tahap Belum Dimulai</span>
                            <td>01 April 2022 16:00 </td>
                            <td>05 April 2022 23:59 </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row">12</td>
                            <td>Pembukaan dan Evaluasi Penawaran File I : Administrasi dan Teknis </td>
                            <td><span class="badge bg-danger"> <i class="fas fa fa-times"></i> Tahap Belum Dimulai</span>
                            <td>01 April 2022 16:00 </td>
                            <td>05 April 2022 23:59 </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row">13</td>
                            <td>Pemberitahuan/Pengumuman Peringkat Teknis </td>
                            <td><span class="badge bg-danger"> <i class="fas fa fa-times"></i> Tahap Belum Dimulai</span>
                            <td>01 April 2022 16:00 </td>
                            <td>05 April 2022 23:59 </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row">14</td>
                            <td>Pembukaan dan Evaluasi Penawaran File II : Harga </td>
                            <td><span class="badge bg-danger"> <i class="fas fa fa-times"></i> Tahap Belum Dimulai</span>
                            <td>01 April 2022 16:00 </td>
                            <td>05 April 2022 23:59 </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row">15</td>
                            <td>Upload Berita Acara Hasil Pengadaan </td>
                            <td><span class="badge bg-danger"> <i class="fas fa fa-times"></i> Tahap Belum Dimulai</span>
                            <td>01 April 2022 16:00 </td>
                            <td>05 April 2022 23:59 </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row">16</td>
                            <td>Penetapan Pemenang </td>
                            <td><span class="badge bg-danger"> <i class="fas fa fa-times"></i> Tahap Belum Dimulai</span>
                            <td>01 April 2022 16:00 </td>
                            <td>05 April 2022 23:59 </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row">17</td>
                            <td>Pengumuman Pemenang </td>
                            <td><span class="badge bg-danger"> <i class="fas fa fa-times"></i> Tahap Belum Dimulai</span>
                            <td>01 April 2022 16:00 </td>
                            <td>05 April 2022 23:59 </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row">18</td>
                            <td>Masa Sanggah Hasil Pengadaan </td>
                            <td><span class="badge bg-danger"> <i class="fas fa fa-times"></i> Tahap Belum Dimulai</span>
                            <td>01 April 2022 16:00 </td>
                            <td>05 April 2022 23:59 </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row">19</td>
                            <td>Surat Penunjukkan Penyedia Barang/Jasa </td>
                            <td><span class="badge bg-danger"> <i class="fas fa fa-times"></i> Tahap Belum Dimulai</span>
                            <td>01 April 2022 16:00 </td>
                            <td>05 April 2022 23:59 </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td scope="row">20</td>
                            <td>Penandatanganan Kontrak </td>
                            <td><span class="badge bg-danger"> <i class="fas fa fa-times"></i> Tahap Belum Dimulai</span>
                            <td>01 April 2022 16:00 </td>
                            <td>05 April 2022 23:59 </td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="lihat_peserta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Peserta Pengadaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i> Peserta Ini Merupakan Peserta Yang Mengikuti Pengadaan !!! <br>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <!-- <th>Email</th> -->
                            <!-- <th>Telepon</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>METRINDOCRB</td>
                            <!-- <td>metrindocirebon@yahoo.co.id</td> -->
                            <!-- <td>08978201075</td> -->
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>PT Agung Solusi Trans </td>
                            <!-- <td>bambang.triyono@agungrent.co.id</td> -->
                            <!-- <td>08127459175</td> -->
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="lihat_syarat_tambahan_vendor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Syarat Tambahan Penyedia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i> Lakukan Validasi Syarat Tambahan Penyedia !!! <br>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Persyaratan</th>
                            <th>File</th>
                            <th>Status Evaluasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Iso 5000</td>
                            <td><a href="" class="btn btn-sm btn-danger"><i class="fas fa fa-file"></i> File</a></td>
                            <td><span class="badge bg-success"> <i class="fas fa fa-check"></i> Lulus</span></td>
                            <td><button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#evaluasi_syarat_tambahan">
                                    <i class="fa fa-edit" aria-hidden="true"></i> Evaluasi
                                </button></td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Iso 1200</td>
                            <td><a href="" class="btn btn-sm btn-danger"><i class="fas fa fa-file"></i> File</a></td>
                            <td><span class="badge bg-danger"> <i class="fas fa fa-times"></i> Tidak Lulus</span></td>
                            <td><button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#evaluasi_syarat_tambahan">
                                    <i class="fa fa-edit" aria-hidden="true"></i> Evaluasi
                                </button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="evaluasi_syarat_tambahan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Evaluasi Hasil Syarat Tambahan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <div>
                        <i class="fa fa-info-circle" aria-hidden="true"> </i> Berikan Evaluasi Dan Validasi Syarat Tambahan Penyedia !!! <br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Keterngan Evaluasi Syarat Tambahan</label>
                    <textarea type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId"> </textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Close</button>
                <button type="button" class="btn btn-success"> <i class="fas fa fa-check"></i>Lulus Evaluasi</button>
                <button type="button" class="btn btn-danger"> <i class="fas fa fa-times"></i> Tidak Lulus Evaluasi</button>
            </div>
        </div>
    </div>
</div>