
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