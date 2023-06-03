<script>
    var form_izin_usaha = $('#form_izin_usaha')

    form_izin_usaha.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url() ?>datapenyedia/add_izin_usaha",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache : false,
            processData: false,
            success: function(data) {
                form_izin_usaha[0].reset();
            }
        })
    })
</script>