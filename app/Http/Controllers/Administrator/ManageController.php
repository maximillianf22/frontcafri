<?php
namespace App\Http\Controllers\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Hash, Auth, Mail, Session, Redirect;
use App\User, App\Store\view_listar_productos,App\Store\store_categorie,App\Store\Store_attributes_value;
use App\Store\store_products_attribute, App\Store\Store_product, App\Store\Store_products_selection;
use App\Store\view_list_categories;

class ManageController extends Controller{

	/*--- LIstado de todos los productos ---*/
	public function listProducts(){
		$response_ = json_decode($this->configuration());
        if($response_->codeState==200){ 

            /*---
            $listCategories_ =view_listar_productos::
            select('*',DB::raw('count(*) as cnt_rows'))->where('parent',1)
            ->groupBy('nameCategorie')
            ->orderBy('nameCategorie')
            ->get(['idCategorie','nameCategorie','cnt_rows']);
            ---*/

            $litarCategorias_ = view_list_categories::All();

            $ProductsList_ = view_listar_productos::where('parent',1)
        	->orderBy('nameAttribute','Asc')
        	->get(); 
            
            /*------
            $Store_categorie_ =  Store_products_selection::groupBy('nameCategorie')->orderBy('nameCategorie','Asc')->get(['nameCategorie','idCategorie','imageCategorie','slug_category']);
            ------*/

            $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);

            return view('theme.components.administrator.comp_manage.listProducts')
            ->with([
            	"ProductsList_" => $ProductsList_, 
                "permisos_" => $permisos_,
                "litarCategorias_" => $litarCategorias_
            ]);
        }
	}

    /*----------*/
    public function filterProducts(Request $request){
        /*
        	$ProductsFilter = view_listar_productos::where('nameProduct','like','%'.$request->DataSearch.'%')
        	->orWhere('nameCategorie','like','%'.$request->DataSearch.'%')
        	->orWhere('name_state','like','%'.$request->DataSearch.'%')
        	->where('parent',1)
        	->orderBy('nameProduct','Asc')
        	->get();
        */
        if($request->Datacategoria>0){
            if(!empty($request->DataSearch)){
                $ProductsFilter=view_listar_productos::where('nameProduct','like','%'.$request->DataSearch.'%')
                ->where('idCategorie',$request->Datacategoria)
                ->where('parent',1)
                ->orderBy('nameProduct','Asc')
                ->get(); 
            }else{
                $ProductsFilter=view_listar_productos::where('idCategorie',$request->Datacategoria)
                ->where('parent',1)
                ->orderBy('nameProduct','Asc')
                ->get();  
            } 
        }else{
            if(!empty($request->DataSearch)){
                $ProductsFilter=view_listar_productos::where('nameProduct','like','%'.$request->DataSearch.'%')
                ->where('parent',1)
                ->orderBy('nameProduct','Asc')
                ->get(); 
            }else{
                $ProductsFilter=view_listar_productos::where('parent',1)
                ->orderBy('nameProduct','Asc')
                ->get();
            }
        } 
        
        return view('theme.components.administrator.comp_manage.filter')
		->with([
			"ProductsFilter" => $ProductsFilter
		]);
    }

    /*----------*/
    public function add_favoriteproduct(Request $request){
    	$findProduct_ = store_products_attribute::where('id',$request->product)->first();
    	if($findProduct_){
    		$findProduct_->isOffers = $request->action;
    		if($findProduct_->update()){
    			return "Y";
    		}else{ return "N"; }
    	}else{ return "N"; }
    }

    /*-----------*/
    public function view_ItemProduct(Request $request){

    	$Products = Store_product::where('id',$request->idProduct)->first();
    	$Category = store_categorie::where('idState',1)->get();
    	$UndVenta = Store_attributes_value::where('idAttribute',1)->get();
    	$Product_main = store_products_attribute::where('idProduct',$request->idProduct)->where('parent',1)->first();
        $litarCategorias_ = view_list_categories::All();
           
    	return view('theme.components.administrator.comp_manage.view_product')
		->with([
			"Products" => $Products,
			"Category" => $Category,
			"UndVenta" => $UndVenta,
			"Product_main" => $Product_main,
            "litarCategorias_" => $litarCategorias_
		]);
    }

    public function show_hide_product(Request $request){
    	$findProduct_ = store_products_attribute::where('id',$request->product)->first();
    	if($findProduct_){
    		if($request->destino==="P"){
    			$findProduct_->solo_publico = $request->action;
    		}
    		if($request->destino==="C"){
    			$findProduct_->solo_comercio = $request->action;
    		}
    		if($findProduct_->update()){
    			//return "Actualizado ".$request->destino." : ".$request->action;
    			return "Update";
    		}else{
    			return "NoUpdate";
    		}
    	}else{

    	} 
    } 

    public function upd_price_product(Request $request){
    	$findProduct_ = store_products_attribute::where('id',$request->product)->first();
    	//dd($findProduct_);
    	if($findProduct_){
    		if($request->action=="P"){
    			$findProduct_->priceProduct =$request->price;
    		}else{
    			$findProduct_->pricecomerceProduct =$request->price;
    		}
    		if($findProduct_->update()){ return "Y";
    		}else{ return "N"; }
    	}else{ }
    }

    public function upd_state_product(Request $request){
    	$findProduct_ = store_products_attribute::where('id',$request->product)->first();
    	//dd($findProduct_);
    	if($findProduct_){
    		if($request->state==1){
    			$findProduct_->idState = 2;
    		}else{
    			$findProduct_->idState = 1;
    		}
    		if($findProduct_->update()){
    			return "Y";
    		}else{
    			return "N";
    		}
    	}else{

    	} 
    }

    public function detailProduct(Request $request){
    	$product = view_listar_productos::where('id_product',$request->product)->first();
        $Category = store_categorie::where('idState',1)->get();
    	$UndVenta = Store_attributes_value::where('idAttribute',1)->get(['id','idAttribute','nameValue','extra','idState']);
        $litarCategorias_ = view_list_categories::All();
 
    	return view('theme.components.administrator.comp_manage.detailProduct')
		->with([ 
			"product"  => $product,
			"Category" => $Category,
			"UndVenta" => $UndVenta,
            "litarCategorias_" => $litarCategorias_
		]);
    }

    
    public function variationsProducts(Request $request){
        $Variants = view_listar_productos::where('product_parent',$request->product)
        ->where('parent',2)->get();
        //dd($Variants);
        if( $Variants ){
           return view('theme.components.administrator.comp_manage.variantsProduct')
            ->with([ 
                "Variants"  => $Variants
            ]); 
        }else{
            return "Este Producto no tiene variacionrd aun creadas";
        }
    }

    /*--- Update / Save Information Products ---*/
    public function updsaveProduct(Request $request){
        
        /*
        $file_ = $request->file('fileLoadImg');
        return $file_; 
        */
         //return $request->idProduct." --- valor ";
       
    	if(!empty($request->idProduct)){
    		$findProduc_ = store_products_attribute::where('id',$request->idProduct)->first();
    		if($findProduc_){

    			$findProduc_->nameAttribute = $request->cnameProduct;
                $findProduc_->idState = $request->stateProduct; 
                $findProduc_->titleVariation = $request->ctitleVariation;
                $findProduc_->amount_per_sale = $request->namount_per_sale;
                $findProduc_->cntbyUnit = $request->ncntbyUnit; 
                $findProduc_->idSales_unit = $request->nidSales_unit;
                $findProduc_->isOffers = $request->nisOffers;

                if($request->show_public==="on") { $findProduc_->solo_publico = 1;}
                else{  $findProduc_->solo_publico = 0; }

                if($request->show_comerce==="on"){ $findProduc_->solo_comercio = 1;}
                else{ $findProduc_->solo_comercio = 0; }

                $findProduc_->priceProduct = $request->npriceProduct; 
                $findProduc_->pricecomerceProduct = $request->npricecomerceProduct;

                $findProduc_->previous_price = $request->nprevious_price; 
                $findProduc_->previous_price_comerce = $request->nprevious_price_comerce; 
 
    			if($request->caction=="update"){
    				if($findProduc_->update()){
    					$finBaseProduct_ = Store_product::where('id',$findProduc_->idProduct)->first();
    					if(!empty($finBaseProduct_)){

                            $finBaseProduct_->idState = $request->stateProduct;
                            $finBaseProduct_->nameProduct = $request->cnameProduct;
                            $finBaseProduct_->idCategorie = $request->cCategory_Product;
                            $finBaseProduct_->titleVariation = $request->ctitleVariation;

                            if($request->file('fileLoadImg')){
                                $file_ = $request->file('fileLoadImg');
                                $nameImage = $file_->getClientOriginalName();
                                $finBaseProduct_->imageProduct = $nameImage;
                                Storage::disk('upload')->put('store/'.$nameImage,\File::get($file_),'public'); 
                            }
                           
    						if($finBaseProduct_->update()){ 
    							return "True"; 
    						}else{
    							return "Datos no pudieron ser actualizado en su totalidad, porfavor intentelo master tarde";
    						}
    					}else{
    						return "Datos del producto (".$findProduc_->idProduct.") ha presenta algun inconveniente para actualizar, favor intentar mas tarde";
    					}
    				}else{ return "Datos no puedieron ser actualizado en el momento, porfavor intentelo master tarde"; }
    			} 
    			if($request->action=="save"){

    			} 
    		}else{ return "False "; }
    	}else{ return "False 2 ".$request->data['nameProduct']; }
    }


    
}
