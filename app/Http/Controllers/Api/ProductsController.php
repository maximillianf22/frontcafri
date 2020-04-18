<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Store\Store_products_list,  App\Store\Store_products_selection;;

class ProductsController extends Controller{
    
    /*--- Lista General de todos los productos ---*/
    public function getProducts(Request $request){
        $dataProductsFnc= Store_products_list::where('idState',1)->get();
        if(count($dataProductsFnc)>=1){
            $data = Array("code" => 200, "data" => $dataProductsFnc, "message" => "La solicitud ha tenido éxito");
            return json_encode($data);
        }else{
            $data = Array("code" => 404, "data" => $dataProductsFnc, "message" => "Resultado de la Busqueda vacia");
            return json_encode($data);
        }
    }
  
    /*--- Lista General de todos los productos en Ofertas---*/
    public function getProductsOffers(Request $request){
        
        $dataProductsFnc = Store_products_selection::where('isOffers',1)->where('visible_publico',$request->tipo_cliente)->groupBy('nameProduct')->get();
        if(count($dataProductsFnc)>=1){
            $data = Array("code" => 200, "data" => $dataProductsFnc, "message" => "La solicitud ha tenido éxito");
            return json_encode($data);
        }else{
            $data = Array("code" => 404, "data" => $dataProductsFnc, "message" => "Resultado Productos de la Busqueda vacia");
            return json_encode($data);
        }
    }


    public function getProductsbyCategories(Request $request){
        if(!empty($request->idCategorie)){
            
            $dataProductsFnc = Store_products_selection::where('visible_publico',$request->tipo_cliente)->where('idCategorie',$request->idCategorie)->where('idState',1)->groupBy('nameProduct')->orderBy('nameProduct','Asc')->get();
            /*---
                $dataProductsFnc = Store_products_selection::where('visible_publico',$request->tipo_cliente)->where('idCategorie',$request->idCategorie)->groupBy('nameProduct')->get();
            ---*/
            if(count($dataProductsFnc)>=1){
                $data = Array("code" => 200, "data" => $dataProductsFnc, "message" => "La solicitud ha tenido éxito");
                return json_encode($data);
            }else{
                $data = Array("code" => 404, "data" => $dataProductsFnc, "message" => "Resultado de la Busqueda vacia");
                
            }
        }else{
            $data = Array("code" => 404, "data" => [], "message" => "Debe especificar una Categoria de filtro");
        }
        return json_encode($data);
    }

    /*--- productos por subcategorias ----*/
    public function getProductsbysubCategories(Request $request){
        if(!empty($request->tipo_cliente)){
            if(!empty($request->slug_main)){
                if(!empty($request->slug_category)){

                    $dataProductsFnc = Store_products_selection::where('visible_publico',$request->tipo_cliente)
                    ->where('slug_main',$request->slug_main)
                    ->where('slug_category',$request->slug_category)
                    ->where('idState',1)
                    ->groupBy('nameProduct')
                    ->orderBy('nameProduct','Asc')->get(); 

                    if(count($dataProductsFnc)>=1){
                        $data = Array("code" => 200, "data" => $dataProductsFnc, "message" => "La solicitud ha tenido éxito");
                        return json_encode($data);
                    }else{
                        $data = Array("code" => 404, "data" => $dataProductsFnc, "message" => "Resultado de la Busqueda vacia"); 
                    }

                }else{
                     $data = Array("code" => 404, "data" => [], "message" => "Debe especificar la subcategoria");
                } 
            }else{
                $data = Array("code" => 404, "data" => [], "message" => "Debe especificar la categoria principal");
            }
            /*
            $dataProductsFnc = Store_products_selection::where('visible_publico',$request->tipo_cliente)->where('idCategorie',$request->idCategorie)->where('idState',1)->groupBy('nameProduct')->orderBy('nameProduct','Asc')->get();
            */

             
        }else{
            $data = Array("code" => 404, "data" => [], "message" => "Debe especificar el tipo de cliente");
        }
        return json_encode($data);
    }



    public function getProductsbyId(Request $request){
        if(!empty($request->idProduct)){
            $tipo_filtro_ = $request->tipoClient;
            $dataProductsFnc = Store_products_selection::where('visible_publico',$tipo_filtro_)->where('id',$request->idProduct)->groupBy('nameProduct')->orderBy('nameProduct','Asc')->first();
            $VariacionesProduct = Store_products_selection::where('visible_publico',$tipo_filtro_)->where('id',$request->idProduct)->orderBy('nameProduct','Asc')->get(['id_attribute','nombre_variacion','slugAttribute','price', 'price as price_base','previous_price','unidad_venta','isOffers','amount_per_sale','amount_per_sale as amount_per_sale_base']);
            $dataProductsFnc->Variaciones = $VariacionesProduct;
            if(!empty($dataProductsFnc)){
                $data = Array("code" => 200, "data" => $dataProductsFnc, "message" => "La solicitud ha tenido éxito");
                return json_encode($data);
            }else{
                $data = Array("code" => 404, "data" => $dataProductsFnc, "message" => "Resultado de la Busqueda vacia.");
            }
        }else{
            $data = Array("code" => 404, "data" => [], "message" => "Debe especificar una Categoria de filtro");
        }
        return json_encode($data);
    }


    /* Buscador de productos en la app */
    public function searchProducts(Request $request){

        if(!empty($request->search)){
            
            if($request->client_type==='P'){
                $products = Store_products_list::where('solo_publico',1)
                ->where('nameProduct', 'LIKE', '%'.$request->search.'%')->get();
            }
            
            if($request->client_type==='C'){
                $products = Store_products_list::where('solo_comercio',1)
                ->where('nameProduct', 'LIKE', '%'.$request->search.'%')->get();
            } 

            if (count($products) > 0) {
                $data = Array("code" => 200, "data" => $products, "message" => "La solicitud ha tenido éxito");
            }else{
                $data = Array("code" => 404, "data" => [], "message" => "No se encontro productos con:".$request->search);
            }
        }else{
            $data = Array("code" => 401, "data" => [], "message" => "Debe especificar un nombre para buscar un producto");
        }

        return json_encode($data);
    }

}
