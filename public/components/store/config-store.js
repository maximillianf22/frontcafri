/*
$('.ichack-input input[type="checkbox"].minimal, .ichack-input input[type="radio"].minimal').iCheck({
     checkboxClass: 'icheckbox_minimal-blue',
     radioClass: 'icheckbox_minimal-blue'
});
*/
 

var idAttributeEdit = 0, totAcmProductsSelected_=0;
var action_ = "";
var arrayProductsCar,arrayRecovery, isPass,idTempG_, idTemp_, arrayTempProduc_;
arrayProductsCar = new Array(); arrayRecovery = new Array(), arrayTempProduc_= new Array();
isPass=false;
var dt = new Date();
idTempG_=(dt.getMonth()+1)+""+dt.getHours() + "" + dt.getMinutes() + "" + dt.getSeconds();
idTemp_=0;
Cookies.set('generator',idTempG_,{ expires: 7 });


/*-- Orientacion Datapicker --*/
/*
$('.datepicker').datepicker({
     format: 'mm/dd/yyyy',
     startDate: '-0d', 
     firstDay: 1,
     dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
     dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
     monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
     monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec" ],
     orientation: "bottom",
     onSelect: function(dateText) { 
          $('#datepicker').val(dateText);
        }
 });
 */


idCatalogo_ = Cookies.get('_gidCatalogo');
if(idCatalogo_ === undefined){
     Cookies.set('_gidCatalogo','0',{ expires: 7 });
}else{
}

client_ = Cookies.get('_gid');
if(client_ === undefined){
     Cookies.set('_gid','P',{ expires: 7 });
     // $('#gid_Cliente').modal();
}else{
}
var cupon_ = Cookies.get('_gtokCupon');
if(client_ === undefined){
     Cookies.set('_gtokCup','_i',{ expires: 7 });
     Cookies.set('_gtokCupV','0',{ expires: 7 });
}else{
     Cookies.set('_gtokCup',Cupon_,{ expires: 7 });
     Cookies.set('_gtokCupV','0',{ expires: 7 });
     $("#data-cupon").html(Cupon_);
}


function iLoadPage(){ loadCarBakset();  }

action_ =  Cookies.get('id.catalogo');
if(action_ === undefined){}else{ loadCarBakset(); }

function loadArrayBasket($idAttribute){
     if($idAttribute>=1){
          $idProduct=0;
          var myProductsCar = new Object();
          myProductsCar.idKeyProduct = $idProduct+"-"+$idAttribute;
          myProductsCar.idAttribute = $idAttribute;
          myProductsCar.nameProduct = $("#listProduct_"+$idAttribute).data("nameproduct");
          myProductsCar.idProduct = 0;
          myProductsCar.quantityOrder = $("#input-product-"+$idAttribute).val();
          myProductsCar.priceOrder =$("#listProduct_"+$idAttribute).data("price");
          myProductsCar.totalOrder =parseFloat(($("#input-product-"+$idAttribute).val() * $("#listProduct_"+$idAttribute).data("price")));
         /*-----*/  
         var found_ = 'N';
          if(arrayProductsCar.length===0){
               arrayProductsCar.push(myProductsCar);
          }else{
               for(var i=0; i < arrayProductsCar.length; i++) {
                    $data_ = arrayProductsCar[i]["idKeyProduct"];
                    if($data_ === $idProduct+"-"+$idAttribute){
                         arrayProductsCar[i]["quantityOrder"]=$("#input-product-"+$idAttribute).val();
                         arrayProductsCar[i]["totalOrder"] =parseFloat(($("#input-product-"+$idAttribute).val() * $("#listProduct_"+$idAttribute).data("price")));
                         found_ = 'Y';
                    }
               }
               if(found_ === 'N') {
                    arrayProductsCar.push(myProductsCar);
               }else{}
          }
     }
}

/*---- Para abrir los modal de los productos de la tienda ----*/
function viewProduct($idProduct){
     totAcmProductsSelected_=0;
     $.ajax({
          type:'POST',
          url: UrlHost_+"/store/view-product",
          data:{idProduct_:$idProduct},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               if(arrayProductsCar.length>0){
                    arrayProductsCar.splice(0,arrayProductsCar.length);
               }
               $('#viewProduct').modal();
               $("#info-modal-product").html(data);
          },
          error: function(xhr, type, exception, thrownError) { 
               if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });
}

