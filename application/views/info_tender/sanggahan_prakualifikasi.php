<input type="hidden" name="url_upload_sanggahan_pra" value="<?= base_url('tender_diikuti/upload_sanggahan_pra/') ?>">
<input type="hidden" name="url_hapus_sanggahan_pra" value="<?= base_url('tender_diikuti/hapus_sanggahan_pra/') ?>">
<input type="hidden" name="url_get_sanggahan_pra" value="<?= base_url('tender_diikuti/get_sanggahan_pra/') ?>">
<input type="hidden" name="url_open_sanggahan_pra" value="<?= base_url('file_paket/' . $rup['nama_rup'] . '/' . $this->session->userdata('nama_usaha') . '/SANGGAHAN_PRAKUALIFIKASI' . '/') ?>">
<input type="hidden" name="url_open_sanggahan_pra_panitia" value="http://localhost/jmto-eproc/file_paket/<?= $rup['nama_rup'] ?>/">
<input type="hidden" name="id_rup" value="<?= $rup['id_rup'] ?>">
<input type="hidden" name="id_vendor" value="<?= $this->session->userdata('id_vendor') ?>">

<main class="container">
    <div class="row">
        <div class="col">
            <div class="card border-dark mt-3">
                <div class="card-header border-dark bg-white text-black">
                    <ul class="nav nav-tabs">
                        <!-- <li class="nav-item">
                            <a class="nav-link bg-primary text-white" aria-current="page"><i class="fa fa-list-alt" aria-hidden="true"> </i> Menu Pengadaan</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/informasi_tender/' . $rup['id_url_rup']) ?>"><i class="fa fa-columns" aria-hidden="true"></i> Informasi Pengadaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/aanwijzing/' . $rup['id_url_rup']) ?>"><i class="fa fa-comments" aria-hidden="true"></i> Aanwijzing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary text-white" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/negosiasi/' . $rup['id_url_rup']) ?>"><i class="fa fa-tags" aria-hidden="true"></i> Negosiasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" style="margin-left: 5px;" href="<?= base_url('tender_diikuti/sanggahan_prakualifikasi') ?>"><i class="fa fa-hourglass-start" aria-hidden="true"></i> Sanggahan Prakualifikasi</a>
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
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>Informasi Pengadaan</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th style="width: 400px;">Nama Paket</th>
                                <td><?= $rup['nama_rup'] ?></td>
                            </tr>
                            <tr>
                                <th>Kode Tender</th>
                                <td><?= $rup['kode_rup'] ?></td>
                            </tr>
                            <tr>
                                <th>Nama Jenis Pengadaan</th>
                                <td>Pengadaan <?= $rup['nama_jenis_pengadaan'] ?></td>
                            </tr>
                            <tr>
                                <th>Nama Metode Pemilihan </th>
                                <td><?= $rup['nama_metode_pengadaan'] ?> <?= $rup['metode_kualifikasi'] ?> (<?= $rup['metode_dokumen'] ?>)</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-header border-dark bg-primary d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 bd-highlight">
                        <span class="text-dark">
                            <small class="text-white"><strong><i class="fa-solid fa-table px-1"></i> Data Tabel - Sanggahan Prakualifikasi</strong></small>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal_sanggahan_prakualifikasi" class="btn btn-sm btn-primary mb-2"><i class="fa fa-upload"></i> Kirim Sanggahan </a>
                    <table class="table table-bordered">
                        <thead class="bg-primary text-white">
                            <tr>
                                <!-- <th>No</th> -->
                                <th width="200px">Nama Peserta</th>
                                <th>Keterangan Penyedia</th>
                                <th>Download File</th>
                                <th>File Balasan</th>
                                <th>Keterangan Panitia</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tbl_sanggah_pra">
                            <!-- <tr>
                                <td widtd="200px">PT. PANGRANGO</td>
                                <td>FILE SANGGAHAN</td>
                                <td><a href="#"><img src="<?= base_url('assets/img/pdf.png') ?>" alt="File Sanggah" width="30px"></a> </td>
                                <td><a href="#"><img src="<?= base_url('assets/img/pdf.png') ?>" alt="File Sanggah" width="30px"></a></td>
                                <td>Sanggahan Diterima Pengadaan akan segera diulang</td>
                                <td><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a></td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</main>


<div class="modal fade" id="modal_sanggahan_prakualifikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-bullhorn" aria-hidden="true"></i> Upload Sanggahan Prakualifikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="javascript:;" id="form_sanggahan_prakualifikasi">
                <div class="modal-body">
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <div>
                            <i class="fa fa-info-circle" aria-hidden="true"> </i> Silahkan Masukkan File Sanggahan Prakualifikasi !!! <br>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_rup" value="<?= $rup['id_rup'] ?>">
                        <table class="table table-bordered">
                            <tr>
                                <th>Keterangan</th>
                                <td><textarea name="ket_sanggah_pra" class="form-control"></textarea></td>
                            </tr>
                            <tr>
                                <th>Upload</th>
                                <td><input type="file" name="file_sanggah_pra"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Batal</button>
                    <button type="submit" class="btn btn-success btn-sanggah"><i class="fas fa fa-upload"></i> Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>