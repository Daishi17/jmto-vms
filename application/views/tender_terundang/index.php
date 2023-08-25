<main class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <div class="card border-primary">
                <div class="card-header bg-primary border-primary">
                    <h6 class="card-title">
                        <span class="text-white">
                            <i class="fas fa-user-tag"></i>
                            <small><strong>Elektronik Data Tender Terundang </strong></small>
                        </span>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-info shadow-lg" role="alert">
                        <h5 class="alert-heading">
                            <i class="fa-solid fa-circle-info px-1"></i>
                            Catatan!
                        </h5>
                        <hr>
                        <!-- <small>1. Fiture ini adalah untuk memonitoring kelengkapan status dokumen tervalidasi yang sudah di koreksi oleh pihak validator non penyedia berdasarkan data rangkuman profile perusahan.</small><br>
                        <small>2. Jika terdapat status dokumen <b>tidak valid</b> segera perbaiki dengan mengklik tombol <b>View</b>.</small><br> -->
                    </div>
                    <div class="card border-dark shadow-lg">
                        <div class="card-header bg-dark d-flex bd-highlight">
                            <div class="flex-grow-1 bd-highlight">
                                <span class="text-white">
                                    <i class="fa-regular fa-folder-open px-0"></i>
                                    <small><strong>Data Tabel - Tender Terundang</strong></small>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card border-danger shadow-lg">
                                <div class="card-header">
                                    <div class="nav nav-tabs mb-3 bg-danger" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-izin-tab" data-bs-toggle="tab" data-bs-target="#nav-tender" type="button" role="tab" aria-controls="nav-izin" aria-selected="true">
                                            <small class="text-dark">
                                                <i class="fa-regular fa-file fa-beat"></i>
                                                <b>Tender</b>
                                            </small>
                                        </button>
                                    </div>
                                    <div class="tab-content p-3 border bg-light" id="nav-tabContent">
                                        <div class="tab-pane fade active show" id="nav-tender" role="tabpanel" aria-labelledby="nav-izin-tab">
                                            <div class="card border-dark shadow-lg">
                                                <div class="card-header bg-dark d-flex bd-highlight">
                                                    <div class="flex-grow-1 bd-highlight">
                                                        <span class="text-white">
                                                            <i class="fa-regular fa-folder-open px-0"></i>
                                                            <small><strong>Data Tabel - Tender</strong></small>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <input type="hidden" name="get_data_tender" value="<?= base_url('tender_terundang/get_data_tender') ?>">
                                                    <table id="tbl_tender" class="table table-sm table-bordered table-striped">
                                                        <thead class="bg-secondary">
                                                            <tr>
                                                                <th style="width:2%;"><small class="text-white">No </small></th>
                                                                <th style="width:20%;"><small class="text-white">Nama Paket</small></th>

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
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>