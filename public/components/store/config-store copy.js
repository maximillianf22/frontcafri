var idAttributeEdit = 0;
var action_ = "";
var arrayProductsCar,arrayRecovery, isPass,idTempG_, idTemp_;
arrayProductsCar = new Array(); arrayRecovery = new Array();
isPass=false;
var dt = new Date();
idTempG_=(dt.getMonth()+1)+""+dt.getHours() + "" + dt.getMinutes() + "" + dt.getSeconds();
idTemp_=0;
Cookies.set('generator',idTempG_,{ expires: 7 });


alert("hola");


/*---- Para abrir los modal de los productos de la tienda ----*/
function viewProduct($idProduct){
    // alert($idProduct);
     idAttributeEdit = $idAttribute;
     $('#modal-right').modal( 'hide' );
     $.ajax({
          type:'POST',
          url: UrlHost_+"/store/product",
          data:{idProduct_:$idProduct,idAttributeEdit_:idAttributeEdit},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               $('#view-product').modal();
               $("#info-modal-product").html(data);
          },
          error: function(xhr, type, exception, thrownError) { 
               alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);
          }
     });
}

$( ".mi_calendario" ).datepicker({
     // Formato de la fecha
     dateFormat: "dd/mm/yy",
     // Primer dia de la semana - lunes
     firstDay: 1,
     // Días largo traducido
     dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
     // Dias cortos traducido
     dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
     // Nombres largos de los meses traducido
     monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
     // Nombres cortos de los meses traducido 
     monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec" ],
     // Al selecconar fecha, se escribe en el campo de texto
     onSelect: function(dateText) { 
       $('#fecha').val(dateText);
     }
   });

/*-- Orientacion Datapicker --*/
$('.datepicker').datepicker({
     format: 'mm/dd/yyyy',
     startDate: '-3d', 
     orientation: "bottom"
 });
 /*---------------------------*/
 
var cookieSystem_ = Cookies.get('store.catalogo');
if(cookieSystem_===undefined){
     // alert("cookie no esta definida");
}else{
     if(isPass===false){
          arrayRecovery= cookieSystem_;
          arrayProductsCar = JSON.parse(arrayRecovery);
          isPass=true;
          addCarnewProduct();
     }else{   
     }     
}

function searchProduct($a){
     var DataSearch = document.getElementById("searchProduct").value;
     var slug = $("#searchProduct").data("slug");
     var id = $("#searchProduct").data("id");

     $.ajax({
          type:'POST',
          url: UrlHost_+"/store/product/search",
          data:{DataSearch : DataSearch,slug:slug,id:id},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               $("#filterProducts").html(data);
          },
          error: function(xhr, type, exception, thrownError){
               alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);
          }
     });
    // document.getElementById("demo").innerHTML = x;
}

function searchProductAll(){
     var DataSearch = document.getElementById("searchProductAll").value;
     
     $.ajax({
          type:'POST',
          url: UrlHost_+"/store/product/searchAll",
          data:{DataSearch : DataSearch},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               $("#filterProducts").html(data);
          },
          error: function(xhr, type, exception, thrownError){
               alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);
          }
     });
    // document.getElementById("demo").innerHTML = x;
}

function checkCookieSystem($nameCookie_) {
     var dataCookie = getCookie($nameCookie_);
     if(!empty($nameCookie_)){
          if (dataCookie != "") {
               alert("cookie existe ");
          } else {
               alert("no cookie existe ");
          }
     }else{
     }
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


function CloseModal() {
     $("#view-product").modal('hide'); //ocultamos el modal
     $('body').removeClass('modal-open');  //eliminamos la clase del body para poder hacer scroll
     $('.modal-backdrop').remove();  //eliminamos el backdrop del modal
}

function CloseModalCar() {
     $("#modal-right").modal('hide'); //ocultamos el modal
     $('body').removeClass('modal-open'); //eliminamos la clase del body para poder hacer scroll
     $('.modal-backdrop').remove(); //eliminamos el backdrop del modal
}


/*--- Borra la Cookie ---*/
function clearbasket(){
     Cookies.remove('store.catalogo'); Cookies.remove('id.catalogo');
     location.reload(true);
     Cookies.set('id.catalogo',idTempG_,{ expires: 7 });
}

function addCarnewProduct(){
     if(arrayProductsCar.length > 0){
          Cookies.set('store.catalogo',arrayProductsCar,{ expires: 7 });
          action_ =  Cookies.get('id.catalogo');
          if(action_ === undefined){  Cookies.set('id.catalogo',idTempG_,{ expires: 7 }); }
          var dataJson_ = Cookies.get('store.catalogo');
          var idJson_ = Cookies.get('id.catalogo');

          $.ajax({
               type:'POST',
               url: UrlHost_+"/store/product/addcarview",
               data:{dataJson : dataJson_,idJson: idJson_,action:"A",itemDel : 0},
               headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
               success: function(data){
                    $(".ant-badge-count").removeAttr("style");
                    $("#listcar-content-products").html(data);
                    $('#view-product').modal( 'hide' );
               },
               error: function(xhr, type, exception, thrownError){
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);
               }
          });
     }else{ }
}

