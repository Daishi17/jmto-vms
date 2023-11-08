<script>
    $(document).ready(function() {
        var get_data_tender = $('[name="get_data_tender"]').val();
        $('#tbl_tender_umum').DataTable({
            "ordering": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "dom": 'Bfrtip',
            "buttons": ["excel", "pdf", "print", "colvis"],
            "order": [],
            "ajax": {
                "url": get_data_tender,
                "type": "POST",
            },
            "columnDefs": [{
                "target": [-1],
                "orderable": false
            }],
            "oLanguage": {
                "sSearch": "Pencarian : ",
                "sEmptyTable": "Data Tidak Tersedia",
                "sLoadingRecords": "Silahkan Tunggu - loading...",
                "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                "sProcessing": "Memuat Data...."
            }
        }).buttons().container().appendTo('#data_pengalaman_manajerial .col-md-6:eq(0)');
    });

    function reload_table() {
        $('#tbl_tender_umum').DataTable().ajax.reload();
    }


    function by_id_rup(id_url_rup, type) {

        var url_detail_paket = $('[name="url_detail_paket"]').val();
        $.ajax({
            type: "GET",
            url: url_detail_paket + id_url_rup,
            dataType: "JSON",
            success: function(response) {
                $('#modal-xl-detail').modal('show')
                $('#kode_rup').text(response['row_rup'].kode_rup)
                $('#tahun_rup').text(response['row_rup'].tahun_rup)
                $('#nama_rup').text(response['row_rup'].nama_rup)
                $('#nama_departemen').text(response['row_rup'].nama_departemen)
                $('#nama_section').text(response['row_rup'].nama_section)
                $('#detail_lokasi_rup').text(response['row_rup'].detail_lokasi_rup)
                $('#nama_jenis_pengadaan').text(response['row_rup'].nama_jenis_pengadaan)
                $('#nama_metode_pengadaan').text(response['row_rup'].nama_metode_pengadaan)
                $('#nama_metode_pemilihan').text(response['row_rup'].metode_kualifikasi)
                $('#dokumen_pemilihan').text(response['row_rup'].metode_dokumen)
                $('#batas_pendaftaran').text(response['row_rup'].batas_pendaftaran_tender)
                $('#jangka_waktu_hari_pelaksanaan').text(response['row_rup'].jangka_waktu_hari_pelaksanaan)
                $('#status_pencatatan').text(response['row_rup'].status_pencatatan)
                $('#persen_pencatatan').text(response['row_rup'].persen_pencatatan)
                $('#total_hps_rup').text(currency(response['row_rup'].total_hps_rup))
                $('#jenis_kontrak').text(jenis_kontrak(response['row_rup'].jenis_kontrak))
                if (response['row_rup'].beban_tahun_anggaran == 1) {
                    $('#beban_tahun_anggaran').text('Tahun Tunggal')
                } else {
                    $('#beban_tahun_anggaran').text('Tahun Jamak')
                }

                if (response['row_rup'].bobot_nilai == 1) {
                    $('#bobot_nilai').text('Kombinasi')
                    $('#Bobot').text(response['row_rup'].bobot_teknis + '% ' + '& ' + response['row_rup'].bobot_teknis + '% ')
                } else if (response['row_rup'].bobot_nilai == 2) {
                    $('#bobot_nilai').text('Bobot Teknis')
                } else if (response['row_rup'].bobot_nilai == 3) {
                    $('#bobot_nilai').text('Bobot Biaya')
                }
                $('#jenis_kontrak').text(jenis_kontrak(response['row_rup'].jenis_kontrak))


                $('#detail_jadwal').html('<a href="javascript:;" onclick="lihat_detail_jadwal(\'' + response['row_rup'].id_url_rup + '\')" class="btn btn-sm btn-primary"><i class="fa-solid fa-calendar-days px-1"></i> Detail Jadwal Pengadaan</a>')

                // ini untuk get syarat izin administarsi legalitas rup

                $('#syarat_tender_kualifikasi').text(response['row_rup'].syarat_tender_kualifikasi)
                // siup
                if (response['row_syarat_administrasi_rup'].sts_checked_siup == 1) {
                    $('#siup_izin').css('display', 'block')
                    if (response['row_syarat_administrasi_rup'].sts_masa_berlaku_siup == 1) {
                        $('#sts_masa_berlaku_siup').text(response['row_syarat_administrasi_rup'].tgl_berlaku_siup)
                    } else {
                        $('#sts_masa_berlaku_siup').text('Seumur Hidup')
                    }
                } else {

                }

                // nib
                if (response['row_syarat_administrasi_rup'].sts_checked_nib == 1) {
                    $('#nib_izin').css('display', 'block')
                    if (response['row_syarat_administrasi_rup'].sts_masa_berlaku_nib == 1) {
                        $('#sts_masa_berlaku_nib').text(response['row_syarat_administrasi_rup'].tgl_berlaku_nib)
                    } else {
                        $('#sts_masa_berlaku_nib').text('Seumur Hidup')
                    }
                } else {

                }

                // sbu
                if (response['row_syarat_administrasi_rup'].sts_checked_sbu == 1) {
                    $('#sbu_izin').css('display', 'block')
                    if (response['row_syarat_administrasi_rup'].sts_masa_berlaku_sbu == 1) {
                        $('#sts_masa_berlaku_sbu').text(response['row_syarat_administrasi_rup'].tgl_berlaku_sbu)
                    } else {
                        $('#sts_masa_berlaku_sbu').text('Seumur Hidup')
                    }
                } else {

                }

                // siujk
                if (response['row_syarat_administrasi_rup'].sts_checked_siujk == 1) {
                    $('#siujk_izin').css('display', 'block')
                    if (response['row_syarat_administrasi_rup'].sts_masa_berlaku_siujk == 1) {
                        $('#sts_masa_berlaku_siujk').text(response['row_syarat_administrasi_rup'].tgl_berlaku_siujk)
                    } else {
                        $('#sts_masa_berlaku_siujk').text('Seumur Hidup')
                    }
                } else {

                }


                // skdp
                if (response['row_syarat_administrasi_rup'].sts_checked_skdp == 1) {
                    $('#skdp_izin').css('display', 'block')
                    if (response['row_syarat_administrasi_rup'].sts_masa_berlaku_skdp == 1) {
                        $('#sts_masa_berlaku_skdp').text(response['row_syarat_administrasi_rup'].tgl_berlaku_skdp)
                    } else {
                        $('#sts_masa_berlaku_skdp').text('Seumur Hidup')
                    }
                } else {
                    $('#skdp_izin').css('display', 'none')
                    $('#sts_masa_berlaku_skdp').text('Tidak Diperlukan')
                }

                $('#detail_jadwal').html('<a href="javascript:;" onclick="lihat_detail_jadwal(\'' + response['row_rup'].id_url_rup + '\')" class="btn btn-sm btn-primary"><i class="fa-solid fa-calendar-days px-1"></i> Detail Jadwal Pengadaan</a>')
                var url_info_tender = $('[name="url_info_tender"]').val()
                var url_target = url_info_tender + response['row_rup'].id_url_rup
                $('#tombol_mengikuti').html('<a href=' + url_target + ' class="btn btn-default btn-primary"><i class="fa-solid fa-circle-up px-1"></i> Lihat Pengadaan</a>')

            }
        })
    }


    function pakta_integritas_question(id, nama_paket) {
        var url_mengikuti = $('[name="url_mengikuti"]').val()
        Swal.fire({
            title: 'Nama Paket : ' + nama_paket,
            text: 'Apakah Anda Yakin Ingin Menjadi Peserta Pengadaan dan Menyetujui Pakta Integritas Pada PT. Jasamarga Tollroad Operator ? ',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Yakin!',
            cancelButtonText: 'Batal!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url_mengikuti,
                    data: {
                        id_rup: id,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Anda Berhasil Menjadi Peserta Pengadaan ' + nama_paket + ' Silahkan Periksa Di Menu Tender Mengikuti Untuk Melihat Informasi Pengadaan!',
                                'success'
                            )
                            $('#modal-xl-detail').modal('hide')
                            reload_table();
                        }
                    }
                })

            }
        })
    }

    function currency(rp) {
        let num = rp;
        let rupiahFormat = num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        return rupiahFormat;
    }

    function jenis_kontrak(jenis_kontrak) {
        if (jenis_kontrak == 1) {
            jenis_kontrak = 'Lump Sum'
        } else if (jenis_kontrak == 2) {
            jenis_kontrak = 'Harga Satuan'
        } else if (jenis_kontrak == 3) {
            jenis_kontrak = 'Gabungan Lump Sum dan Harga Satuan'
        } else if (jenis_kontrak == 4) {
            jenis_kontrak = 'Terima Jadi(Turnkey)'
        } else if (jenis_kontrak == 5) {
            jenis_kontrak = 'Persentase( % )'
        }
        return jenis_kontrak
    }

    function lihat_detail_jadwal(id_url_rup) {
        var url_detail_paket = $('[name="url_detail_paket"]').val();
        var modal_detail_jadwal = $('#modal_detail_jadwal')
        $.ajax({
            type: "GET",
            url: url_detail_paket + id_url_rup,
            dataType: "JSON",
            success: function(response) {
                modal_detail_jadwal.modal('show');
                var html = '';
                var i;
                var no = 1;
                for (i = 0; i < response['jadwal'].length; i++) {

                    var waktu_mulai = new Date(response['jadwal'][i].waktu_mulai);
                    var waktu_selesai = new Date(response['jadwal'][i].waktu_selesai);
                    var sekarang = new Date();
                    // kondisi jadwal
                    if (sekarang < waktu_mulai) {
                        var check = '';
                        var status_waktu = '<small><span class="badge bg-danger"><i class="fa fa-clock" aria-hidden="true"></i> Tahap Belum Mulai </span></small>';
                    } else if (sekarang >= waktu_mulai && sekarang <= waktu_selesai) {
                        var check = '';
                        var status_waktu = '<small><span class="badge bg-warning"><i class="fa fa-clock" aria-hidden="true"></i> Tahap Sedang Di Mulai </span></small>';
                    } else if (sekarang > waktu_selesai && sekarang <= waktu_selesai) {
                        var check = '<i class="fa fa-check text-success" aria-hidden="true"></i>';
                        var status_waktu = '<small><span class="badge bg-success"><i class="fa fa-clock" aria-hidden="true"></i> Tahap Sudah Selesai </span></small>';
                    } else {
                        var check = '<i class="fa fa-check text-success" aria-hidden="true"></i>';
                        var status_waktu = '<small><span class="badge bg-success"><i class="fa fa-clock" aria-hidden="true"></i> Tahap Sudah Selesai </span></small>';
                    }

                    html += '<tr>' +
                        '<td><small>' + no++ + '</small></td>' +
                        '<td><small>' + response['jadwal'][i].nama_jadwal_rup + ' ' + check + '</small></td>' +
                        '<td><small>' + response['jadwal'][i].waktu_mulai + '</small></td>' +
                        '<td><small>' + response['jadwal'][i].waktu_selesai + '</small></td>' +
                        '<td>' + status_waktu + '</td>' +
                        '</tr>';
                }
                $('#load_jadwal').html(html);
            }
        })
    }
</script>