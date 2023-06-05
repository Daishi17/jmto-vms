var form_izin_usaha2 = $('#form_izin_usaha2')
form_izin_usaha2.on('submit', function(e) {
    var url_post = $('[name="url_post_siup"]').val()
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
            let timerInterval
            Swal.fire({
              title: 'Sedang Proses Menyimpan Data!',
              html: 'Membuat Data<b></b>',
              timer: 3000,
              timerProgressBar: true,
              didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                  b.textContent = Swal.getTimerLeft()
                }, 100)
              },
              willClose: () => {
                clearInterval(timerInterval)
                Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                get_row_vendor();
              }
            }).then((result) => {
              /* Read more about handling dismissals below */
              if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
              }
            })
        }
    })
})

function sts_berlaku_siup(){
    var sts_seumur_hidup = $('[name="sts_seumur_hidup_siup"]').val()
    if (sts_seumur_hidup == 1) {
        $('#tgl_berlaku_siup').attr("readonly", false); 
    } else {
        $('#tgl_berlaku_siup').attr("readonly", true); 
    }
}