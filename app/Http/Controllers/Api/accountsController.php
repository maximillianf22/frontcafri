<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserAddress;
use Illuminate\Support\Facades\DB;
use App\Store\Store_order, App\Store\Store_orders_detail;
use Hash, Auth, Mail, Session, Redirect;
use App\User;
use App\Config\Gestor_plantillas, App\Config\Configuracion_valor;
use App\Core\pais_dpts_citys, App\Store\Store_detail_order, App\Store\Store_attributes_value;
use App\Store\Store_cupon, App\Store\store_ranges_hour, App\Store\Users_addresses_detail;

class accountsController extends Controller{
    public function parameters(Request $request){
        $parameters_ = Store_attributes_value::where('idState',1)->whereIn('id',['15','16'])->get();
        $HourRanges_ = store_ranges_hour::where('idState',1)->orderBy('id','Asc')->get();
        if(!empty($parameters_)){
            $data = Array("code" =>200, "data" => $parameters_,"rango_horas"=>$HourRanges_,"message" => "solicitud realizada satisfactoriamente");
        }else{
            $data = Array("code" =>400, "data" => [], "message" => "No existen parametros configurados");
        }
        return json_encode($data);
    }

    public function listaddresses(Request $request){
        if($request){
            if($request->idaccount){
                $ValidaUser_ = User::where('id',$request->idaccount)->first();
                if(!empty($ValidaUser_)){
                    /*
                    $idAccount_ = UserAddress::where('idUser',$request->idaccount)
                    ->where('idCountry',$request->idPais)
                    ->where('idDpto',$request->idDpto)
                    ->where('idCity',$request->idCity)->first();
                    */
                    $idAccount_ = Users_addresses_detail::where('idUser',$request->idaccount)->get();
                    
                    if(!empty($idAccount_)){
                        $data = Array("code" =>200, "data" => $idAccount_, "message" => "Solicitud realizada con exito");
                        return json_encode($data);
                    }else{
                        $data = Array("code" =>404, "data" => $idAccount_, "message" => "Usuario no posee direcciones creadas");
                        return json_encode($data);
                    }
                }else{
                    $data = Array("code" =>404, "data" => [], "message" => "Error, Codigo de Usuario no se encuentra registrado");
                    return json_encode($data);
                }
                
            }else{
                $data = Array("code" =>404, "data" => [], "message" => "Informacion de la cuenta esta vacia");
                return json_encode($data);
            }
        }else{
            $data = Array("code" => 404, "data" => $dataFnc, "message" => "Error al procesar la consulta,datos no pueden estar vacios");
            return json_encode($data);
        }
    }

    public function addnewaddresses(Request $request){
        if($request){
            if(!empty($request->idUser)){
                $ValidaUser_ = User::where('id',$request->idUser)->first();
                if(!empty($ValidaUser_)){
                    $DataAddress = new UserAddress();
                    $DataAddress->idUser = $request->idUser;
                    $DataAddress->addrees = $request->addrees;

                    $DataAddress->tipo_calle = $request->tipo_calle;
                    $DataAddress->dir_1 = $request->dir_1;
                    $DataAddress->dir_2 = $request->dir_2;
                    $DataAddress->dir_3 = $request->dir_3;

                    $DataAddress->idStreetType = $request->idStreetType;
                    $DataAddress->nameNumberStreet = $request->nameNumberStreet;
                    $DataAddress->streetGenerate = $request->streetGenerate;
                    $DataAddress->streetPlate = $request->streetPlate;
                    $DataAddress->idCountry = $request->idCountry;
                    $DataAddress->idDpto = $request->idDpto;
                    $DataAddress->idCity = $request->idCity;
                    $DataAddress->reference = $request->reference;
                    $DataAddress->description = $request->description;
                    $DataAddress->comments = $request->comments;
                    $DataAddress->latitude = $request->latitude;
                    $DataAddress->altitude = $request->altitude;
                    $DataAddress->idState = 1;
                    if ($DataAddress->save()){
                        $data = Array("code" =>200, "data" => [], "message" => "Dirección agregada correctamente");
                        return json_encode($data);
                    }else{
                        $data = Array("code" =>404, "data" => [], "message" => "Error, intentar guardar la informacion");
                        return json_encode($data);  
                    }

                }else{
                    $data = Array("code" =>404, "data" => [], "message" => "Error, Codigo de Usuario no se encuentra registrado");
                    return json_encode($data);  
                }
            }else{
                $data = Array("code" =>404, "data" => [], "message" => "Informacin de la cuenta esta vacia");
                return json_encode($data);
            }
        }else{
            $data = Array("code" => 404, "data" => $dataFnc, "message" => "Error al procesar la consulta,datos no pueden estar vacios");
            return json_encode($data);
        }
    }

