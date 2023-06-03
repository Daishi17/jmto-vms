<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-outline card-primary">
        <div class="card-header">
            <i class="fas fa-file-import mr-2"></i>
            <strong>Izin Usaha -
                <span class="text-secondary">Kreatif Intelegensi Teknologi</span>
            </strong>
        </div>

        <div class="card-body">
            <div class="card card-primary card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-four-nib-tab" data-toggle="pill" href="#custom-tabs-four-nib" role="tab" aria-controls="custom-tabs-four-nib" aria-selected="true">
                                <strong>
                                    <i class="far fa-file-word mr-2"></i>
                                    NIB
                                </strong>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-siup-tab" data-toggle="pill" href="#custom-tabs-four-siup" role="tab" aria-controls="custom-tabs-four-siup" aria-selected="false">
                                <strong>
                                    <i class="far fa-file-powerpoint mr-2"></i>
                                    SIUP
                                </strong>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-sbu-tab" data-toggle="pill" href="#custom-tabs-four-sbu" role="tab" aria-controls="custom-tabs-four-sbu" aria-selected="false">
                                <strong>
                                    <i class="far fa-file-excel mr-2"></i>
                                    SBU
                                </strong>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-siujk-tab" data-toggle="pill" href="#custom-tabs-four-siujk" role="tab" aria-controls="custom-tabs-four-siujk" aria-selected="false">
                                <strong>
                                    <i class="far fa-file-pdf mr-2"></i>
                                    SIUJK
                                </strong>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <!-- setting body nav-tab nib -->
                        <div class="tab-pane fade show active" id="custom-tabs-four-nib" role="tabpanel" aria-labelledby="custom-tabs-four-nib-tab">
                            <div class="card card-outline card-danger">
                                <div class="card-header">
                                    <i class="fas fa-file-alt mr-2"></i>
                                    <strong> Form Izin Usaha -
                                        <span class="text-secondary">Nomor Induk Berusaha (NIB)</span>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-warning btn-sm" disabled>
                                            <i class="fas fa-edit mr-2"></i>
                                            Edit Changes
                                        </button>
                                    </div>
                                </div>
                                <form id="form_izin_usaha" enctype="multipart/form-data">
                                    <input type="text" value="<?= base_url('datapenyedia/add_izin_usaha') ?>" name="url_post">
                                    <div class="card-body">
                                        <table class="table table-sm table-bordered">
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Jenis Izin
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Nomor Induk Berusaha" disabled>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Nomor Surat
                                                    </label>
                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-qrcode"></i></span>
                                                            </div>
                                                            <input type="text" name="nomor_surat" class="form-control form-control-sm" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Berlaku Sampai
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <select name="sts_seumur_hidup" class="custom-select rounded-1 text-sm" id="exampleSelectRounded1">
                                                                <option value="1">Seumur Hidup</option>
                                                                <option value="2">Tanggal</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2" colspan="2">
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask disabled>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Kualifikasi Izin
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-server"></i></span>
                                                            </div>
                                                            <select name="kualifikasi_izin" class="custom-select rounded-2 text-sm" id="exampleSelectRounded2">
                                                                <option value="Besar">Besar</option>
                                                                <option value="Menengah">Menengah</option>
                                                                <option value="Kecil (Mikro UMKM)">Kecil (Mikro UMKM)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Upload Dokumen
                                                    </label>
                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="file_dokumen">
                                                            </div>
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-upload"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        File Dokumen
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <a href="#" class="nav-link">
                                                            <i class="far fa-file-pdf mr-2"></i>
                                                            <label for="" class="file"><?= $get_row_nib['file_dokumen']?></label>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="col-sm-4" colspan="2">
                                                    <div class="button_enkrip">

                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Input Kode KBLI
                                                    </label>
                                                </td>
                                                <td class="col-sm-3" colspan="3">
                                                    <div class="col-sm-3">
                                                        <button type="button" class="btn btn-block btn-danger btn-sm" data-toggle="modal" data-target="#modal-lg-kbli">
                                                            <i class="far fa-file-alt mr-2"></i>
                                                            Form Input KBLI
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fas fa-save mr-2"></i>
                                            Simpan
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm">
                                            <i class="fas fa-ban mr-2"></i>
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end setting body nav-tab nib -->
                        <div class="tab-pane fade" id="custom-tabs-four-siup" role="tabpanel" aria-labelledby="custom-tabs-four-siup-tab">
                            <div class="card card-outline card-warning">
                                <div class="card-header">
                                    <i class="fas fa-file-alt mr-2"></i>
                                    <strong> Form Izin Usaha -
                                        <span class="text-secondary">Surat Izin Usaha Perdagangan (SIUP)</span>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-warning btn-sm" disabled>
                                            <i class="fas fa-edit mr-2"></i>
                                            Edit Changes
                                        </button>
                                    </div>
                                </div>
                                <form>
                                    <div class="card-body">
                                        <table class="table table-sm table-bordered">
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Jenis Izin
                                                    </label>
                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Surat Izin Usaha Perdagangan" disabled>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Nomor Surat
                                                    </label>
                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-qrcode"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control form-control-sm" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Berlaku Sampai
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <select class="custom-select rounded-1 text-sm" id="exampleSelectRounded1">
                                                                <option>Seumur Hidup</option>
                                                                <option>Tanggal</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2" colspan="2">
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Kualifikasi Izin
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-server"></i></span>
                                                            </div>
                                                            <select class="custom-select rounded-2 text-sm" id="exampleSelectRounded2">
                                                                <option>Besar</option>
                                                                <option>Menengah</option>
                                                                <option>Kecil (Mikro UMKM)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Upload Dokumen
                                                    </label>
                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                                <label class="custom-file-label" for="exampleInputFile">Nama File</label>
                                                            </div>
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-upload"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        File Dokumen
                                                    </label>
                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="col-sm-12">
                                                        <a href="#" class="nav-link">
                                                            <i class="far fa-file-pdf mr-2"></i>
                                                            Dokumen SIUP.pdf
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="col-sm-4" colspan="2">
                                                    <button type="button" class="btn btn-success btn-sm">
                                                        <i class="fas fa-lock mr-2"></i>
                                                        Enkripsi Doc
                                                    </button>
                                                    <button type="button" class="btn btn-warning btn-sm" disabled>
                                                        <i class="fas fa-unlock-alt mr-2"></i>
                                                        Dekripsi Doc
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Input Kode KBLI
                                                    </label>
                                                </td>
                                                <td class="col-sm-3" colspan="3">
                                                    <div class="col-sm-3">
                                                        <button type="button" class="btn btn-block btn-warning btn-sm" data-toggle="modal" data-target="#modal-lg-siup">
                                                            <i class="far fa-file-alt mr-2"></i>
                                                            Form Input KBLI
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" disabled>
                                            <i class="fas fa-save mr-2"></i>
                                            Save Changes
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm">
                                            <i class="fas fa-ban mr-2"></i>
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-sbu" role="tabpanel" aria-labelledby="custom-tabs-four-sbu-tab">
                            <div class="card card-outline card-success">
                                <div class="card-header">
                                    <i class="fas fa-file-alt mr-2"></i>
                                    <strong> Form Izin Usaha -
                                        <span class="text-secondary">Sertifikat Badan Usaha (SBU)</span>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-warning btn-sm" disabled>
                                            <i class="fas fa-edit mr-2"></i>
                                            Edit Changes
                                        </button>
                                    </div>
                                </div>
                                <form>
                                    <div class="card-body">
                                        <table class="table table-sm table-bordered">
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Jenis Izin
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Sertifikat Badan Usaha" disabled>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Nomor Surat
                                                    </label>
                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-qrcode"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control form-control-sm" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Berlaku Sampai
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <select class="custom-select rounded-1 text-sm" id="exampleSelectRounded1">
                                                                <option>Seumur Hidup</option>
                                                                <option>Tanggal</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2" colspan="2">
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Kualifikasi Izin
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-server"></i></span>
                                                            </div>
                                                            <select class="custom-select rounded-2 text-sm" id="exampleSelectRounded2">
                                                                <option>Besar</option>
                                                                <option>Menengah</option>
                                                                <option>Kecil (Mikro UMKM)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Upload Dokumen
                                                    </label>
                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                                <label class="custom-file-label" for="exampleInputFile">Nama File</label>
                                                            </div>
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-upload"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        File Dokumen
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <a href="#" class="nav-link">
                                                            <i class="far fa-file-pdf mr-2"></i>
                                                            Dokumen SBU.pdf
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="col-sm-4" colspan="2">
                                                    <button type="button" class="btn btn-success btn-sm">
                                                        <i class="fas fa-lock mr-2"></i>
                                                        Enkripsi Doc
                                                    </button>
                                                    <button type="button" class="btn btn-warning btn-sm" disabled>
                                                        <i class="fas fa-unlock-alt mr-2"></i>
                                                        Dekripsi Doc
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Input Kode SBU
                                                    </label>
                                                </td>
                                                <td class="col-sm-3" colspan="3">
                                                    <div class="col-sm-3">
                                                        <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#modal-lg-sbu">
                                                            <i class="far fa-file-alt mr-2"></i>
                                                            Form Input SBU
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" disabled>
                                            <i class="fas fa-save mr-2"></i>
                                            Save Changes
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm">
                                            <i class="fas fa-ban mr-2"></i>
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-siujk" role="tabpanel" aria-labelledby="custom-tabs-four-siujk-tab">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <i class="fas fa-file-alt mr-2"></i>
                                    <strong> Form Izin Usaha -
                                        <span class="text-secondary">Surat Izin Usaha Jasa Konstruksi (SIUJK)</span>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-warning btn-sm" disabled>
                                            <i class="fas fa-edit mr-2"></i>
                                            Edit Changes
                                        </button>
                                    </div>
                                </div>
                                <form>
                                    <div class="card-body">
                                        <table class="table table-sm table-bordered">
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Jenis Izin
                                                    </label>
                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Surat Izin Usaha Jasa Konstruksi" disabled>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Nomor Surat
                                                    </label>
                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-qrcode"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control form-control-sm" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Berlaku Sampai
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <select class="custom-select rounded-1 text-sm" id="exampleSelectRounded1">
                                                                <option>Seumur Hidup</option>
                                                                <option>Tanggal</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2" colspan="2">
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Kualifikasi Izin
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-server"></i></span>
                                                            </div>
                                                            <select class="custom-select rounded-2 text-sm" id="exampleSelectRounded2">
                                                                <option>Besar</option>
                                                                <option>Menengah</option>
                                                                <option>Kecil (Mikro UMKM)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Upload Dokumen
                                                    </label>
                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                                <label class="custom-file-label" for="exampleInputFile">Nama File</label>
                                                            </div>
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-upload"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        File Dokumen
                                                    </label>
                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="col-sm-12">
                                                        <a href="#" class="nav-link">
                                                            <i class="far fa-file-pdf mr-2"></i>
                                                            Dokumen SIUJK.pdf
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="col-sm-4" colspan="2">
                                                    <button type="button" class="btn btn-success btn-sm">
                                                        <i class="fas fa-lock mr-2"></i>
                                                        Enkripsi Doc
                                                    </button>
                                                    <button type="button" class="btn btn-warning btn-sm" disabled>
                                                        <i class="fas fa-unlock-alt mr-2"></i>
                                                        Dekripsi Doc
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" disabled>
                                            <i class="fas fa-save mr-2"></i>
                                            Save Changes
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm">
                                            <i class="fas fa-ban mr-2"></i>
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Catatan!</h4>
                <p>
                    <hr>
                </p>by: Unit Eprocurement JMTO
            </div>
        </div>
        <!-- /.card-footer-->

    </div>
    <!-- /.card -->

    <div class="modal fade" id="modal-lg-kbli">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5> <img src="<?php echo base_url(); ?>assets/template/frontend/dist/img/jmto_rev1.png" class="brand-image img-circle elevation-3" style="opacity: .8">
                        <span class="text-primary">
                            <strong>Jasamarga Tollroad Operator</strong>
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-danger card-outline">
                        <div class="card-header">
                            <i class="fas fa-building"></i>
                            <span class="text-secondary">
                                <strong>Kreatif Intelegensi Teknologi</strong> - Nomor Induk Berusaha (NIB)
                            </span>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" novalidate>
                                <table class="table table-bordered table-sm">
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <!--<span class="col-sm-10" for="inputKode">
                                            <strong>Kode KBLI</strong>
                                        </span> -->
                                            <label for="inputKode" class="col-sm-10  col-form-label">Kode KBLI</label>
                                        </td>
                                        <td class="col-mb-2">
                                            <div class="col-sm-12">
                                                <select class="form-control select2bs4" style="width: 100%;">
                                                    <option selected="selected">62019 || Aktivitas Pemrograman Komputer Lainnya</option>
                                                    <option>46512 || Perdagangan Besar Piranti Lunak</option>
                                                    <option>47413 || Perdagangan Eceran Piranti Lunak (Software)</option>
                                                    <option>58200 || Penerbitan Piranti Lunak (software)</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="col-sm-1">
                                            <span type="button" class="badge badge-info">
                                                <strong>
                                                    <a class="nav-link">
                                                        <span class="text-white"><i class="fas fa-save mr-2"></i>Insert</span>
                                                    </a>
                                                </strong>
                                            </span>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 200px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap table-sm">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>62019</td>
                                                <td>Aktivitas Pemrograman Komputer Lainnya</td>
                                                <td>
                                                    <span class="badge badge-success">
                                                        <strong>Sudah Tervalidasi</strong>
                                                    </span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash mr-2"></i>
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>46512</td>
                                                <td>Perdagangan Besar Piranti Lunak</td>
                                                <td>
                                                    <span class="badge badge-danger">
                                                        <strong>Data Tidak Valid</strong>
                                                    </span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash mr-2"></i>
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>47413</td>
                                                <td>Perdagangan Eceran Piranti Lunak (Software)</td>
                                                <td>
                                                    <span class="badge badge-warning">
                                                        <strong>Belum Tervalidasi</strong>
                                                    </span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash mr-2"></i>
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times-circle mr-2"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-lg-siup">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5> <img src="<?php echo base_url(); ?>assets/template/frontend/dist/img/jmto_rev1.png" class="brand-image img-circle elevation-3" style="opacity: .8">
                        <span class="text-primary">
                            <strong>Jasamarga Tollroad Operator</strong>
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-warning card-outline">
                        <div class="card-header">
                            <i class="fas fa-building"></i>
                            <span class="text-secondary">
                                <strong>Kreatif Intelegensi Teknologi</strong> - Surat Izin Usaha Perdagangan (SIUP)
                            </span>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" novalidate>
                                <table class="table table-bordered table-sm">
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <!--<span class="col-sm-10" for="inputKode">
                                            <strong>Kode KBLI</strong>
                                        </span> -->
                                            <label for="inputKode" class="col-sm-10  col-form-label">Kode KBLI</label>
                                        </td>
                                        <td class="col-mb-2">
                                            <div class="col-sm-12">
                                                <select class="form-control select2bs4" style="width: 100%;">
                                                    <option selected="selected">62019 || Aktivitas Pemrograman Komputer Lainnya</option>
                                                    <option>46512 || Perdagangan Besar Piranti Lunak</option>
                                                    <option>47413 || Perdagangan Eceran Piranti Lunak (Software)</option>
                                                    <option>58200 || Penerbitan Piranti Lunak (software)</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="col-sm-1">
                                            <span type="button" class="badge badge-info">
                                                <strong>
                                                    <a class="nav-link">
                                                        <span class="text-white"><i class="fas fa-save mr-2"></i>Insert</span>
                                                    </a>
                                                </strong>
                                            </span>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 200px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap table-sm">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>62019</td>
                                                <td>Aktivitas Pemrograman Komputer Lainnya</td>
                                                <td>
                                                    <span class="badge badge-success">
                                                        <strong>Sudah Tervalidasi</strong>
                                                    </span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash mr-2"></i>
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>46512</td>
                                                <td>Perdagangan Besar Piranti Lunak</td>
                                                <td>
                                                    <span class="badge badge-danger">
                                                        <strong>Data Tidak Valid</strong>
                                                    </span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash mr-2"></i>
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>47413</td>
                                                <td>Perdagangan Eceran Piranti Lunak (Software)</td>
                                                <td>
                                                    <span class="badge badge-warning">
                                                        <strong>Belum Tervalidasi</strong>
                                                    </span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash mr-2"></i>
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times-circle mr-2"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-lg-sbu">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5> <img src="<?php echo base_url(); ?>assets/template/frontend/dist/img/jmto_rev1.png" class="brand-image img-circle elevation-3" style="opacity: .8">
                        <span class="text-primary">
                            <strong>Jasamarga Tollroad Operator</strong>
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <i class="fas fa-building"></i>
                            <span class="text-secondary">
                                <strong>Kreatif Intelegensi Teknologi</strong> - Sertifikat Badan Usaha (SBU)
                            </span>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" novalidate>
                                <table class="table table-bordered table-sm">
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <!--<span class="col-sm-10" for="inputKode">
                                            <strong>Kode KBLI</strong>
                                        </span> -->
                                            <label for="inputKode" class="col-sm-10  col-form-label">Kode SBU</label>
                                        </td>
                                        <td class="col-mb-2">
                                            <div class="col-sm-12">
                                                <select class="form-control select2bs4" style="width: 100%;">
                                                    <option selected="selected">BG001 || Konstruksi Gedung Hunian</option>
                                                    <option>BG002 || Konstruksi Gedung Perkantoran</option>
                                                    <option>BG003 || Konstruksi Gedung Industri</option>
                                                    <option>BG004 || Konstruksi Gedung Perbelanjaan</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="col-sm-1">
                                            <span type="button" class="badge badge-info">
                                                <strong>
                                                    <a class="nav-link">
                                                        <span class="text-white"><i class="fas fa-save mr-2"></i>Insert</span>
                                                    </a>
                                                </strong>
                                            </span>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 200px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap table-sm">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>62019</td>
                                                <td>Aktivitas Pemrograman Komputer Lainnya</td>
                                                <td>
                                                    <span class="badge badge-success">
                                                        <strong>Sudah Tervalidasi</strong>
                                                    </span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash mr-2"></i>
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>46512</td>
                                                <td>Perdagangan Besar Piranti Lunak</td>
                                                <td>
                                                    <span class="badge badge-danger">
                                                        <strong>Data Tidak Valid</strong>
                                                    </span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash mr-2"></i>
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>47413</td>
                                                <td>Perdagangan Eceran Piranti Lunak (Software)</td>
                                                <td>
                                                    <span class="badge badge-warning">
                                                        <strong>Belum Tervalidasi</strong>
                                                    </span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash mr-2"></i>
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times-circle mr-2"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->