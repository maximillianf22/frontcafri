<?php

namespace App\Http\Controllers\Administrator;
use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User,App\Store\Store_order,App\Store\Store_orders_detail;
use App\Store\Store_attributes_value;
use App\Config\Gestor_plantillas;
use App\Store\Store_detail_order;


class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            /*-----*/
            $minimun_value_ = Store_attributes_value::where('id',15)->first(['extra']);
            $minimun_send_ = Store_attributes_value::where('id',16)->first(['extra']);

            $dataOrders = Store_detail_order::groupBy('id')->orderBy('id','Desc')->get();
            foreach ($dataOrders as $key => $ord_) {
                $ord_['monto_minimo'] = $minimun_value_->extra;
                $ord_['costo_envio'] = $minimun_send_->extra;
                # code...
            }
            
            $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
            return view('theme.components.administrator.comp_orders.list',compact('dataOrders','permisos_'));
        }
    }

    public function filterList(Request $request){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){

            if(!empty($request->DataSearch)){
                $dataOrders = Store_detail_order:: where('id','like','%'.$request->DataSearch.'%')
                ->orWhere('nameUser','like','%'.$request->DataSearch.'%')
                ->orWhere('nameBusiness','like','%'.$request->DataSearch.'%')
                ->orWhere('created_at','like','%'.$request->DataSearch.'%')
                ->orWhere('date_order','like','%'.$request->DataSearch.'%')
                ->orWhere('time_order','like','%'.$request->DataSearch.'%')
                ->orWhere('total_producto','like','%'.$request->DataSearch.'%')
                ->groupBy('id')
                ->orderBy($request->iOrder_,$request->tOrder_)->get();

            }else{
                // return $request->iOrder_; created_at

                $dataOrders = Store_detail_order::groupBy('id','idUser')->orderBy($request->iOrder_,$request->tOrder_)->get();
            }
            return view('theme.components.administrator.comp_orders.filterList',compact('dataOrders'));
        }
    }

    public function updateStateOrder(Request $request, $idOrder){
       //  return $request->EstadoPedido;
        $Order = Store_order::where('id',$idOrder)->first();
        if(!empty($Order)){
            $Order->idStateOrder = $request->EstadoPedido;
            if($Order->update()){
                return redirect()->route('admin.orders');
               
            }
        }
       
       // return view('themes.administrator.mod-store.orders.index', compact('dataOrders'));
    }


    
    public function manageOrder($idOrder){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){

            $ListProduct = Store_detail_order::where('id',$idOrder)
            ->orderBy('catergorie_main' ,'Asc')
            ->get();
            // return $ListProduct;

            $dataOrders = Store_order::paginate(10);
            $Order = Store_detail_order::where('id',$idOrder)->groupBy('id')->first();
            $UserOrder_  = User::where('id',$Order->idUser)->first();
            $OrderDetail = Store_order::where('id',$idOrder)->first(); 
            //return $OrderDetail->minimun_shop;

            $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
            return view('theme.components.administrator.comp_orders.editOrder', compact('dataOrders','Order','OrderDetail','ListProduct','UserOrder_','permisos_'));
        }
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