    public function editaddresses(Request $request){
        if($request){
            if(!empty($request->idUser)){
                $ValidaUser_ = User::where('id',$request->idUser)->first();
                if(!empty($ValidaUser_)){
                    $findAddresses_ = UserAddress::where('id',$request->id)->where('idUser',$request->idUser)->first();
                    if(!empty($findAddresses_)){

                        $findAddresses_->addrees = $request->addrees;

                        $findAddresses_->tipo_calle = $request->tipo_calle;
                        $findAddresses_->dir_1 = $request->dir_1;
                        $findAddresses_->dir_2 = $request->dir_2;
                        $findAddresses_->dir_3 = $request->dir_3;
                        
                        $findAddresses_->idStreetType = $request->idStreetType;
                        $findAddresses_->nameNumberStreet = $request->nameNumberStreet;
                        $findAddresses_->streetGenerate = $request->streetGenerate;
                        $findAddresses_->streetPlate = $request->streetPlate;
                        $findAddresses_->idCountry = $request->idCountry;
                        $findAddresses_->idDpto = $request->idDpto;
                        $findAddresses_->idCity = $request->idCity;
                        $findAddresses_->reference = $request->reference;
                        $findAddresses_->description = $request->description;
                        $findAddresses_->comments = $request->comments;
                        $findAddresses_->latitude = $request->latitude;
                        $findAddresses_->altitude = $request->altitude;
                        
                        if ($findAddresses_->update()){
                            $data = Array("code" =>200, "data" => [], "message" => "Dirección Actualizada correctamente");
                            return json_encode($data);
                        }else{
                            $data = Array("code" =>404, "data" => [], "message" => "Error, intentar guardar la informacion");
                            return json_encode($data);  
                        }
                    }else{
                        $data = Array("code" =>404, "data" => [], "message" => "Error, intentar guardar la informacion, direccion no encontrada");
                        return json_encode($data);  
                    }
                    

                }else{
                    $data = Array("code" =>404, "data" => [], "message" => "Error, Codigo de Usuario no se encuentra registrado");
                    return json_encode($data);  
                }
            }else{
                $data = Array("code" =>404, "data" => [], "message" => "Informacin de la cuenta esta vacia");
                return json_encode($data);
            }
        }else{
            $data = Array("code" => 404, "data" => $dataFnc, "message" => "Error al procesar la consulta,datos no pueden estar vacios");
            return json_encode($data);
        }
    }
    
    public function deladdresses(Request $request){
        if($request){
            if(!empty($request->idUser)){
                $ValidaUser_ = User::where('id',$request->idUser)->first();
                if(!empty($ValidaUser_)){
                    $findAddresses_ = UserAddress::where('id',$request->id)->where('idUser',$request->idUser)->first();
                    if(!empty($findAddresses_)){

                        $findAddresses_->idState = 2 ;

                        if ($findAddresses_->update()){
                            $data = Array("code" =>200, "data" => [], "message" => "Dirección Eliminada correctamente");
                            return json_encode($data);
                        }else{
                            $data = Array("code" =>404, "data" => [], "message" => "Error, intentar guardar la informacion");
                            return json_encode($data);  
                        }
                    }else{
                        $data = Array("code" =>404, "data" => [], "message" => "Error, intentar guardar la informacion, direccion no encontrada");
                        return json_encode($data);  
                    }
                }else{
                    $data = Array("code" =>404, "data" => [], "message" => "Error, Codigo de Usuario no se encuentra registrado");
                    return json_encode($data);  
                }
            }else{
                $data = Array("code" =>404, "data" => [], "message" => "Informacin de la cuenta esta vacia");
                return json_encode($data);
            }
        }else{
            $data = Array("code" => 404, "data" => $dataFnc, "message" => "Error al procesar la consulta,datos no pueden estar vacios");
            return json_encode($data);
        }
    }

    /*Lista historial pedido del cliente   */
    public function pedidosHistorial(Request $request){
        if($request){
            if(!empty($request->idUser)){
                $validaUser_ = User::where('id',$request->idUser)->first();
                if(!empty($validaUser_)){
                    /*Busco las ordenes del cliente. */
                    $Orders_ = Store_detail_order::where('idUser',$request->idUser)->groupBy('id','idUser')->get(['id','idUser','address','date_order','time_order','comments','code_cupon','cupon_value','totOrder']);
                    if(!empty($Orders_)){
                        $ArraysOrders_ =array();
                        foreach($Orders_ as $items_){
                            $OrdDetails_ = Store_detail_order::where('id',$items_['id'])
                            ->where('idUser',$items_['idUser'])
                            ->orderBy('nameProduct','ASC')
                            ->get(['idProduct','idAttribute','nameProduct','priceOrder','priceComerceOrder','stockOrder','total_producto','quantityOrder','imageProduct','idSales_unit','valor_unidad']);
                            $items_->details = $OrdDetails_;
                            $ArraysOrders_[] = $items_;
                        }
                        $data = Array("code" => 200, "data" => $ArraysOrders_, "message" => "Informe de pedido(s) realizado correctamente.");
                    }else{
                        $data = Array("code" => 200, "data" => [], "message" => "El cliente no posee pedidos aun realizados.");
                    }
                }else{
                    $data = Array("code" => 401, "data" => [], "message" => "Error, El codigo ha validar no se encuenta registrado.");
                }
            }else{
                $data = Array("code" => 401, "data" => [], "message" => "Error, El código/id a consultar no puede estar vacio.");
            }
        }else{
            $data = Array("code" => 401, "data" => [], "message" => "Error, los datos a consultar no pueden ser evaluados sin un código inicial");
        }
        return json_encode($data);
    }


