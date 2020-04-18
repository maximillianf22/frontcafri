/*
$(document).ready( function(){
     $('.view-password').click(function(){
          if($('.view-password').html()=="show"){
               $('.view-password').html('hide');
               $('#password').removeAttr('password');
               $('#password').attr('type','text');
          }else{
               $('.view-password').html('show');
               $('#password').removeAttr('text');
               $('#password').attr('type','password');
          }
     });
});
*/

function viewProduct($idProduct){
     $('#viewProduct').modal('show');
}

