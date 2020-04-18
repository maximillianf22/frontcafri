/*-----*/
$(document).ready(function(){  
    
   /*Validar el aceptar terminos y condiciones - form registro */
    $(".term_condiciones").click(function() {  
        if($(".term_condiciones").is(':checked')) {  
            $("#formRegister").prop('disabled', false);
        } else {  
            $("#formRegister").prop('disabled', true);
        }  
    }); 
    /*---------------------------------------------------------*/
    $('#profilePicture').change(function(e) { addImage(e);});

});


function addImage(e){
    var file = e.target.files[0],
    imageType = /image.*/;
    if (!file.type.match(imageType))
    return;
    var reader = new FileReader();
    reader.onload = fileOnload;
    reader.readAsDataURL(file);
}

function fileOnload(e) {
  
    var RefAction_= "imgProfile";
    var DataFile_ = $("#profilePicture").prop('files');
    var idProfile_ =$("#profilePicture").data("id");
  
    var result=e.target.result;
    $('#previewProfileImage').attr("src",result);
}
/**/


/*---- */
function isValidDate(day,month,year){
    var dteDate;
    month=month-1;
    dteDate=new Date(year,month,day);
    return ((day==dteDate.getDate()) && (month==dteDate.getMonth()) && (year==dteDate.getFullYear()));
}
function validate_fecha(fecha){
    var patron=new RegExp("^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$");
    if(fecha.search(patron)==0){
        var values=fecha.split("-");
        if(isValidDate(values[2],values[1],values[0])){return true; }
    }
    return false;
}
function calcularEdad(){
     var fecha=document.getElementById("fechaNac").value;
     var values=fecha.split("/");
     var dia_ = values[1];
     var mes_ = values[0];
     var ano_ = values[2];
     var NewFecha_=ano_+"-"+mes_+"-"+dia_;
    if(validate_fecha(NewFecha_)==true){
        // Si la fecha es correcta, calculamos la edad
        var values=NewFecha_.split("-");
        var dia = values[2];
        var mes = values[1];
        var ano = values[0];
       
        // cogemos los valores actuales
        var fecha_hoy = new Date();
        var ahora_ano = fecha_hoy.getYear();
        var ahora_mes = fecha_hoy.getMonth()+1;
        var ahora_dia = fecha_hoy.getDate();
        // realizamos el calculo
        var edad = (ahora_ano + 1900) - ano;
       
        if ( ahora_mes < mes ){ edad--; }
        if ((mes == ahora_mes) && (ahora_dia < dia)){
            edad--;
        }
        if (edad > 1900){ edad -= 1900; }
        // calculamos los meses
        var meses=0;
        if(ahora_mes>mes)
            meses=ahora_mes-mes;
        if(ahora_mes<mes)
            meses=12-(mes-ahora_mes);
        if(ahora_mes==mes && dia>ahora_dia)
            meses=11;
        // calculamos los dias
        var dias=0;
        if(ahora_dia>dia)
            dias=ahora_dia-dia;
        if(ahora_dia<dia){
            ultimoDiaMes=new Date(ahora_ano, ahora_mes, 0);
            dias=ultimoDiaMes.getDate()-(dia-ahora_dia);
        }
        //document.getElementById("result").innerHTML="Tienes "+edad+" años, "+meses+" meses y "+dias+" días";
          if(edad<18){
              alert("Debe ser mayor de Edad para poder registrarse a la PLataforma.");
          }else{
               $('#FrmSingUp').submit();
          }
    }else{
         alert("La fecha es Incorrecta")
        //document.getElementById("result").innerHTML="La fecha "+fecha+" es incorrecta";
    }
}