function addCntCar($idProduct,$idAttribute){
     var AcmCantProd_ =0, totCompra_ = 0, AcmAntTot_ = 0, AcmEdit_ =0;
     AcmAntTot_ = $('#pnl-variations-products-'+$idProduct).data("totcompra");
     AcmEdit_= parseFloat($("#opt-add-car-"+$idAttribute).data("cantedit"));

     if(AcmEdit_>0){
          AcmEdit_=AcmEdit_-parseFloat($("#opt-add-car-"+$idAttribute).data("cntventa"));
     }else{ AcmEdit_=0; }

     $('#opt-add-car-'+$idAttribute).data("cantproducto",
          parseFloat($('#input-product-'+$idAttribute).val()) +
          parseFloat($("#opt-add-car-"+$idAttribute).data("cntventa")) + AcmEdit_
     )
     var priceUnit_ = (
          (parseFloat($("#opt-add-car-"+$idAttribute).data("cntventa"))+AcmEdit_) *
          parseFloat($('#opt-add-car-'+$idAttribute).data("price"))
     );
     $('#opt-add-car-'+$idAttribute).data("cantedit","0")


     var AcmCantProd_ = $('#opt-add-car-'+$idAttribute).data("cantproducto");
     $('#input-product-'+$idAttribute).val(parseFloat(AcmCantProd_));
     totCompra_= (AcmAntTot_ + priceUnit_ );
     $('#pnl-variations-products-'+$idProduct).data("totcompra",(totCompra_));
     $("#addNew_ProductCar").html("Agregar $ "+ (totCompra_).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') +" a la cesta");
     loadArrayBasket($idAttribute);

}

function restCntCar($idProduct,$idAttribute){
     var AcmCantProd_ =0, totCompra_ = 0, AcmAntTot_ = 0;
     AcmAntTot_ = $('#pnl-variations-products-'+$idProduct).data("totcompra");
     var priceUnit_ = (
          parseFloat($("#opt-add-car-"+$idAttribute).data("cntventa")) *
          parseFloat($('#opt-add-car-'+$idAttribute).data("price"))
     );

     if($("#listProduct_"+$idAttribute).is(':checked')) { 
          $('#opt-add-car-'+$idAttribute).data("cantproducto",
               parseFloat($('#input-product-'+$idAttribute).val()) -
               parseFloat($("#opt-add-car-"+$idAttribute).data("cntventa"))
          )
          
          var AcmCantProd_ = $('#opt-add-car-'+$idAttribute).data("cantproducto");
          $('#input-product-'+$idAttribute).val(parseFloat(AcmCantProd_));
          if(AcmCantProd_<=0){
               $('#input-product-'+$idAttribute).val(parseFloat($("#opt-add-car-"+$idAttribute).data("cntventa")));
          }else{
               totCompra_= (AcmAntTot_ - priceUnit_ );
               $('#pnl-variations-products-'+$idProduct).data("totcompra",(totCompra_));
               $("#addNew_ProductCar").html("Agregar $ "+ (totCompra_).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') +" a la cesta");
          }
     }else{
         var cntTotRest_ =  0;
         cntTotRest_= $('#opt-add-car-'+$idAttribute).data("cantproducto");
         var totItemchecked_ = 0;
         totItemchecked_ = (cntTotRest_ * $("#opt-add-car-"+$idAttribute).data("price"))
         $('#input-product-'+$idAttribute).val(parseFloat(0));
         totCompra_= (AcmAntTot_ - totItemchecked_ );
         $('#pnl-variations-products-'+$idProduct).data("totcompra",(totCompra_));
         $("#addNew_ProductCar").html("Agregar $ "+ (totCompra_).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') +" a la cesta");
     }
     loadArrayBasket($idAttribute);
}

function liquidarCompra(){
     var base_  = $("#pnl-products-car").data('base');
     var envio_  = $("#pnl-products-car").data('vrenvio');
     
     var SubtotalCompra_ = $("#subtotal").data("subtotal");
     $("#valor_descuento").data("cupon",Cookies.get('_gtokCupV'));
    
     if(SubtotalCompra_>base_){
          if(base_>0){
               $("#costo-envio").data("envio",0);
               $("#costo-envio").html("$ "+(0).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
          }else{
               /*En el caso de que la base este en cero, coloco fijo el valor del envio */
               $("#costo-envio").data("envio",envio_);
               if(envio_===0){
                    $("#costo-envio").html("$ - ");
               }else{
                    $("#costo-envio").html("$ "+(envio_).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
               }
               
          }
     }else{ $("#costo-envio").data("envio",envio_);
     $("#costo-envio").html("$ "+(envio_).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')); }
    
     var CostoEnvio_ = $("#costo-envio").data("envio");
     var Descuento_ = $("#valor_descuento").data("cupon");
     
     $("#valor_descuento").html("$ " + (Descuento_).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'))
     $("#total-compra").data("total",((SubtotalCompra_+CostoEnvio_)-Descuento_));
     $("#total-compra").html("$ "+((SubtotalCompra_+CostoEnvio_)-Descuento_).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
     //alert(CostoEnvio_);
}

function addCarShoping($idAttribute){
     var jSonData_ = JSON.stringify(arrayProductsCar);
     action_ =  Cookies.get('id.catalogo'); 
     if(action_ === undefined){  
          Cookies.set('id.catalogo',idTempG_,{ expires: 7 }); 
          Cookies.set('_gidCatalogo',idTempG_,{ expires: 7 }); 
     } 
     var idJson_ = Cookies.get('id.catalogo');
     $.ajax({
          type:'POST',
          url: UrlHost_+"/store/addProductsInfoTemp",
          data:{dataJson : jSonData_,idJson:idJson_, action:"A"},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               loadCarBakset();
               $("#listcar-content-products").html(data);
               $('#viewProduct').modal( 'hide' );
               var tot_products_car =  $("#pnl-products-car").data("cantidad");
               $("#cnt-add-products").html(tot_products_car);
               $(".store-item-car-products").removeClass("hide_item");
               $(".store-item-car-products").addClass("show_item");
          },
          error: function(xhr, type, exception, thrownError){
               if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });
}
/*------*/
function clearbasket(){
     var idJson_ = Cookies.get('id.catalogo');
     $.ajax({
          type:'POST',
          url: UrlHost_+"/store/delProductcar",
          data:{idJson: idJson_},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               Cookies.remove('id.catalogo');
               Cookies.remove('_gidCatalogo');
               
               location.reload(true);
               Cookies.set('id.catalogo',idTempG_,{ expires: 7 });
               Cookies.set('_gidCatalogo',idTempG_,{ expires: 7 });
               
               $(".store-item-car-products").removeClass("show_item");
               $(".store-item-car-products").addClass("hide_item");
               Cookies.set('_gtokCup','_i',{ expires: 7 });
               Cookies.set('_gtokCupV','0',{ expires: 7 });
          },
          error: function(xhr, type, exception, thrownError){
               if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });
}

/*------*/
function loadCarBakset(){
     
     var idJson_ = Cookies.get('id.catalogo');
     $.ajax({
          type:'POST',
          url: UrlHost_+"/store/reloadCar",
          data:{idJson: idJson_},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               $("#listcar-content-products").html(data);
               var tot_products_car =  $("#pnl-products-car").data("cantidad");
               $("#cnt-add-products").html(tot_products_car);
               $('#valor_descuento').data("cupon", )
               if(tot_products_car>=1){
                    $(".store-item-car-products").removeClass("hide_item");
                    $(".store-item-car-products").addClass("show_item");
                    liquidarCompra();
                    var valorCupon_ =  Cookies.get('_gtokCupV');
                    if(parseFloat(valorCupon_)>=1){
                         $("#cupon_store_x3").val(Cookies.get('_gtokCup'));
                         $("#cupon_store_x3").prop('disabled',true);

                         $(".btn-cupon-del").removeClass("hide_item");
                         $(".btn-cupon").removeClass("show_item");
                         $(".btn-cupon").addClass("hide_item");

                    }else{
                         $(".btn-cupon-del").removeClass("show_item");
                         $(".btn-cupon-del").addClass("hide_item");
                         $(".btn-cupon").addClass("hide_item");
                         $("#cupon_store_x3").prop('disabled',false);
                    }
               }else{
                    $(".store-item-car-products").removeClass("show_item");
                    $(".store-item-car-products").addClass("hide_item");
               }
          },
          error: function(xhr, type, exception, thrownError){
               
               if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
               
          }
     });
}
/*------*/
function finishbasket(){
     var idJson_ = Cookies.get('id.catalogo');
      $.ajax({
          type:'POST',
          url: UrlHost_+"/store/mycart/checkout",
          data:{idJson:idJson_},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               window.location.href = '/store/mycart/checkout';
          },
          error: function(xhr, type, exception, thrownError) { 
               if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });
}
function loadCupon(){
     var Cupon_ = $("#cupon_store_x3").val();
     if(Cupon_===""){
          alert("Debe Especificar un código de cúpon")
     }else{
          Cookies.set('_gtokCup',Cupon_,{ expires: 7 });
          $.ajax({
               type:'POST',
               url: UrlHost_+"/store/mycart/checkCupon",
               data:{codigoCupon:Cupon_},
               headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
               success: function(data){
                    var data_cupon= new Array();
                    data_cupon = data;
                    
                    if(data.cupon_value>=1){
                         var CmpSubtotalCompra_ = $("#subtotal").data("subtotal");
                         //alert(CmpSubtotalCompra_+"<"+data.minimo_compra);

                         if(parseFloat(CmpSubtotalCompra_) < parseFloat(data.minimo_compra)){
                              alert("Para redimir este cupon su compra debe ser mayor o igual a "+data.minimo_compra);
                         }else{
                              var data_value= data.cupon_value;
                              $("#modal-right").modal('hide'); 
                              $('#gid_Cupon').modal();
                              Cookies.set('_gtokCupV',data_value,{ expires: 7 });
                              var valorCupon_ =  Cookies.get('_gtokCupV');
     
                              $("#valor_cupon").html("$ "+valorCupon_)
                              $("#data-cupon").html(Cupon_);
                         }
                         
                    }else{
                         $("#cupon_store_x3").val("");
                         Cookies.set('_gtokCupV',0,{ expires: 7 });
                         Cookies.set('_gtokCup',"",{ expires: 7 });
                         alert("Código Ingresado no es valido");
                    }
               },
               error: function(xhr, type, exception, thrownError) { 
                    if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
               }
          });
     }
}
function delCupon(){
     $("#cupon_store_x3").val("");
     Cookies.set('_gtokCupV',0,{ expires: 7 });
     Cookies.set('_gtokCup',"",{ expires: 7 });
     $(".btn-cupon-del").removeClass("show_item");
     $(".btn-cupon-del").addClass("hide_item");
     $(".btn-cupon").addClass("hide_item");
     $("#cupon_store_x3").prop('disabled',false);
     loadCarBakset();
}

function saveOrder(){
     var idJson_ = Cookies.get('id.catalogo');
     var Data_address_ = $("#address_order").val();
     if(Data_address_ != null){
          var Data_date_ = $("#datepicker").val();
          var Data_time_ = $("#time_order").val();
          var Data_comments_ = $("#obs_order").val();
          if(Data_address_!=""){
               $.ajax({
                    type:'POST',
                    url: UrlHost_+"/store/mycart/checkout",
                    data:{Data_address:Data_address_,Data_date:Data_date_,Data_time:Data_time_,Data_comments:Data_comments_,Token:idJson_},
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(data){
                         if(data==="Y"){
                              Cookies.remove('id.catalogo');
                              Cookies.set('id.catalogo',idTempG_,{ expires: 7 });
                              Cookies.set('_gtokCup','_i',{ expires: 7 });
                              Cookies.set('_gtokCupV','0',{ expires: 7 });
                              $(".store-item-car-products").removeClass("show_item");
                              $(".store-item-car-products").addClass("hide_item");
                              window.location.href = '/store/orders';
                         }else{ alert("Error, no se pudo guardar el pedido"); }
                    },
                    error: function(xhr, type, exception, thrownError) { 
                         if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
                    }
               });
          }else{
               alert("Datos no pueden estar vacios");
          }
     }else{
          alert("Debe Especificar una direccion de entrega");
     }
     
}

function selectProductCheck ($idProduct,$idAttribute){
     if($("#listProduct_"+$idAttribute).is(':checked')) { 
          $("#opt-add-car-"+$idAttribute).removeClass("hide_item");
          $("#opt-add-car-"+$idAttribute).addClass("show_item");
          // $('#input-product-'+$idAttribute).val(parseInt($("#opt-add-car-"+$idAttribute).data("cntventa")))
          addCntCar($idProduct,$idAttribute);
          $('#addNew_ProductCar').removeClass('disabled');

     } else {
          $("#opt-add-car-"+$idAttribute).removeClass("show_item");
          $("#opt-add-car-"+$idAttribute).addClass("hide_item");
          $('#input-product-'+$idAttribute).val("0");
          restCntCar($idProduct,$idAttribute);
          if($('#pnl-variations-products-'+$idProduct).data("totcompra")==0){
               $('#addNew_ProductCar').addClass('disabled');
          }
     }
}

function reloadPage ($a){
     $tipo_cliente_ = $a;
     $.ajax({
          type:'POST',
          url: UrlHost_+"/123",
          data:{tipo_cliente:tipo_cliente_},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
              alert("entre");
          },
          error: function(xhr, type, exception, thrownError) { 
              if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });
}

function gidCliente ($tipoid){
     Cookies.set('_gid',$tipoid,{ expires: 7 });
     $('#gid_Cliente').modal( 'hide' );
     var tipo_cliente = Cookies.get('_gid');
     location.reload(true);
}
function showgidCliente ($tipoid){ $('#gid_Cliente').modal(); }
function hideCupon ($tipoid){ 
     Cookies.set('_gtokCupV',0,{ expires: 7 });
     Cookies.set('_gtokCup',"",{ expires: 7 });
     $('#gid_Cupon').modal('hide'); }

function applyCupon (){
     loadCarBakset();
     var ValueCupon_ =  Cookies.set('_gtokCupV');
     $("#valor_descuento").data("cupon",ValueCupon_);
     $('#gid_Cupon').modal('hide'); 
     $('#valor_descuento').html("$ "+ValueCupon_);
     $("#modal-right").modal();
     $("#cupon_store_x3").prop('disabled', true);
}
function checkSessionClient(){
     var tipo_cliente = Cookies.get('_gid');
     $.ajax({
          type:'POST',
          url: UrlHost_+"/checkClientgid",
          data:{tipo_cliente:tipo_cliente_},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
              alert("entre");
          },
          error: function(xhr, type, exception, thrownError) { 
               if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });
}

function showTypeofUser(){
     $('#typeOfUser').change(function(){
           var data_ = this.value;
           if(data_==="people"){
                $("#namebusiness").addClass("hideItem");
                $("#namebusiness").removeClass("showItem");
           }else{
                $("#namebusiness").removeClass("hideItem");
                $("#namebusiness").addClass("showItem");
           }
      });
}

function openDetailOrder($idOrder){
     $.ajax({
          type:'POST',
          url: UrlHost_+"/store/mycart/detailOrder/"+$idOrder,
          data:{idOrder:$idOrder},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               
               $("#listcar-detail-products").html(data);
               $("#modal-detail-product").modal();
          },
          error: function(xhr, type, exception, thrownError) { 
               if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });
}
function openDetailOrderCopy($idOrder){

     
     $.ajax({
          type:'POST',
          url: UrlHost_+"/store/mycart/detailOrderCopy/"+$idOrder,
          data:{idOrder:$idOrder},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               
               $("#listcar-detail-products").html(data);
               $("#modal-detail-product").modal();
          },
          error: function(xhr, type, exception, thrownError) { 
               if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });
}

/*--- Para cancelar mis Ordenes realizadas --*/
function orderCancel($idOrder){
     $.ajax({
          type:'POST',
          url: UrlHost_+"/store/mycart/ordercancel/"+$idOrder,
          data:{idOrder:$idOrder},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               if(data=="Y"){
                   alert("Orden/Pedido ha sido cancelado");
                   location.reload(true);
               }else{
                    alert("Error, Al intentar Cancelar la Orden");
               }
               // window.location.href = '/store/mycart/checkout';
          },
          error: function(xhr, type, exception, thrownError) { 
              if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });
}


function newProduct(){
     
     var cProduct = $('#cProduct').val();
     var nCategory =$('select[name=Category_Product]').val();
     var nState =$('select[name=stateProduct]').val();
     var cDescripcion = $('#cDescription').val();
     var nAmount_per_sale = $("#nAmount_per_sale").val();
     var nidSales_unit = $('select[name=Sales_unit]').val();
     var cCntbyunit =  $('#cCntbyunit').val();
     var onlyPublic = 0; var onlyComerce =0;
     if($("#onlyPublic").hasClass("active")==true){ onlyPublic = 1; }
     if($("#onlyComerce").hasClass("active")==true){ onlyComerce = 1; }
     var nPriceProduct =  $('#nPriceProduct').val();
     var nPriceProductPrevious =  $('#nPriceProductPrevious').val();
     var nPriceComerce =  $('#nPriceComerce').val();
     var nPriceComercePrevious =  $('#nPriceComercePrevious').val();

     $.ajax({
          type:'POST',
          url: UrlHost_+"/administrator/store/product/new",
          data:{
               cProduct_:cProduct,
               nCategory_:nCategory,
               nState_:nState,
               cDescripcion_:cDescripcion,
               nAmount_per_sale_:nAmount_per_sale,
               nidSales_unit_ :nidSales_unit,
               cCntbyunit_:cCntbyunit,
               onlyPublic_:onlyPublic,
               onlyComerce_:onlyComerce,
               nPriceProduct_:nPriceProduct,
               nPriceProductPrevious_:nPriceProductPrevious,
               nPriceComerce_:nPriceComerce,
               nPriceComercePrevious_:nPriceComercePrevious,
          },
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
              alert(data);
              window.location.href = '/administrator/store';
          },
          error: function(xhr, type, exception, thrownError) { 
             if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });
}



function updProduct($a){
     var nCategory =$('select[name=Category_Product]').val();
     if(nCategory==""){
          alert("debe especificar la categoria del producto");
     }else{

          var cProduct = $('#cProduct').val();
          var nState = $('select[name=stateProduct]').val();
          var ninOffert = $('select[name=inOffert]').val();
          var ctitleVariation = $('#titleVariation').val();
           
          var cDescripcion = $('#cDescription').val();
          var nAmount_per_sale = $("#nAmount_per_sale").val();
          var nidSales_unit = $('select[name=Sales_unit]').val();
          var cCntbyunit =  $('#cCntbyunit').val();
          var onlyPublic = 0; var onlyComerce =0;
          if($("#onlyPublic").hasClass("active")==true){ onlyPublic = 1; }
          if($("#onlyComerce").hasClass("active")==true){ onlyComerce = 1; }
          var nPriceProduct =  $('#nPriceProduct').val();
          var nPriceProductPrevious =  $('#nPriceProductPrevious').val();
          var nPriceComerce =  $('#nPriceComerce').val();
          var nPriceComercePrevious =  $('#nPriceComercePrevious').val();

          var nPriceList3 =  $('#nPricelist3').val();
          var nPriceList4 =  $('#nPricelist4').val();
          var nPriceList5 =  $('#nPricelist5').val();

          if(nPriceProduct=="" || nPriceProduct==0){
               alert("debe especificar el precio del producto");
          }else{
               $.ajax({
                    type:'POST',
                    url: UrlHost_+"/administrator/store/product/update/"+$a,
                    data:{
                         id:$a,
                         cProduct_:cProduct,
                         nCategory_:nCategory,
                         nState_:nState,
                         cDescripcion_:cDescripcion,
                         nAmount_per_sale_:nAmount_per_sale,
                         nidSales_unit_ :nidSales_unit,
                         cCntbyunit_:cCntbyunit,
                         onlyPublic_:onlyPublic,
                         onlyComerce_:onlyComerce,
                         nPriceProduct_:nPriceProduct,
                         nPriceProductPrevious_:nPriceProductPrevious,
                         nPriceComerce_:nPriceComerce,
                         nPriceComercePrevious_:nPriceComercePrevious,
                         ninOffert_:ninOffert,
                         ctitleVariation_:ctitleVariation,
                         nPricelist3_:nPriceList3,
                         nPricelist4_:nPriceList4,
                         nPricelist5_:nPriceList5
                    },
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(data){
                        alert(data);
                        location.reload(true);
                    },
                    error: function(xhr, type, exception, thrownError) { 
                        if(xhr.status===419){
                              location.reload(true);
                         }else{
                              alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
                         }
                    }
               });

          } 
     } 
}

function closeModalAttribute(){ $('#gid_attr').modal("hide"); location.reload(true); }

function openNewAttrModal($a){
     $.ajax({
          type:'POST',
          url: UrlHost_+"/administrator/store/product/addAttribute/"+$a,
          data:{idAttr:$a},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               $("#attrProduct_").html(data);
               $('#gid_attr').modal(); 
          },
          error: function(xhr, type, exception, thrownError) { 
               if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });
}

/*---Actualiza Producto desde el Manage Product ---*/
function viewProductEdit(a){
     $.ajax({
          type:'GET',
          url: UrlHost_+"/administrator/manage-products/viewItemProduct",
          data:{idProduct:a},
          success: function(data){
               $("#attrProduct_").html(data);
               $('#view_Product_manage').modal(); 
          },
          error: function(xhr, type, exception, thrownError) { 
              if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });
}
/*-------------------------------------------------*/



function saveNewAttrModal($a){

     var cstateProduct = $('select[name=stateProductVar]').val();
     var cProductVar = $('#cProductVar').val();
     var nAmount_per_saleVar = $("#nAmount_per_sale_var").val();
     var nidSales_unitVar = $('select[name=Sales_unit_var]').val();
     var cCntbyunitVar =  $('#cCntbyunitVar').val();

     var onlyPublicVar = 0; var onlyComerceVar =0;
     if($("#onlyPublicVar").hasClass("active")==true){ onlyPublicVar = 1; }
     if($("#onlyComerceVar").hasClass("active")==true){ onlyComerceVar = 1; }
     
     var nPriceProductVar =  $('#nPriceProductVar').val();
     var nPriceProductPreviousVar =  $('#nPriceProductPreviousVar').val();

     var nPriceComerceVar =  $('#nPriceComerceVar').val();
     var nPriceComercePreviousVar =  $('#nPriceComercePreviousVar').val();

     var nPricelist3Var =  $('#nPricelistVar3').val();
     var nPricelist4Var =  $('#nPricelistVar4').val();
     var nPricelist5Var =  $('#nPricelistVar5').val();

     $.ajax({
          type:'POST',
          url: UrlHost_+"/administrator/store/product/saveNewAttribute/"+$a,
          data:{
               id_:$a,
               cstateProduct_:cstateProduct,
               cProductVar_:cProductVar,
               nAmount_per_saleVar_:nAmount_per_saleVar,
               nidSales_unitVar_:nidSales_unitVar,
               cCntbyunitVar_:cCntbyunitVar,
               onlyPublicVar_:onlyPublicVar,
               onlyComerceVar_:onlyComerceVar,
               nPriceProductVar_:nPriceProductVar,
               nPriceProductPreviousVar_:nPriceProductPreviousVar,
               nPriceComerceVar_:nPriceComerceVar,
               nPriceComercePreviousVar_:nPriceComercePreviousVar,
               nPricelist3Var_:nPricelist3Var,
               nPricelist4Var_:nPricelist4Var,
               nPricelist5Var_:nPricelist5Var
          },
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
              alert(data);
              $('#gid_attr').modal("hide");
              location.reload(true);
          },
          error: function(xhr, type, exception, thrownError) { 
              if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });
}

function addNewAttrModal(){
     var cstateProduct = $('select[name=stateProductVar]').val();
    
     var cProductVar = $('#cProductVar').val();
     var nAmount_per_saleVar = $("#nAmount_per_sale_var").val();
     var nidSales_unitVar = $('select[name=Sales_unit_var]').val();
     var cCntbyunitVar =  $('#cCntbyunitVar').val();

     var onlyPublicVar = 0; var onlyComerceVar =0;
     if($("#onlyPublicVar").hasClass("active")==true){ onlyPublicVar = 1; }
     if($("#onlyComerceVar").hasClass("active")==true){ onlyComerceVar = 1; }
     
     var nPriceProductVar =  $('#nPriceProductVar').val();
     var nPriceProductPreviousVar =  $('#nPriceProductPreviousVar').val();

     var nPriceComerceVar =  $('#nPriceComerceVar').val();
     var nPriceComercePreviousVar =  $('#nPriceComercePreviousVar').val();

     $.ajax({
          type:'POST',
          url: UrlHost_+"/administrator/store/product/updateAttribute/"+$a,
          data:{
               id:$a,
               cProductVar_:cProductVar,
               cstateProduct_:cstateProduct,
               nAmount_per_saleVar_:nAmount_per_saleVar,
               nidSales_unitVar_:nidSales_unitVar,
               cCntbyunitVar_:cCntbyunitVar,
               onlyPublicVar_:onlyPublicVar,
               onlyComerceVar_:onlyComerceVar,
               nPriceProductVar_:nPriceProductVar,
               nPriceProductPreviousVar_:nPriceProductPreviousVar,
               nPriceComerceVar_:nPriceComerceVar,
               nPriceComercePreviousVar_:nPriceComercePreviousVar
          },
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
              alert(data);
              $('#gid_attr').modal("hide");
              location.reload(true);
          },
          error: function(xhr, type, exception, thrownError) { 
              if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });
}

function openAttrModal($a){ 
     $.ajax({
          type:'POST',
          url: UrlHost_+"/administrator/store/product/attribute/"+$a,
          data:{idAttr:$a},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){

               $("#attrProduct_").html(data);
               $('#gid_attr').modal(); 
          },
          error: function(xhr, type, exception, thrownError) { 
             if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });
}

function updAttrModal($a){

     var cProductVar = $('#cProductVar').val();
     var cstateProduct = $('select[name=stateProductVar]').val();

     var nAmount_per_saleVar = $("#nAmount_per_sale_var").val();
     var nidSales_unitVar = $('select[name=Sales_unit_var]').val();
     var cCntbyunitVar =  $('#cCntbyunitVar').val();

     var onlyPublicVar = 0; var onlyComerceVar =0;
     if($("#onlyPublicVar").hasClass("active")==true){ onlyPublicVar = 1; }
     if($("#onlyComerceVar").hasClass("active")==true){ onlyComerceVar = 1; }
     
     var nPriceProductVar =  $('#nPriceProductVar').val();
     var nPriceProductPreviousVar =  $('#nPriceProductPreviousVar').val();

     var nPriceComerceVar =  $('#nPriceComerceVar').val();
     var nPriceComercePreviousVar =  $('#nPriceComercePreviousVar').val();

     var nPricelist3Var =  $('#nPricelistVar3').val();
     var nPricelist4Var =  $('#nPricelistVar4').val();
     var nPricelist5Var =  $('#nPricelistVar5').val();

     $.ajax({
          type:'POST',
          url: UrlHost_+"/administrator/store/product/updateAttribute/"+$a,
          data:{
               id:$a,
               cProductVar_:cProductVar,
               cstateProduct_:cstateProduct,
               nAmount_per_saleVar_:nAmount_per_saleVar,
               nidSales_unitVar_:nidSales_unitVar,
               cCntbyunitVar_:cCntbyunitVar,
               onlyPublicVar_:onlyPublicVar,
               onlyComerceVar_:onlyComerceVar,
               nPriceProductVar_:nPriceProductVar,
               nPriceProductPreviousVar_:nPriceProductPreviousVar,
               nPriceComerceVar_:nPriceComerceVar,
               nPriceComercePreviousVar_:nPriceComercePreviousVar,
               nPricelist3Var_:nPricelist3Var,
               nPricelist4Var_:nPricelist4Var,
               nPricelist5Var_:nPricelist5Var,
          },
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
              alert(data);
              $('#gid_attr').modal("hide");
              location.reload(true);
          },
          error: function(xhr, type, exception, thrownError) { 
              if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });
}

function filtrarClientes_(){

     var DataSearch = document.getElementById("filterClientetAll").value;
     var dataType=$('select[name=dType]').val(); 
     var dataState=$('select[name=dState]').val();
     
     $.ajax({
          type:'POST',
          url: UrlHost_+"/administrator/customers/searchfilterAll",
          data:{dataType_ :dataType, dataState_ :dataState,DataSearch : DataSearch },
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               $("#result").css("display", "none");
               $("#filterListClient").html(data);
          },
          error: function(xhr, type, exception, thrownError){
              if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });   
}

function filtrarProductos_(){
     var dataCategory=$('select[name=dCategory]').val(); 
     var dataState=$('select[name=dState]').val();
     $.ajax({
          type:'POST',
          url: UrlHost_+"/store/product/filtersearch",
          data:{dataCategory_ :dataCategory, dataState_ :dataState },
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
              
               $("#filterListProduc").html(data);
          },
          error: function(xhr, type, exception, thrownError){
              if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });   
}

/*--- Realizar Busqueda  ---*/
function searchProduct($a){
     var DataSearch = document.getElementById("searchProduct").value;
     var slug_main = $("#searchProduct").data("slugmain");
     var slug = $("#searchProduct").data("slug");
     var id = $("#searchProduct").data("id");
     $.ajax({
          type:'POST',
          url: UrlHost_+"/store/product/search",
          data:{DataSearch : DataSearch,slug:slug,id:id,slug_main:slug_main},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               $("#resultFindRow").removeClass("show_item");
               $("#resultFindRow").addClass("hide_item");
               $("#filterProducts").html(data);
          },
          error: function(xhr, type, exception, thrownError){
             if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });   
}

/*--- 
     Update : Feb 28 2020 - 8:39
---*/
function filterProduct($a){  
     var DataSearch = document.getElementById("searchData").value;
     let categoria =  $("#categorie_name").data("id");
     if(categoria===""){ categoria=0;}  
    $.ajax({
          type:'GET',
          url: UrlHost_+"/administrator/manage-products/filter",
          data:{DataSearch : DataSearch,Datacategoria : categoria },
          success: function(data){  $("#manageProducts_").html(data); },
          error: function(xhr, type, exception, thrownError){
              if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });    
}

function filterCategorie(a){ 
     let nameCate_ = $("#categorie_"+a).data("name");
     $("#itemFilter_").removeClass("hidden_");
     $("#itemFilter_").addClass("show_");
     $("#categorie_name").html(nameCate_);
     $("#categorie_name").data("name",nameCate_);
     $("#categorie_name").data("id",a);
     
     /*---------------------------------------------*/
     let DataSearch = document.getElementById("searchData").value;
     filterProduct(DataSearch);
}

function closefilter(){
     let idCat_ = $("#categorie_name").data("id");
     $("#itemFilter_").removeClass("show_");
     $("#itemFilter_").addClass("hidden_");
     $("#categorie_name").data("name",nameCate_);
     $("#categorie_name").data("id","");
     let DataSearch = document.getElementById("searchData").value;
     filterProduct(DataSearch); 
}

/*----Feb 17 2020 ----*/
function addCommas(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}


function editProductPage(p,a){
     if(a=="P"){
          $("#editP_readonly_"+p).css('display','none');
          $("#editP_enabled_"+p).css('display','block'); 
          $("#dataPModify_"+p).addClass('hide'); 
     }else{
          $("#editC_readonly_"+p).css('display','none');
          $("#editC_enabled_"+p).css('display','block'); 
          $("#dataCModify_"+p).addClass('hide'); 
     } 
}
function closeProductPage(p,a){
     if(a=="P"){
          $("#editP_readonly_"+p).css('display','block');
          $("#editP_enabled_"+p).css('display','none');
          $("#dataPModify_"+p).removeClass('hide'); 
     }else{
          $("#editC_readonly_"+p).css('display','block');
          $("#editC_enabled_"+p).css('display','none');
          $("#dataCModify_"+p).removeClass('hide'); 
     } 
}

function updProductSelect(p,a){ 
     if(a==="P"){
          var newPrice_ = $("#updP_price_"+p).val();
     }else{
          var newPrice_ = $("#updC_price_"+p).val();
     }
     if(newPrice_>=1){
          $.ajax({
               type:'POST',
               url: UrlHost_+"/administrator/manage-products/upd-price-product",
               data:{product : p ,action : a, price :newPrice_ },
               headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
               success: function(data){
                    if(data==="Y"){
                         alert("Precio del Producto ha sido Actualizado"); 
                    }else{
                         alert("Producto no pudo ser actualizado, intentelo mas tarde");
                    }
                    if(a==="P"){
                         $("#editP_readonly_"+p).css('display','block');
                         $("#editP_enabled_"+p).css('display','none');
                         $("#dataPModify_"+p).removeClass('hide');
                         $("#priceP_actual_"+p).html("$ "+addCommas(newPrice_)); 
                    }else{
                         $("#editC_readonly_"+p).css('display','block');
                         $("#editC_enabled_"+p).css('display','none');
                         $("#dataCModify_"+p).removeClass('hide'); 
                         $("#priceC_actual_"+p).html("$ "+addCommas(newPrice_)); 
                    } 

               },
               error: function(xhr, type, exception, thrownError){
                   if(xhr.status===419){
                         location.reload(true);
                    }else{
                         alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
                    }
               }
          });
     }else{
          alert("Debe establecer un precio para poder actualizar");
     }
     
}

function showProductPage(p,d,a){
     var action  = a; 
     $.ajax({
          type:'GET',
          url: UrlHost_+"/administrator/manage-products/show-hide-product",
          data:{product : p ,destino: d, action : a},
          success: function(data){
               if(data==="Update"){
                    alert("Producto Actualizado"); 
               }else{
                    alert("Producto no pudo ser actualizado, intentelo mas tarde");
               }
          },
          error: function(xhr, type, exception, thrownError){
             if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });
     
}

function addFavorite(p,a){ 
     var action  = a; 
     $.ajax({
          type:'GET',
          url: UrlHost_+"/administrator/manage-products/addfavoriteproduct",
          data:{product : p ,action : a},
          success: function(data){
               if(data==="Y"){
                    if(a==1){
                         alert("Producto agregado a Ofertas, correctamente");
                    }else{
                         alert("Producto Quitado de las Ofertas, correctamente");
                    }
                    location.reload(true);
               }else{
                    alert("Error, al intentar agregar el producto a Ofertas");
               }
          },
          error: function(xhr, type, exception, thrownError){
              if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });

}



/*-----------------------------------------------------*/
function removeProduct($idProduct,$idAttribute){
     var idCat_ =  Cookies.get('_gidCatalogo');
     $.ajax({
          type:'POST',
          url: UrlHost_+"/store/mycart/delOrderProduct/"+$idAttribute,
          data:{idTem_ :idCat_, idProduct_ : $idProduct, idAttribute_ : $idAttribute  },
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               loadCarBakset();
               // location.reload(true);
               var ValueCupon_ =  Cookies.set('_gtokCupV');
               $("#valor_descuento").data("cupon",ValueCupon_);
               $('#gid_Cupon').modal('hide'); 
               $('#valor_descuento').html("$ "+ValueCupon_);
               $("#modal-right").modal();
               $("#cupon_store_x3").prop('disabled', true);      
          },
          error: function(xhr, type, exception, thrownError){
              if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });    
}


function openProduct($idProduct,$idAttribute){
    
     $('#modal-right').modal( 'hide' );
     idAttributeEdit = $idAttribute;
     totAcmProductsSelected_=0;
     var idCat_ =  Cookies.get('_gidCatalogo');

     $.ajax({
          type:'POST',
          url: UrlHost_+"/store/view-product-edit",
          data:{idProduct_:$idProduct,idAttributeEdit_:idAttributeEdit,tokem_:idCat_},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               if(arrayProductsCar.length>0){
                    arrayProductsCar.splice(0,arrayProductsCar.length);
               }
               $('#viewProduct').modal();
               $("#info-modal-product").html(data);
          },
          error: function(xhr, type, exception, thrownError) { 
             if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });

}



function topCategory($a){
     $.ajax({
          type:'POST',
          url: UrlHost_+"/administrator/categories/reorder/"+$a,
          data:{idActual_:$a,tipo:"T"},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               location.reload(true);
          },
          error: function(xhr, type, exception, thrownError) { 
             if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });
}

function downCategory($a){
     $.ajax({
          type:'POST',
          url: UrlHost_+"/administrator/categories/reorder/"+$a,
          data:{idActual_:$a,tipo:"D"},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               location.reload(true);
          },
          error: function(xhr, type, exception, thrownError) { 
            if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });
}


function filterPedidoAll(){
     oStateOrder();
}

function oStateOrder(){
     var cSearch =$('#filterPedidoAll').val(); 
     var iOrder =$('select[name=orderState]').val(); ; 
     var tOrder = $('select[name=tOrder]').val(); 
    
     $.ajax({
          type:'POST',
          url: UrlHost_+"/administrator/orders/detailfilter",
          data:{iOrder_:iOrder,tOrder_:tOrder,DataSearch:cSearch},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               $("#filterListOrders").html(data);
          },
          error: function(xhr, type, exception, thrownError) { 
             if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });

}

function cancelRepeat(){ $("#modal-detail-product").modal( 'hide' );}
function aceptOrderRepeat($idcarAnt){
     // clearbasket();
     idCatalogo_ = Cookies.get('id.catalogo');
     if(idCatalogo_ === undefined){
          Cookies.set('id.catalogo',idTempG_,{ expires: 7 });
          Cookies.set('_gidCatalogo',idTempG_,{ expires: 7 });
          idCatalogo_ = Cookies.get('id.catalogo');
     }else{}
     
     $.ajax({
          type:'POST',
          url: UrlHost_+"/store/repeatProducts",
          data:{idToken_:idCatalogo_,idCar_:$idcarAnt},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               location.reload(true);
          },
          error: function(xhr, type, exception, thrownError) { 
            if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });
  
}

function editarAddresses(a){
     var id =  a;
     
     $.ajax({
          type:'POST',
          url: UrlHost_+"/account/account-addresses/edit",
          data:{id_:id},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               alert(data);
               $('#idAddresses').modal();
               $("#editAddresses").html(data);
          },
          error: function(xhr, type, exception, thrownError) { 
            if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });

     /*
     var dataType=$('select[name=tipo_calle]').val(); 
     var dir_1 = $("#idadd-1").val();
     var dir_2 = $("#idadd-2").val();
     var dir_3 = $("#idadd-3").val();
   
     if(dir_1 != ""  || dir_2 != ""){
           */
         
          
          /*
     }else{
          alert("no puede dejar datos en blanco");
     }
     */

}


/*---- Version 2 new changes Options ----*/

function format(input)
{
var num = input.value.replace(/\./g,'');
if(!isNaN(num)){
num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
num = num.split('').reverse().join('').replace(/^[\.]/,'');
input.value = num;
}
  
else{ alert('Solo se permiten numeros');
input.value = input.value.replace(/[^\d\.]*/g,'');
}
}

/*--- Muestra el detall del producto que se desea modificar ---*/
function closeWProduct(){
     //$("#wProducts").animate({width:"10px"},2000);
     $("#wProducts").css('display','none');
}
function updP(p){
     $.ajax({
          type:'GET',
          url: UrlHost_+"/administrator/manage-products/detail-product",
          data:{product : p},
          success: function(data){
               $("#wProducts").css("display","block");
               $("#wInfoProduct").html(data);
          },
          error: function(xhr, type, exception, thrownError){
             if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });
}


function editprice(p,o){
     if(o==='P'){
          let iprice_ = $("#iprice_"+p).data('price');
          $("#sprice_"+p).css('display','none');
          $("#nprice_"+p).removeClass(' hidden_ ');
          $("#nprice_"+p).addClass(' show_ '); 
     }else{

          let iprice_ = $("#ipricec_"+p).data('price');
          $("#spricec_"+p).css('display','none');
          $("#npricec_"+p).removeClass(' hidden_ ');
          $("#npricec_"+p).addClass(' show_ '); 
     } 
}
/*----- Save Price Products, event Enter -------*/
function saveprice(p,o){
      
     if(o==='P'){
          var nprice_ = $("#nprice_"+p).val();
          var nformat_ ="";
          var producto = $("#iprice_"+p).data('producto');
          var origen = $("#iprice_"+p).data('origen');
     }else{
          var nprice_ = $("#npricec_"+p).val();
          var nformat_ ="";
          var producto = $("#ipricec_"+p).data('producto');
          var origen = $("#ipricec_"+p).data('origen');  
     }
     //alert(nprice_);
     var keycode = event.keyCode || event.which; 
     if(keycode == '13'){
          $.ajax({
               type:'POST',
               url: UrlHost_+"/administrator/manage-products/upd-price-product",
               data:{product : producto ,action : origen, price :nprice_ },
               headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
               success: function(data){
                    if(data==="Y"){
                         if(o==='P'){
                              nformat_ = nprice_.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
                              nformat_ = nformat_.split('').reverse().join('').replace(/^[\.]/,'');
                              $("#sprice_"+p).text("$ "+nformat_);
                              $("#sprice_"+p).css('display','block');
                              $("#nprice_"+p).removeClass(' show_ ');
                              $("#nprice_"+p).addClass(' hidden_ '); 
                         }else{
                              nformat_ = nprice_.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
                              nformat_ = nformat_.split('').reverse().join('').replace(/^[\.]/,'');
                              $("#spricec_"+p).text("$ "+nformat_);
                              $("#spricec_"+p).css('display','block');
                              $("#npricec_"+p).removeClass(' show_ ');
                              $("#npricec_"+p).addClass(' hidden_ '); 
                         } 
                         WjAlert("Precio del Producto actualizado correctamente",'s');
                    }else{
                         WjAlert("El precio del producto no pudo ser actaulizado en estos momentos intente mas luego",'e');
                    } 
               },
               error: function(xhr, type, exception, thrownError){
                  if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
               }
          });
     }else{
     }
}

function actProduct_(p){
     let producto  =  p;
     let state = $("#state_"+p).data('state');
     let state_act =  $("#state_"+p).data('state');
     $.ajax({
          type:'POST',
          url: UrlHost_+"/administrator/manage-products/upd-state-product",
          data:{product : producto, state : state },
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               if(data==="Y"){ 
                    if(state_act===1){ $("#state_"+p).data('state',2); }else{$("#state_"+p).data('state',1);}
                    WjAlert("Estado del producto ha sido cambiado correctamente",'s');
               }else{
                    WjAlert("El precio del producto no pudo ser actualizado en estos momentos intente mas luego",'e');
               } 
          },
          error: function(xhr, type, exception, thrownError){
              if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     }); 
}


/*--- Muestra las vaiaciones del prducto en caso de que los tenga ---*/
function showVariations(p){ 
     $.ajax({
          type:'POST',
          url: UrlHost_+"/administrator/manage-products/variations-products",
          data:{product : p},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(dataVariants){
               $("#listVariations_"+p).css("display","block");
               $("#listVariations_"+p).html(dataVariants); 
          },
          error: function(xhr, type, exception, thrownError){
             if(xhr.status===419){
                    location.reload(true);
               }else{
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
               }
          }
     });
     
}

/*---- para el previo de la imagen al cargarla desde un input file ----*/
function readURL(input) {
     var reg=/(.jpg|.jpeg|.png)$/;
     if (!reg.test($("#fileLoadImg").val())) {
          WjAlert("El tipo de archivo que intenta cargar no es valido, o su extension no esta permitida",'e');
          return false;
     }

     if (input.files && input.files[0]){
          var reader = new FileReader(); 
          reader.onload = function(e) {
               var file = $("#fileLoadImg")[0].files[0];
               var fileName = file.name;
               var fileSize = file.size;

               //console.log ($('#fileLoadImg').prop('files'))
               /*
               var TmpPath = URL.createObjectURL(e.target.files[0]);
               alert(TmpPath);
               */
               // alert(fileName);
               $('#previewAvatar').attr('src', e.target.result);
          } 
          reader.readAsDataURL(input.files[0]);
     }
}

/*--------*/

function filterProductAll(){
      
          var DataSearch = document.getElementById("filterProductAll").value;
          $.ajax({
               type:'POST',
               url: UrlHost_+"/store/product/searchfilterAll",
               data:{DataSearch : DataSearch},
               headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
               success: function(data){
                    $("#result").css("display", "none");
                    $("#filterListProduc").html(data);
               },
               error: function(xhr, type, exception, thrownError){
                   if(xhr.status===419){
                         location.reload(true);
                    }else{
                         alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);                    
                    }
               }
          });
     } 
    function table_filter() {
      $(".filter_table").slideToggle("slow");
    }



/*-----------End ------------------*/
 
/*
$('#free_appoinment_pro').click(function(){
     var nCityfree_ = $('#free_appoinment_pro').data('city');
     $("#listOfDoctors_").data("city",nCityfree_);
     $("#listOfDoctors_").data("type",49);
     $("#listOfDoctors_").data("specialty",368);
     sfilterData_(); 
});
*/