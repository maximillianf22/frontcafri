<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Store\store_categorie;
use  App\Store\Store_products_selection;
use App\Store\view_listar_productos;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller{

    public function __construct(){
       // $this->middleware('client.credentials');
    }
    
    /*--- Lista las categorias actuales de la aplicacion ---*/
    public function getCategories(Request $request){
    /*
            $dataFnc =  Store_products_selection::
            groupBy('categoria_main')->orderBy('order_category','Asc')->get(['categoria_main as nameCategorie', 'idCategorie as idCategorie','imagen_main as imageCategorie', 'slug_main as slug_category'  ]); 
            */

            $dataFnc =  Store_products_selection::where('visible_publico', $request->type_client_)
            ->where('idState',1)
            ->groupBy('categoria_main')
            ->orderBy('order_category','Asc')
            ->get(['categoria_main as nameCategorie', 'idCategorie as idCategorie','imagen_main as imageCategorie', 'slug_main as slug_category','idState']);
             //return $Store_categorie_ ;
           
            foreach ($dataFnc as $Store_categorie) {
               $row_ = view_listar_productos::select( DB::raw('count(*) as cnt_rows'))
               ->where('idCategorie',$Store_categorie->idCategorie)->first(['cnt_rows']); 
                $Store_categorie->productos =$row_->cnt_rows; 
            } 


        if(count($dataFnc)>=1){
            
            $data = Array("code" => 200, "data" => $dataFnc, "message" => "La solicitud ha tenido éxito");
            return json_encode($data); 

        }else{
            $data = Array("code" => 404, "data" => $dataFnc, "message" => "Resultado de la Busqueda vacia");
            return json_encode($data);
        } 
    }

    public function getsubCategories(Request $request){ 
        if(!empty($request->slug_main)){
            if(!empty($request->type_client)){
                $dataFnc =  Store_products_selection::where('visible_publico',$request->type_client)->where('slug_main',$request->slug_main)->where('idState',1)->groupBy('nameCategorie')->orderBy('nameCategorie','Asc')->get(['nameCategorie','idCategorie','imageCategorie','slug_category','categoria_main','slug_main','slug_category as slug_subcategoria']);

                if(count($dataFnc)>=1){
                    
                    $data = Array("code" => 200, "data" => $dataFnc, "message" => "La solicitud ha tenido éxito");
                    return json_encode($data); 

                }else{
                    $data = Array("code" => 404, "data" => $dataFnc, "message" => "Resultado de la Busqueda vacia");
                    return json_encode($data);
                } 
            }else{
                 $data = Array("code" => 404, "data" => [], "message" => "Debe especificar El tipo de cliente ");
                return json_encode($data); 
            } 
        }else{
            $data = Array("code" => 404, "data" => [], "message" => "Debe especificar la categoria principal");
            return json_encode($data);
        } 

    }
    /*------------------------------------------------------*/


    
    public function index(Request $request){
         $email = $request->email;
         $user = User::select('idUsuario','nombre','apellido','userName','email','idPerfil','idTipoDocumento','numeroDocumento','telefono','celular','idPais','idDepartamento','idPerfilPadre','fotoPerfil')->where('email',$email)->where('idPerfil','3')->first();
         return response()->json($user, 200);
    }
 
    public function obtenerUseByNickname(Request $request)
    {
 
         $nickname = $request->nickname;
 
         $user = User::select('idUsuario','nombre','apellido','userName','email','idPerfil','idTipoDocumento','numeroDocumento','telefono','celular','idPais','idDepartamento','idPerfilPadre','fotoPerfil')->where('userName',$nickname)->where('active','1')->where('idPerfil','3')->first();
 
         if (!empty($user)) {
            //Lo que vas hacer si existe
            return response()->json($user, 200);
 
         }else{
            //Lo que no vas hacer si NO existe
            return response()->json(["message"=>"No se encontro el usuario"], 404);
         }
 
    }

}
