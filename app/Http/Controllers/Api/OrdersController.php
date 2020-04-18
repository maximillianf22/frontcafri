<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User,App\Store\Store_order,App\Store\Store_orders_detail;
use App\UserAddress;

class OrdersController extends Controller{


    public function Ordersfinished(Request $request){
        if($request){
            
            /*--- Recorro el Json para comezar a guardar la solicitud del pedido. ---*/

            /*--- Busca la direccion por el codigo  enviado ----*/
            $newAddress_ = " ";

            if(!empty($request->idaddress)){
                $findAddresses_ = UserAddress::where('id',$request->idaddress)
                ->where('idUser',$request->idCliente)->first();
                if(empty($findAddresses_)){
                    $newAddress_ = " ";
                }else{
                    $newAddress_ = $findAddresses_->addrees;
                }
            }

            $idCliente_ = $request->idCliente;
            $idaddress_ = $request->idaddress;
            $address_ = $newAddress_;
            $date_order_ = $request->date_order;
            $time_order_ = $request->time_order;
            $time_order_ = $request->time_order;
            $commentss_ = $request->commentss;
            $code_cupon_ = $request->code_cupon;
            $value_cupon_ = $request->value_cupon;
            $send_value_ =  $request->send_value;

            if(!empty($idCliente_)){
                $UserActive_ = User::where('id',$idCliente_)->first();
                if(!empty($UserActive_)){
                    if($UserActive_->emailVerified==11){
                    if(!empty($idaddress_)){
                    if(!empty($date_order_)){
                    if(!empty($time_order_)){
                        $DataOrder = new Store_order();
                        $DataOrder->idUser = $idCliente_;
                        $DataOrder->idaddress = $idaddress_;
                        $DataOrder->address = $address_;
                        $DataOrder->date_order = $date_order_;
                        $DataOrder->time_order = $time_order_;
                        $DataOrder->comments = $commentss_;
                        $DataOrder->code_cupon = $code_cupon_;
                        $DataOrder->cupon_value = $value_cupon_ ;
                        $DataOrder->send_value_cost = $send_value_ ;
                        $DataOrder->idStateOrder = 1;
                        $ArrayOrder_ = $request->products;
                        if ($DataOrder->save()){

                            /*Realizo el proceso de guardar los articulos de la compra.*/
                            foreach ( $ArrayOrder_ as $OrderArray) {
                                $DataOrderDetail = new Store_orders_detail();
                                $DataOrderDetail->idOrder = $DataOrder->id;
                                $DataOrderDetail->idUser = $idCliente_;
                                $DataOrderDetail->idProduct = $OrderArray['idProduct'];
                                $DataOrderDetail->nameProduct = $OrderArray['productName'];
                                
                                $DataOrderDetail->idAttribute = $OrderArray['idAttribute'];
                                $DataOrderDetail->stockOrder = $OrderArray['stockOrder'];
                                $DataOrderDetail->quantityOrder = $OrderArray['quantity'];

                                $DataOrderDetail->priceOrder = $OrderArray['productPriceN'];
                                $DataOrderDetail->totalOrder = $OrderArray['productPrice'];
                                
                                /*
                                if($UserActive_->isCommerce==1){
                                    $DataOrderDetail->priceOrder = $OrderArray['tradePriceN'];
                                    $DataOrderDetail->totalOrder = $OrderArray['tradePrice'];
                                }else{
                                    $DataOrderDetail->priceOrder = $OrderArray['productPriceN'];
                                    $DataOrderDetail->totalOrder = $OrderArray['productPrice'];
                                }
                                */

                                if ($DataOrderDetail->save()){
                                    $dSaveDetail_="Y";
                                }else{
                                    $dSaveDetail_="N";
                                }
                            }

                            if($dSaveDetail_=="Y"){
                                $data = Array("code" => 200, "data" => [], "message" => "Solicitud del Pedido ha sigo guardada.");
                            }else{
                                $data = Array("code" => 401, "data" => [], "message" => "Error al intentar realizar la solicitud del pedido");
                            }
                        }else{
                            $data = Array("code" => 401, "data" => [], "message" => "Error al procesar la información del pedido,");
                        }

                    }else{
                        $data = Array("code" => 401, "data" => [], "message" => "Error al realizar el proceso, Debe especificar una hora de entrega para el envio ");
                    }
                    }else{
                        $data = Array("code" => 401, "data" => [], "message" => "Error al realizar el proceso, Debe especificar una fecha de entrega para el envio ");
                    }
                    }else{
                        $data = Array("code" => 401, "data" => [], "message" => "Error al realizar el proceso, Debe especificar una direccion para el envio ");
                    }

                    }else{
                        $data = Array("code" => 401, "data" => [], "message" => "Error al realizar el proceso, el cliente no ha validado su cuenta ");
                    }
                }else{
                    $data = Array("code" => 404, "data" => [], "message" => "Identificacion del cliente no se encuenta registrada en la plataforma");
                }
            }else{
                $data = Array("code" => 401, "data" => [], "message" => "Identificacion del cliente, no puede estar en blanco");
            }
        }else{
            $data = Array("code" => 401, "data" => [], "message" => "Error al procesar los datos de la compra.");
        }
        return json_encode($data);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