    public function getCupon(Request $request){
        if($request){
            if(!empty($request->codigo)){
                $ValidateCupon_ = Store_cupon::where('idState',1)->where('code_cupon',$request->codigo)->first();
                if(!empty($ValidateCupon_)){
                    if($ValidateCupon_->cupon_used<$ValidateCupon_->user_limit && $ValidateCupon_->cupon_limite<>2 ){
                        $data = Array("code" => 200, "data" => $ValidateCupon_, "message" => "Información Cupon Valido");
                    }else{
                        $data = Array("code" => 404, "data" => [], "message" => "no es posible redimir el cupon");
                    }
                }else{
                    $data = Array("code" => 404, "data" => [], "message" => "Codigo de Cupon no encontrado o valido");
                }
            }
        }else{
           
        }
        return json_encode($data);
    }


    /*Registro del Usuario a la plataforma */
    public function registerUserAccount(Request $request){
        $ConfigTheme_ = Gestor_plantillas::where('idState',1)->where('principal',1)->first();
        $ConfStateRegister_ =  Configuracion_valor::where('id',8)->first();
     
        if($request){
            if(!empty($request->first_name)){
                if(!empty($request->celular)){
                    if(!empty($request->email)){
                        $searchMail_ = User::where('email',$request->email)->first();
                        if(!empty($searchMail_ )){
                            $data = Array("code" => 404, "data" => [], "message" => "Error, Cuenta de Email ya registrada");
                        }else{
                            $DataUser = new User();
                            /*--- Datos  Basicos ---*/
                            $DataUser->nameUser = $request->first_name;
                            $DataUser->lastnameUser = $request->last_name;
                            $DataUser->nameBusiness = $request->namebusiness;
                            $DataUser->email = $request->email;
                            $DataUser->celularUser =  intval(preg_replace('/[^0-9]+/','', $request->celular), 10);
                            $DataUser->password = bcrypt($request->password);
                            $DataUser->remember_token = str_random(100);
                            $DataUser->confirm_token = str_random(100);
                            $DataUser->idPerfil = 0;
                            $DataUser->emailVerified = 1;
                            $DataUser->fechaNac = $request->fechaNac;
                            $DataUser->emailVerified =  11;
                            $DataUser->idPerfil =  2;
                            $DataUser->idState =  1;
                            $DataUser->idTheme =  $ConfigTheme_->id;
                            if(!empty($request->namebusiness)){
                                $DataUser->isCommerce =  1;
                            }else{
                                $DataUser->isCommerce =  0;
                            }
                            $DataUser->idRole = !empty($ConfStateRegister_->extra) ? $ConfStateRegister_->extra : 0;
                            if ($DataUser->save()){
    
                                $searchRow_ = User::where('email',$request->email)->whereIn('emailVerified',[10,11])->first();
                                if(!empty($searchRow_)){
    
                                    $data['name'] =  $searchRow_->nameUser;
                                    $data['identificacion'] = $request->identificacion;
                                    $data['email'] = $request->email;
                                    $data['confirm_token'] = $searchRow_->confirm_token;
                                    /*----*/
                                    Mail::send('email_templates.confirmAccount', ['data' => $data], function($mail) use($data){
                                        $mail->subject('Activar nueva cuenta ');
                                        $mail->to($data['email'],$data['name']);
                                    });
    
                                   /*--- Send Sms ----------------------------------*/
                                    /*
                                    $TextSms_= "Bienvenido a ".$ConfigTheme_->name_theme.", Para completar tu registro te hemos enviado un correo para la activacion de tu cuenta ";
                                    */

                                    $TextSms_= "Bienvenido a Tuproveedor.com, Ya puedes realizar tus pedidos desde nuestra aplicación movil, o desde nuestra página web";

                                    $CelSms_='57'.intval(preg_replace('/[^0-9]+/','', $request->celular), 10);
                                    $EstadoSms_ = $this->SendSms_($CelSms_,$TextSms_);
                                    $data = Array("code" => 200, "data" => [], "message" => "Registro exitoso, Ya puedes realizar tus pedidos desde nuestra aplicación o sitio web.");
                                }else{
                                    $data = Array("code" => 404, "data" => [], "message" => "Error, Error al intentar crear la cuenta");
                                }
                            }else{
                                $data = Array("code" => 404, "data" => [], "message" => "Error, Error al intentar crear la cuenta.");
                            }
                        }
                    }else{
                        $data = Array("code" => 404, "data" => [], "message" => "Error, Debe Especificar una cuenta de correo");
                    }
                }else{
                    $data = Array("code" => 404, "data" => [], "message" => "Error, Debe Especificar el numero del Celular"); 
                }
            }else{
                $data = Array("code" => 404, "data" => [], "message" => "Error, Debe Especificar el nombre del Usuario");
            }
        }else{
            $data = Array("code" => 404, "data" => [], "message" => "Error, Los datos no pueden estar vacios.");
        }
        return json_encode($data);

    }
    
