var form_nib = $('#form_nib')
form_nib.on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        url: "<?= base_url() ?>datapenyedia/add_nib",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache : false,
        processData: false,
        success: function(data) {
            form_nib[0].reset();
        }
    })
})
