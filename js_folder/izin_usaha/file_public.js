get_row_vendor();
function get_row_vendor() {
    console.log('angga');
    var id_url_vendor = $('[name="id_url_vendor"]').val()
    var secret_token = $('[name="secret_token"]').val()
    var url_get_row_vendor = $('[name="url_get_row_vendor"]').val()
    $.ajax({
        method: "POST",
        url: url_get_row_vendor + id_url_vendor,
        dataType: "JSON",
        data:{
            secret_token:secret_token,
        },
        success: function(response) {
            if (response == 'maaf') {
                alert('Maaf Anda Kurang Beruntung');
            } else {
                $('[name="jenis_izin"]').val(response['row_nib']['jenis_izin']);
                $('[name="no_urut_nib"]').val(response['row_nib']['no_urut_nib']);
                $('[name="nomor_surat"]').val(response['row_nib']['nomor_surat']);
                $('[name="kualifikasi_izin"]').val(response['row_nib']['kualifikasi_izin']);
            }
          
        }
    })
}



var form_izin_usaha = $('#form_izin_usaha')
form_izin_usaha.on('submit', function(e) {
    var url_post = $('[name="url_post"]').val()
    console.log(url_post);
    e.preventDefault();
    $.ajax({
        url: url_post,
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache : false,
        processData: false,
        success: function(response) {
            $('.file').text(response['row_nib'].file_dokumen)
            if (response['row_nib'].sts_token_dokumen == 1) {
                $('.button_enkrip').html('<a href="javascript:;" onclick="Enkrip(' + response['row_nib'].file_dokumen + ')" class="btn btn-waning btn-sm"><i class="fas fa-lock mr-2"></i>Dekrip Doc</a>');
            } else {
                $('.button_enkrip').html('<a href="javascript:;" onclick="Dekrip(' + response['row_nib'].file_dokumen + ')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i>Enkrip Doc</a>');
            }
        }
    })
})