    /* Editar perfil del usuario en la app */
    public function editProfile(Request $request){
        if ($request) {
            if(!empty($request->idUser)){
                $validaUser_ = User::where('id',$request->idUser)->first();
                if(!empty($validaUser_)){
                    $validaUser_->nameUser = $request->name;
                    $validaUser_->lastnameUser = $request->lastName;
                    if (!empty($request->password)) {
                        $validaUser_->password = bcrypt($request->password);
                    }
                    if ($validaUser_->update()) {
                        $data = Array("code" => 200, "data" => $validaUser_, "message" => "Perfil Actualizado correctamente");
                    }else{
                        $data = Array("code" => 401, "data" => [], "message" => "Error, al momento de actualizar tus datos");
                    }
                }else{
                    $data = Array("code" => 401, "data" => [], "message" => "Error, El codigo ha validar no se encuenta registrado.");
                }
            }else{
                $data = Array("code" => 401, "data" => [], "message" => "Error, El código/id a consultar no puede estar vacio.");
            }
        }else{
            $data = Array("code" => 401, "data" => [], "message" => "Error, los datos a consultar no pueden ser evaluados sin un código inicial"); 
        }
        return json_encode($data);
    }


    /*------------------*/
    public function PaisesLista(Request $request){
        $searchCountry_ = pais_dpts_citys::groupBy('idPais')->orderBy('nombrePais','Asc')->get(['idPais','nombrePais','indicativoPais']);
        if(!empty($searchCountry_)){
            $data = Array("code" => 200, "data" => $searchCountry_, "message" => "success,Listado de Paises");
        }else{
            $data = Array("code" => 404, "data" => [], "message" => "Error, No existen Paises cargados");   
        }  
        return json_encode($data);
    }

    public function DptosLista(Request $request){
        if ($request) {
            if(!empty($request->idCountry)){
                $searchCountry_ = pais_dpts_citys::where('idPais',$request->idCountry)->groupBy(['idPais','codDpto'])->orderBy('nombrePais','Asc')->get(['codDpto','nombreDpto']);
                if(!empty($searchCountry_)){
                    $data = Array("code" => 200, "data" => $searchCountry_, "message" => "success, Listado de Departamentos");   
                }else{
                    $data = Array("code" => 404, "data" => [], "message" => "Error, No existe un Pais con el codigo suministrado");   
                }
            }else{
                $data = Array("code" => 401, "data" => [], "message" => "Error, Debe Especificar el Codigo del Pais");   
            }
        }else{
            $data = Array("code" => 401, "data" => [], "message" => "Error, Debe Especificar los datos de consulta"); 
        }
        return json_encode($data);
    }

    
    public function CitysLista(Request $request){
        if ($request) {
            if(!empty($request->idCountry)){
                if(!empty($request->codDpto)){
                    $searchCitys_ = pais_dpts_citys::where('idPais',$request->idCountry)->where('codDpto',$request->codDpto)->orderBy('nombreCiudad','Asc')->get(['codCiudad','nombreCiudad']);
                    if(!empty($searchCitys_)){
                        $data = Array("code" => 200, "data" => $searchCitys_, "message" => "success, Información encontrada");   
                    }else{
                        $data = Array("code" => 404, "data" => [], "message" => "Error, No existe información con los filtros suministrados");   
                    }
                }else{
                    $data = Array("code" => 401, "data" => [], "message" => "Error, Debe Especificar el Codigo del Departamento");   
                }
            }else{
                $data = Array("code" => 401, "data" => [], "message" => "Error, Debe Especificar el Codigo del Pais");   
            }
        }else{
            $data = Array("code" => 401, "data" => [], "message" => "Error, Debe Especificar los datos de consulta"); 
        }
        return json_encode($data);
    }

}
