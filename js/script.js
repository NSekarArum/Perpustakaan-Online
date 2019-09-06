$(document).ready(function() {

  //event ketika keyword ditulis
  $('#keyword').on('keyup', function(){
    $('#container').load('ajax/coba.php?keyword=' + $('#keyword').val());
  });

});