/*---- Identifica cual de los productos marque en el modal para agregar/restar cantidades -----*/

function addProductCar($Product,$idAttribute,$CarProductEdit){
     if($("#itemProduct_"+$idAttribute).is(':checked')) { 
          $("#itemProduct_"+$idAttribute).attr('checked', true); 
          $("#productValue_"+$Product+"_"+$idAttribute).val(0);
          $("#opt-add-car-"+$idAttribute).removeClass("hide")
          $("#opt-add-car-"+$idAttribute).addClass("show")
          var minimumOrder_ = parseFloat($("#opt-add-car-"+$idAttribute).data("cntventa"));
         // addCntCar($Product,$idAttribute,100,0);
     } else {
          restCntCar($Product,$idAttribute,0);
          $("#productValue_"+$Product+"_"+$idAttribute).val();
          $("#itemProduct_"+$idAttribute).attr('checked', false);
          $("#opt-add-car-"+$idAttribute).removeClass("show")
          $("#opt-add-car-"+$idAttribute).addClass("hide")
     }
     
     if($CarProductEdit !=""){
          $data_ = $CarProductEdit.split("-");
         // addCntCar($data_[0],$data_[1],$data_[2],parseFloat($data_[3]));
     }
     cargar_carrito();
}

/*-------*/
function totAcmproduct($idProduct,$idAttribute,$action,$vrAcmAnterior,$vrAcmNew){

     var acmtemp_ = $("#productLis-"+$idProduct).data("total");
     acmtemp_ = ((acmtemp_+$vrAcmNew)-$vrAcmAnterior);

     $("#productLis-"+$idProduct).data("total",(acmtemp_));
     totalCesta_ =  $("#productLis-"+$idProduct).data("total");
     if(totalCesta_<1) { totalCesta_=0;}
     $("#addNewProductCar").html("<i class='lni-cart'></i> Agregar $ "+ totalCesta_.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') +" a la cesta");
     /*-------------------------------------------------------------------------*/
     var myProductsCar = new Object();
          myProductsCar.idKeyProduct = $idProduct+"-"+$idAttribute;
          myProductsCar.nameProduct = $("#product-item-"+$idAttribute).data("name");
          myProductsCar.idProduct = $idProduct;
          myProductsCar.imgAttribute = $("#product-item-"+$idAttribute).data("img");
          myProductsCar.typeUnit = $("#product-item-"+$idAttribute).data("typeunit");
          myProductsCar.idAttribute =$idAttribute;
          myProductsCar.quantityOrder = $("#productValue_"+$idProduct+"_"+$idAttribute).val();
          myProductsCar.priceOrder =$("#opt-add-car-"+$idAttribute).data("price");
          myProductsCar.pricecoemrceOrder =$("#opt-add-car-"+$idAttribute).data("price");
          myProductsCar.totalOrder =($("#productValue_"+$idProduct+"_"+$idAttribute).val() * $("#opt-add-car-"+$idAttribute).data("price"));
          myProductsCar.stockOrder = $("#product-item-"+$idAttribute).data("stock");
     
     var found_ = 'N';
     if(arrayProductsCar.length===0){
          arrayProductsCar.push(myProductsCar);
     }else{
          for(var i=0; i < arrayProductsCar.length; i++) {
               $data_ = arrayProductsCar[i]["idKeyProduct"];
               // alert("data : "+i);
               if($data_ === $idProduct+"-"+$idAttribute){
                    arrayProductsCar[i]["inventory"]=$("#productValue_"+$idProduct+"_"+$idAttribute).val();
                    arrayProductsCar[i]["totalitem"] = (arrayProductsCar[i]["price"]*$("#productValue_"+$idProduct+"_"+$idAttribute).val());
                    found_ = 'Y';
               }
          }
          if(found_ === 'N') {
               arrayProductsCar.push(myProductsCar);
               Cookies.set('store.catalogo',arrayProductsCar,{ expires: 7 });
          }else{}
     }

     Cookies.set('store.catalogo',arrayProductsCar,{ expires: 7 });
     var idJson_ = Cookies.get('id.catalogo');
     cargar_carrito();

}

/*Resto a la cantidad del valor del producto*/
function restCntCar($idProduct,$idAttribute,$stock,$cntTmpEdit_){
     var newCnt = 0 ;
     var vrAcmAnterior = 0 , vrAcmNew = 0;

     var amount_per_sale_ = parseFloat($("#opt-add-car-"+$idAttribute).data("cntventa"));
     var priceItemactual_ = $("#opt-add-car-"+$idAttribute).data("price");
     var restValue = $("#productValue_"+$idProduct+"_"+$idAttribute).val();
     
     newCnt = parseFloat(restValue) - parseFloat(amount_per_sale_);

     if($stock<1){ newCnt = parseFloat(amount_per_sale_) }
     if(newCnt<1){ newCnt = parseFloat(amount_per_sale_);}

     vrAcmAnterior = parseFloat(priceItemactual_)*parseFloat($("#productValue_"+$idProduct+"_"+$idAttribute).val());

     if($("#itemProduct_"+$idAttribute).is(':checked')) { 
          // $("#opt-add-car-"+$idAttribute).data("priceaddcar",(priceItemactual_*newCnt));
          $("#productValue_"+$idProduct+"_"+$idAttribute).val(newCnt);
          vrAcmNew = parseFloat(priceItemactual_)*parseFloat($("#productValue_"+$idProduct+"_"+$idAttribute).val());
          totAcmproduct($idProduct,$idAttribute,"rest",vrAcmAnterior,vrAcmNew);
     }else{
          var cntActualitemProduct_ = 0;
          cntActualitemProduct_ = $("#productValue_"+$idProduct+"_"+$idAttribute).val();
          vrAcmAnterior = parseFloat(priceItemactual_)*parseFloat(cntActualitemProduct_);
          totAcmproduct($idProduct,$idAttribute,"rest",vrAcmAnterior,0);
     }
}

/*--- Resto a la cantidad del valor del producto ---*/

function editCntProduct($Product,$idAttribute,$cnt){
    addCntCar($Product,$idAttribute,100,0); 
}


function addCntCar($idProduct,$idAttribute,$stock,$cntTmpEdit_){

     /*--- Datos del Producto --- */
     $ProductId_ =$idProduct;

     /*Busco el daton en la tabla de los productos*/
     $.ajax({
          type:'POST',
          url: UrlHost_+"/store/product/loadItemCar",
          data:{dataProduc_:$ProductId_, dataAction_:'Add'},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               alert("sumar prudcto");
          },
          error: function(xhr, type, exception, thrownError){
               alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);
          }
     });
     /*-------------------------------------------*/
     
     // alert("id :"+$idProduct+" atrinute "+$idAttribute+" Stock "+$stock+" cantodad edit "+$cntTmpEdit_);

     var newCnt = 0 ;
     var vrAcmAnterior = 0 , vrAcmNew = 0;
     var amount_per_sale_ = parseFloat($("#opt-add-car-"+$idAttribute).data("cntventa"));
     var priceItemactual_ = parseFloat($("#opt-add-car-"+$idAttribute).data("price"));
     var restValue = $("#productValue_"+$idProduct+"_"+$idAttribute).val();
     newCnt = parseFloat(restValue) + parseFloat(amount_per_sale_);
     vrAcmAnterior = parseFloat(priceItemactual_)*parseFloat($("#productValue_"+$idProduct+"_"+$idAttribute).val());
     $("#productValue_"+$idProduct+"_"+$idAttribute).val(newCnt);

     vrAcmNew = parseFloat(priceItemactual_)*parseFloat($("#productValue_"+$idProduct+"_"+$idAttribute).val());
     totAcmproduct($idProduct,$idAttribute,"add",vrAcmAnterior,vrAcmNew);

}


