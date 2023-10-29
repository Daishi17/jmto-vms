<script>
    load_syarat_tambahan()

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

    function upload_syarat_tambahan(nama_persyaratan_tambahan) {
        var id_rup = $('[name="id_rup"]').val()
        $('#modal_syarat_tambahan').modal('show')
        $('#nama_syarat_tambahan').text(nama_persyaratan_tambahan)
        $('[name="nama_persyaratan_tambahan"]').val(nama_persyaratan_tambahan)

    }

    function load_syarat_tambahan() {
        var id_rup = $('[name="id_rup"]').val()
        var id_vendor = $('[name="id_vendor"]').val()
        var url_get_syarat_tambahan_vendor = $('[name="url_get_syarat_tambahan_vendor"]').val()
        $.ajax({
            type: "POST",
            url: url_get_syarat_tambahan_vendor,
            data: {
                id_rup: id_rup,
                id_vendor: id_vendor
            },
            dataType: "JSON",
            success: function(response) {
                var no = 1;
                var html = '';
                for (i = 0; i < response['syarat_tambahan'].length; i++) {
                    if (response['syarat_tambahan'][i].nama_validator) {
                        var nama_validator = response['syarat_tambahan'][i].nama_validator
                    } else {
                        var nama_validator = '-'
                    }

                    if (response['syarat_tambahan'][i].status) {
                        var status_dicek = response['syarat_tambahan'][i].status
                    } else {
                        var status_dicek = '<span class="badge bg-secondary">Belum Di Cek</span>'
                    }
                    html += '<tr>' +
                        '<td><small>' + no++ + '</small></td>' +
                        '<td><small>' + response['syarat_tambahan'][i].nama_syarat_tambahan + '</small></td>' +
                        '<td><a href="" target="_blank" onclick="download_file_syarat_tambahan(' + response['syarat_tambahan'][i].id_vendor_syarat_tambahan + ')" class="btn btn-sm btn-warning"><i class="fas fa fa-file"></i> Download File </a></td>' +
                        '<td><small>' + nama_validator + '</small></td>' +
                        '<td><small>' + status_dicek + '</small></td>' +
                        '<td><a href="javascript:;"  onclick="delete_syarat_tambahan(\'' + response['syarat_tambahan'][i].id_vendor_syarat_tambahan + '\'' + ',' + '\'' + response['syarat_tambahan'][i].nama_syarat_tambahan + '\')" class="btn btn-sm btn-danger"><i class="fas fa fa-trash"></i> Hapus </a></td>' +
                        '</tr>';
                }
                $('#load_syarat_tambahan_vendor').html(html);
            }
        })
    }

    function delete_syarat_tambahan(id_vendor_syarat_tambahan, nama_syarat_tambahan) {
        var url_hapus_persyaratan_tambahan = $('[name="url_hapus_persyaratan_tambahan"]').val()
        Swal.fire({
            title: 'Apakah Anda Yakin Ingin Menghapus Persyaratan Tambahan ' + nama_syarat_tambahan + '?',
            text: 'Peringatan! Data Yang Sudah Di Hapus Tidak Dapat Di Kembalikan Lagi! ',
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
                    url: url_hapus_persyaratan_tambahan,
                    data: {
                        id_vendor_syarat_tambahan: id_vendor_syarat_tambahan,
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response == 'success') {
                            Swal.fire(
                                'Berhasil!',
                                'Data Berhasil Di Hapus!',
                                'success'
                            )
                            $('#modal_syarat_tambahan').modal('hide')
                            load_syarat_tambahan()
                        }
                    }
                })

            }
        })
    }

    function download_file_syarat_tambahan(id_syarat_tambahan) {

        var url_download_syarat_tambahan = $('[name="url_download_syarat_tambahan"]').val()

        window.open(url_download_syarat_tambahan + id_syarat_tambahan, '_blank');
    }

    var form_perysaratan_tambahan = $('#form_perysaratan_tambahan')
    form_perysaratan_tambahan.on('submit', function(e) {
        var url_upload_syarat_tambahan = $('[name="url_upload_syarat_tambahan"]').val();
        var file_syarat_tambahan = $('[name="file_syarat_tambahan"]').val();
        if (file_syarat_tambahan == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Dokumen Wajib Di Isi!',
            })
        } else {
            e.preventDefault();
            $.ajax({
                url: url_upload_syarat_tambahan,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn-syarat-tambahan').attr("disabled", true);
                },
                success: function(response) {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Menyimpan Data!',
                        html: 'Membuat Data <b></b>',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                // b.textContent = Swal.getTimerRight()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                            Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                            $('#modal_syarat_tambahan').modal('hide')
                            load_syarat_tambahan()
                            $('.btn-syarat-tambahan').attr("disabled", false);
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            })
        }
    })
</script>