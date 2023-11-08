<main class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card border-dark mt-3">
                <div class="card-header border-dark bg-white text-black">
                    <ul class="nav nav-tabs">
                        <!-- <li class="nav-item">
                            <a class="nav-link bg-primary text-white" aria-current="page"><i class="fa fa-list-alt" aria-hidden="true"> </i> Menu Pengadaan</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/informasi_tender/'  . $rup['id_url_rup']) ?>"><i class="fa fa-columns" aria-hidden="true"></i> Informasi Pengadaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" style="margin-left: 5px;" href="#"><i class="fa fa-comments" aria-hidden="true"></i> Aanwijzing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/negosiasi/' . $rup['id_url_rup']) ?>"><i class="fa fa-tags" aria-hidden="true"></i> Negosiasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/sanggahan_prakualifikasi/' . $rup['id_url_rup']) ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan Prakualifikasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/sanggahan_akhir/' . $rup['id_url_rup']) ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="#"><i class="fa fa-suitcase" aria-hidden="true"></i> Berita Acara</a>
                        </li> -->
                    </ul>
                </div>
            </div>
            <hr>
            <div class="card border-dark">
                <div class="card-header border-dark bg-white text-black">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h4>Informasi Pengadaan</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nama Paket</th>
                                    <td><?= $rup['nama_rup'] ?></td>
                                </tr>
                                <tr>
                                    <th>Nama Jenis Pengadaan</th>
                                    <td><?= $rup['nama_jenis_pengadaan'] ?></td>

                                </tr>
                                <tr>
                                    <th>Nama Metode Pemilihan </th>
                                    <td><?= $rup['nama_metode_pengadaan'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-file1" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Dokumen Pengadaan File I</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-file2" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Dokumen Penawaran File II</button>
                        </li>
                    </ul>

                </div>
            </div>
            <hr>
            <div class="card border-dark">
                <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-dark">
                            <small class="text-white"><strong><i class="fa-solid fa-table px-1"></i> Data Tabel - Dokumen Pengadaan</strong></small>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-file1" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    Dokumen Pengadaan File I
                                    <div style="float: right;">
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#upload_dok_file_1">
                                            + Upload Dokumen Pengadaan File I
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="table_dok_penawaran_file_I" class="table table-stripped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama File</th>
                                                <th>TKDN/PDN/IMPOR</th>
                                                <th>Persentase TKDN/PDN/IMPOR</th>
                                                <th>File</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-file2" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="card">
                                <div class="card-header bg-danger text-white">
                                    Dokumen Penawaran File II
                                    <div style="float: right;">
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#upload_dok_file_2">
                                            + Upload Dokumen Penawaran File II
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="table_dok_penawaran_file_II" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nilai Penawaran</th>
                                                <th>File Penawaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
<!-- Modal -->
<div class="modal fade" id="upload_dok_file_1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Dokumen Pengadaan File I</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_upload_dok_penawaran_1" action="javascript:;" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id_dokumen_pengadaan_vendor">
                    <input type="hidden" name="type_post" value="tambah">
                    <input type="hidden" name="id_rup" value="<?= $rup['id_rup'] ?>">
                    <input type="hidden" name="id_url_rup" value="<?= $rup['id_url_rup'] ?>">
                    <input type="hidden" name="id_vendor" value="<?= $this->session->userdata('id_vendor') ?>">
                    <div class="form-group">
                        <label for="">Nama File</label>
                        <input type="text" name="nama_dokumen_pengadaan_vendor" class="form-control" placeholder="Nama File" aria-describedby="helpId">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">TKDN/PDN/IMPOR</label>
                        <select name="tkdn_dokumen_pengadaan" class="form-control" id="">
                            <option value="">-- Pilih TKDN/PDN/IMPOR --</option>
                            <option value="TKDN">TKDN</option>
                            <option value="PDN">PDN</option>
                            <option value="IMPORT">IMPORT</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for=""> Persentase TKDN/PDN/IMPOR</label>
                        <input type="text" name="persentase_tkdn_dokumen_pengadaan" class="form-control number_only" placeholder="Persentase TKDN/PDN/IMPOR" aria-describedby="helpId">
                    </div>
                    <br>
                    <label for="">File Dokumen</label>
                    <div class="input-group">
                        <input type="file" class="form-control" accept=".xlsx, .xls, .pdf" name="file_dokumen_pengadaan_vendor">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-upload">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="upload_dok_file_2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Dokumen Penawaran File II</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form_upload_dok_penawaran_2" action="javascript:;" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id_rup" value="<?= $rup['id_rup'] ?>">
                    <input type="hidden" name="id_url_rup" value="<?= $rup['id_url_rup'] ?>">
                    <input type="hidden" name="id_vendor" value="<?= $this->session->userdata('id_vendor') ?>">
                    <br>
                    <label for="">File Dokumen</label>
                    <div class="input-group">
                        <input type="file" class="form-control" accept=".xlsx, .xls, .pdf" name="dok_penawaran_harga">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for=""> Nilai Penawaran</label>
                        <input type="text" name="nilai_penawaran_vendor" class="form-control nilai_penawaran_vendor number_only" placeholder="Nilai Penawaran" aria-describedby="helpId">
                        <div style="float: right;">
                            <input type="text" style="width: 200px;" id="rupiah_nilai_penawaran_vendor" readonly class="form-control " aria-describedby="helpId">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-upload">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>