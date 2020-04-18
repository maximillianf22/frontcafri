$(document).ready(function() {
  //Datepicker
  $('.datepicker').datepicker({
    format: "dd/mm/yyyy",
    autoclose:true,
    todayHighlight: true,
    language: "es"
  });

  //Campo de texto numerico
  $('.number_input').on('keypress', function (e) {
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
  });
});
