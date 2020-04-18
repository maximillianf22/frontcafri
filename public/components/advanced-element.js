
$(function () {
     "use strict";
 
   
     //Initialize Select2 Elements
     $('.select2').select2();
     $('#date_order').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });

     //Datemask dd/mm/yyyy
     $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
     //Datemask2 mm/dd/yyyy
     $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' });
     //Money Euro
     $('[data-mask]').inputmask();


     //Date picker
     $('#datepicker').datepicker({
       autoclose: true
     });
 
  
     //iCheck for checkbox and radio inputs
     $('.ichack-input input[type="checkbox"].minimal, .ichack-input input[type="radio"].minimal').iCheck({
       checkboxClass: 'icheckbox_minimal-blue',
       radioClass: 'icheckbox_minimal-blue'
     });
     //Red color scheme for iCheck
     $('.ichack-input input[type="checkbox"].minimal-red, .ichack-input input[type="radio"].minimal-red').iCheck({
       checkboxClass: 'icheckbox_minimal-red',
       radioClass   : 'iradio_minimal-red'
     });
     //Flat red color scheme for iCheck
     $('.ichack-input input[type="checkbox"].flat-red, .ichack-input input[type="radio"].flat-red').iCheck({
       checkboxClass: 'icheckbox_flat-green',
       radioClass   : 'iradio_flat-green'
     });
 
     //Colorpicker
     $('.my-colorpicker1').colorpicker();
     //color picker with addon
     $('.my-colorpicker2').colorpicker();
 
     //Timepicker
     $('.timepicker').timepicker({
       showInputs: false
     });
   });
   