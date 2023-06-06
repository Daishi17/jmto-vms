
function Terima_identitas() {
  var checkBox = document.getElementById("check_terima_identittas");
  if (checkBox.checked == true){
    $('#button_save').removeClass('disabled');
  } else {
      $('#button_save').addClass('disabled');
  }
}


$('#provinsitambah').change(function() {
  var url_provinsi = $('[name="url_provinsi"]').val();
  var id_provinsi = $('#provinsitambah').val();
  $.ajax({
    type: 'GET',
    url: url_provinsi + id_provinsi,
    success: function(html) {
      $('#kabupatentambah').html(html);
    }
  });
})		


$('#kabupatentambah').change(function() {
  var url_kecamatan = $('[name="url_kecamatan"]').val();
  var id_kabupaten = $('#kabupatentambah').val();
  $.ajax({
    type: 'GET',
    url: url_kecamatan + id_kabupaten,
    success: function(html) {
      $('#kecamatantambah').html(html);
    }
  });
})		