function removeProduct($idProduct,$idAttribute){
     var DataOrders_ = arrayProductsCar;
     var Key_ = $idProduct.toString()+"-"+$idAttribute.toString();

    
     action_ =  Cookies.get('id.catalogo');
     if(action_ === undefined){
          Cookies.set('id.catalogo',idTempG_,{ expires: 7 });
     }else{
          cargar_carrito();
          var dataJson_ = Cookies.get('store.catalogo');   
          // alert("entro");
     }
     var idJson_ = Cookies.get('id.catalogo');
     
     /*Actualizo el carrito */
     $.ajax({
          type:'POST',
          url: UrlHost_+"/store/product/removecarview",
          data:{dataJson : dataJson_,idJson: idJson_,itemDel:$idProduct},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               $(".ant-badge-count").removeAttr("style");
               $("#listcar-content-products").html(data);
               $('#view-product').modal( 'hide' );
               cargar_carrito();
          },
          error: function(xhr, type, exception, thrownError){
               alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);
          }
     });
     /* Actualiza el array con los nuevos productos. */
     
}

function cargar_carrito(){
     var idJson_ = Cookies.get('id.catalogo');
     
     $.ajax({
          type:'POST',
          url: UrlHost_+"/store/product/reloadCar",
          data:{idJson: idJson_},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               Cookies.set('store.catalogo',data,{ expires: 7 });
              
          },
          error: function(xhr, type, exception, thrownError){
               alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);
          }
     });
}



