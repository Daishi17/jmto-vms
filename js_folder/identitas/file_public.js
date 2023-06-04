function Terima_identitas() {
  var checkBox = document.getElementById("check_terima_identittas");
  if (checkBox.checked == true){
    $('#button_save').removeClass('disabled');
  } else {
      $('#button_save').addClass('disabled');
  }
}