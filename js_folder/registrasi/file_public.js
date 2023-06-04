function Terima() {
    var checkBox = document.getElementById("check_terima");
    if (checkBox.checked == true){
      $('#button_save').removeAttr('disabled');
    } else {
        $('#button_save').attr('disabled','disabled');
    }
  }