function removeProduct_old($idProduct,$idAttribute){
     var DataOrders_ = arrayProductsCar;
     var Key_ = $idProduct.toString()+"-"+$idAttribute.toString();
     for(var i=0;i<arrayProductsCar.length;i++){
          if(arrayProductsCar[i]["idKeyProduct"]===Key_){
               arrayProductsCar.splice(i, 1);
               // Cookies.set('store.catalogo',arrayProductsCar,{ expires: 7 });
               var dataJson_ = Cookies.get('store.catalogo');   
               var idJson_ = Cookies.get('id.catalogo');

               /*Actualizo el carrito */
               $.ajax({
                    type:'POST',
                    url: UrlHost_+"/store/product/addcarview",
                    data:{dataJson : dataJson_,idJson: idJson_,action:"D",itemDel :$idProduct},
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(data){
                         $(".ant-badge-count").removeAttr("style");
                         $("#listcar-content-products").html(data);
                         $('#view-product').modal( 'hide' );
                    },
                    error: function(xhr, type, exception, thrownError){
                         alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);
                    }
               });
          }
     }
}


/*---- Para abrir los modal de los productos de la tienda ----*/
function openProduct($idProduct,$idAttribute){
    
     idAttributeEdit = $idAttribute;
     $('#modal-right').modal( 'hide' );
     $.ajax({
          type:'POST',
          url: UrlHost_+"/store/product",
          data:{idProduct_:$idProduct,idAttributeEdit_:idAttributeEdit},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               $('#view-product').modal();
               $("#info-modal-product").html(data);
          },
          error: function(xhr, type, exception, thrownError) { 
               alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);
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
                   
               }else{
                    alert("Error, Al intentar Cancelar la Orden");
               }
               // window.location.href = '/store/mycart/checkout';
          },
          error: function(xhr, type, exception, thrownError) { 
               alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);
          }
     });
}

function saveOrder(){

     var Data_address_ = $("#address_order").val(); 
     var Data_date_ = $("#date_order").val();
     var Data_time_ = $("#time_order").val();
     var Data_comments_ = $("#obs_order").val();
     var DataOrders_ = arrayProductsCar;
     if(Data_address_!=""){
          $.ajax({
               type:'POST',
               url: UrlHost_+"/store/mycart/checkout",
               data:{Data_address:Data_address_,Data_date:Data_date_,Data_time:Data_time_,Data_comments:Data_comments_,DataOrders:DataOrders_},
               headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
               success: function(data){
                    if(data==="Y"){
                        Cookies.remove('store.catalogo');
                         window.location.href = '/store/orders';
                    }else{ alert("Error, no se pudo guardar el pedido"); }
               },
               error: function(xhr, type, exception, thrownError) { 
                    alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);
               }
          });
     }else{
          alert("Datos no pueden estar vacios");
     }
}

function checkoutProducts(){
     var jSonData_ = JSON.stringify($("#checkouStoreCar").data("json"));
     // alert(jSonData_);
     //alert($idAttribute);
     $.ajax({
          type:'POST',
          url: UrlHost_+"/store/product/checkout",
          data:{jSonData:jSonData_},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data){
               window.location.href = '/store/mycart/checkout';
          },
          error: function(xhr, type, exception, thrownError) { 
               alert("Ajax error type "+type+ " Status : "+xhr.status+"\n "+exception+"\n Mensaje :"+xhr.responseText);
          }
     });
    
}

$(".number").on({
     "focus": function (event) {
         $(event.target).select();
     },
     "keyup": function (event) {
         $(event.target).val(function (index, value ) {
             return value.replace(/\D/g, "")
                         .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                         .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
         });
     }
 });



