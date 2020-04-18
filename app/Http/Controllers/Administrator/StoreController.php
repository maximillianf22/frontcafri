<?php

namespace App\Http\Controllers\Administrator;
use Illuminate\Support\Facades\DB;
use Hash, Auth, Mail, Session, Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Store\Store_products_list, App\Store\store_categorie;
use Illuminate\Contracts\Cookie\Factory, Cookie;
use App\Store\store_products_attribute, App\Store\Store_product;
use App\Store\Store_attributes_value,App\Store\Store_cupon, App\Store\store_ranges_hour;
use App\User;
use App\Store\Store_products_selection;
use App\Store\store_cupons_order, App\Store\view_list_categories;

class StoreController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $Category = store_categorie::where('idState',1)->get();
            $UndVenta = Store_attributes_value::where('idAttribute',1)->get();
            $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
            $litarCategorias_ = view_list_categories::All();
            // return $litarCategorias_;
           
            return view('theme.components.administrator.comp_store.create')->with([
                "Category" => $Category,
                "UndVenta" => $UndVenta,
                "permisos_" =>$permisos_,
                "litarCategorias_" => $litarCategorias_
            ]);
        }
    }

    public function editProduct($id){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            
            $UndVenta = Store_attributes_value::where('idAttribute',1)->get();
            $Products = Store_product::where('id',$id)->first();
            // return $Products;
            $Product_main = store_products_attribute::where('idProduct',$id)->where('parent',1)->first();
            // return  $Product_main ;
            // return $Product_main ;
            $Products_attr = store_products_attribute::where('idProduct',$id)->where('parent',2)->get();
             

            $litarCategorias_ = view_list_categories::All();
            // $litarCategorias_;

            if(!empty($Products)){
                $Category = store_categorie::where('idState',1)->get();
                $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
                return view('theme.components.administrator.comp_store.editProduct')
                ->with([
                    "Products" => $Products,
                    "Product_main" => $Product_main,
                    "Products_attr" => $Products_attr,
                    "Category" => $Category,
                    "UndVenta" => $UndVenta,
                    "permisos_" => $permisos_,
                    "litarCategorias_" => $litarCategorias_
                ]);

            }else{
                $Products = Store_products_list::select('*','priceProduct', DB::raw('count(*) as cnt_attributes'))->groupBy('idProduct')->orderBy('priceProduct','ASC')->get();
                return view('themes.administrator.mod-store.allProducts')
                ->with([
                    "Products" => $Products
                ]);
            }
        }else{
            
        }
    }

    public function listProducts(){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $Products = Store_products_selection::select('*',DB::raw('count(*) as cnt_attributes'))->groupBy('nameProduct')->orderBy('nameProduct','Asc')->get();

           // return $Products;

            
            $Store_categorie_ =  Store_products_selection::groupBy('nameCategorie')
            ->orderBy('nameCategorie','Asc')
            ->get(['nameCategorie','idCategorie','imageCategorie','slug_category']);

            $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
            $litarCategorias_ = view_list_categories::All();

            return view('theme.components.administrator.comp_store.listProducts')
            ->with([
                "Products" => $Products,
                "Store_categorie_" => $Store_categorie_,
                "permisos_" => $permisos_,
                "litarCategorias_" => $litarCategorias_
            ]);
        }
    }

    public function editAttribute($id){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $Products_attr = store_products_attribute::where('id',$id)->where('parent',2)->first();
            $UndVenta = Store_attributes_value::where('idAttribute',1)->get();
            
            return view('theme.components.administrator.comp_store.editAttrProduct')
            ->with([
                "Products_attr" => $Products_attr,
                "UndVenta" => $UndVenta,
            ]);
        }
    }

    public function addAttribute($id){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $UndVenta = Store_attributes_value::where('idAttribute',1)->get();
            return view('theme.components.administrator.comp_store.newAttrProduct')
            ->with([
                "idProducto" => $id,
                "UndVenta" => $UndVenta,
            ]);
        }
    }

   

    /*Actualizar Datos del producto*/
  
    public function updateImage(Request $request, $id){
        $this->validate($request, [ 
          'imagenProduct' => 'image|mimes:jpeg,png,jpg' 
        ]);

        if($request){
            $findProduct_ = Store_product::where('id',$id)->first();
            if(!empty($findProduct_)){
                $images_file = $request->file('imagenProduct');
                $newNameImage_ = date("YmdHis");

                if (!empty($images_file)){
                    $fechaAhora = date("YmdHis");
                    $num_al = rand(1, 10);
                    $avatarProduct_ = $request->file('imagenProduct');
                    $nameAvatar_ = $avatarProduct_->getClientOriginalName();
                    Storage::disk('upload')->delete('store/'.$nameAvatar_);
                    // $nameAvatar_ = 'item_'.$avatarProduct_->getClientOriginalName();

                    $nameAvatar_ = 'item_'.$newNameImage_ . "." . $avatarProduct_->getClientOriginalExtension(); 

                    Storage::disk('upload')->put('store/'.$nameAvatar_, \File::get($avatarProduct_),'public');
                }else{ $nameAvatar_='';}
                
                if(!empty($nameAvatar_)){
                    $findProduct_->imageProduct = $nameAvatar_;
                }
                if($findProduct_->update()){
                    return back();
                }
            }
        }
    }
    
    public function saveAttribute(Request $request, $id){
        if($request){
            
            /* Busco al attr principal de este producto */
            $findProductParent_ = store_products_attribute::where('id',$request->id_)
            ->where('parent',1) // estaba en 2 
            ->first();

            // if(!empty($findProductParent_)){
                $AddAttribute = new store_products_attribute;
                $AddAttribute ->idProduct = $request->id_;
                $AddAttribute ->nameAttribute = $request->cProductVar_;

                if(empty( $request->nAmount_per_saleVar_)){
                    $AddAttribute ->amount_per_sale = 0;
                }else{
                    $AddAttribute ->amount_per_sale = $request->nAmount_per_saleVar_;
                }
                $AddAttribute ->idSales_unit = $request->nidSales_unitVar_;
                $AddAttribute ->cntbyUnit = $request->cCntbyunitVar_;
                //$AddAttribute ->solo_publico = $request->onlyPublicVar_;
                $AddAttribute ->solo_publico = 1;

                $AddAttribute ->solo_comercio = $request->onlyComerceVar_;
                $AddAttribute ->priceProduct = $request->nPriceProductVar_;
                $AddAttribute ->previous_price = $request->nPriceProductPreviousVar_;
                $AddAttribute ->pricecomerceProduct = $request->nPriceComerceVar_;
                $AddAttribute ->previous_price_comerce = $request->nPriceComercePreviousVar_;
                $AddAttribute ->parent = 2;
                $AddAttribute ->idState = $request->cstateProduct_;

                $AddAttribute ->price_list_3 = $request->nPricelist3Var_;
                $AddAttribute ->price_list_4 = $request->nPricelist4Var_;
                $AddAttribute ->price_list_5 = $request->nPricelist5Var_;

                /*Asigo si esta en oferta */
                $isOffers_ =0;
                if($request->nPriceProductPreviousVar_>=1){
                    $isOffers_ =1;
                }
                if($request->nPriceComercePreviousVar_>=1){
                    $isOffers_ =1; 
                }


                $AddAttribute ->isOffers = $isOffers_;

                if($AddAttribute->save()){
                    return "Variación del Producto fue creada Correctamente";
                }else{
                    return "Error, En el momento la variacion del producto no pudo ser guardada, intente mas tarde";
                }
            /*
            }else{
                return "Error al crear variación, atributo no encontrado.";
            }
            */

        }else{ }
   }

    public function updateAttribute(Request $request, $id){
        if($request){
            /*Busco al attr principal de este producto */
            $findProductParent_ = store_products_attribute::where('id',$id)->where('parent',2)->first();
            if(!empty($findProductParent_)){
                
                $findProductParent_ ->nameAttribute = $request->cProductVar_;
                $findProductParent_ ->amount_per_sale = $request->nAmount_per_saleVar_;
                $findProductParent_ ->idSales_unit = $request->nidSales_unitVar_;
                $findProductParent_ ->cntbyUnit = $request->cCntbyunitVar_;
               //$findProductParent_ ->solo_publico = $request->onlyPublicVar_;
                $findProductParent_ ->solo_publico = 1;
                $findProductParent_ ->solo_comercio = $request->onlyComerceVar_;
                $findProductParent_ ->priceProduct = $request->nPriceProductVar_;
                $findProductParent_ ->previous_price = $request->nPriceProductPreviousVar_;
                $findProductParent_ ->pricecomerceProduct = $request->nPriceComerceVar_;
                $findProductParent_ ->previous_price_comerce = $request->nPriceComercePreviousVar_;
                $findProductParent_ ->parent = 2;
                $findProductParent_ ->idState = $request->cstateProduct_;

                $findProductParent_ ->price_list_3 = $request->nPricelist3Var_;
                $findProductParent_ ->price_list_4 = $request->nPricelist4Var_;
                $findProductParent_ ->price_list_5 = $request->nPricelist5Var_;

                $isOffers_ = 0 ;
                if($request->nPriceProductPreviousVar_>=1){
                    $findProductParent_ ->isOffers=1;
                }
                if($request->nPriceComercePreviousVar_>=1){
                    $findProductParent_ ->isOffers=1;
                }


                if($findProductParent_->update()){
                    return "Variación Actualizada Correctamente";
                }
            }
           
        }else{ }
   }

   /*----Crea los neuvos productos ----*/
   public function new(Request $request){
    
        if($request){
            // return $request;

            $newProduct = new Store_product;
            $newNameImage_ = date("YmdHis");

            $images_file = $request->file('imagenProduct');
            if (!empty($images_file)){
                $fechaAhora = date("YmdHis");
                $num_al = rand(1, 10);
                $avatarProduct_ = $request->file('imagenProduct');

                $nameAvatar_ = $avatarProduct_->getClientOriginalName(); 

                Storage::disk('upload')->delete('store/'.$nameAvatar_);
                //$nameAvatar_ = 'item_'.$avatarProduct_->getClientOriginalName();
                 $nameAvatar_ = 'item_'.$newNameImage_ . "." . $avatarProduct_->getClientOriginalExtension();

                Storage::disk('upload')->put('store/'.$nameAvatar_, \File::get($avatarProduct_),'public');
            }else{ $nameAvatar_='';}
            
            if(!empty($nameAvatar_)){
                $newProduct->imageProduct = $nameAvatar_;
            }

            
            $newProduct->nameProduct = $request->nameProduct;
            $newProduct->titleVariation = $request->titleVariation;
            $newProduct->description = $request->decriptionProduct;
            $newProduct->idCategorie = $request->Category_Product;
            $newProduct->idState = $request->stateProduct;
            $newProduct->isOffers = $request->inOffert;

            if($newProduct->save()){
                
                    $findProductParent_ = new store_products_attribute;
                    $findProductParent_ ->nameAttribute = $request->nameProduct;
                    $findProductParent_ ->amount_per_sale = $request->nAmount_per_sale;
                    $findProductParent_ ->idSales_unit = $request->Sales_unit;
                    $findProductParent_ ->cntbyUnit = $request->cCntbyunit;

                   
                    $findProductParent_ ->priceProduct = $request->nPriceProduct;
                    if($request->nPriceProduct>0){
                        $findProductParent_ ->solo_publico = 1;
                    }
                    $findProductParent_ ->previous_price = $request->nPriceProductPrevious;

                    $findProductParent_ ->pricecomerceProduct = $request->nPriceComerce;
                    if($request->nPriceComerce>0){
                        $findProductParent_ ->solo_comercio =1;
                    }
                    $findProductParent_ ->solo_publico = 1;

                    $findProductParent_ ->price_list_3 = $request->nPricelist3;
                    $findProductParent_ ->price_list_4 = $request->nPricelist4;
                    $findProductParent_ ->price_list_5 = $request->nPricelist5;

                    $findProductParent_ ->previous_price_comerce = $request->nPriceComercePrevious;

                    $findProductParent_ ->idProduct = $newProduct->id;
                    $findProductParent_ ->parent = 1;
                    $findProductParent_ ->idState = 1;

                    $isOffers_ = 0 ;
                    if($request->inOffert==1){
                        $findProductParent_ ->isOffers=1;
                    }else{
                        $findProductParent_ ->isOffers=0;
                    }
                    /*
                    if($request->nPriceComercePrevious>=1){
                        $findProductParent_ ->isOffers=1;
                    }
                    if($request->nPriceProductPrevious>=1){
                        $findProductParent_ ->isOffers=1;
                    }
                    */

                    if($findProductParent_->save()){
                        Session::flash('success', 'Se ha creado correctamente el producto');
                        return redirect()->route('admin.store.products');
                    }
            }
        }else{ }
    }

    public function update(Request $request, $id){
         if($request){

            $findProduct_ = Store_product::where('id',$id)->first();
            if(!empty($findProduct_)){
                
                $images_file = $request->file('imagenProduct');
                $newNameImage_ = date("YmdHis"); 

                if (!empty($images_file)){
                    $fechaAhora = date("YmdHis");
                    $num_al = rand(1, 10);
                    $avatarProduct_ = $request->file('imagenProduct');
                    $nameAvatar_ = $avatarProduct_->getClientOriginalName();
                    Storage::disk('upload')->delete('store/'.$nameAvatar_);
                    // $nameAvatar_ = 'item_'.$avatarProduct_->getClientOriginalName();
                    
                    $nameAvatar_ = 'item_'.$newNameImage_ . "." . $avatarProduct_->getClientOriginalExtension();

                    Storage::disk('upload')->put('store/'.$nameAvatar_, \File::get($avatarProduct_),'public');
                }else{ $nameAvatar_='';}
                
                if(!empty($nameAvatar_)){
                    $findProduct_->imageProduct = $nameAvatar_;
                }
                
                $findProduct_->nameProduct = $request->cProduct_;
                $findProduct_->titleVariation = $request->ctitleVariation_;
                $findProduct_->description = $request->cDescripcion_;
                $findProduct_->idCategorie = $request->nCategory_;
                $findProduct_->idState = $request->nState_;
                $findProduct_->isOffers =  $request->ninOffert_;

                $isOffers_ = $request->ninOffert_; 

                if($findProduct_->update()){
                    /*Busco al attr principal de este producto */
                    $findProductParent_ = store_products_attribute::where('idProduct',$id)->where('parent',1)->first();
                    if(!empty($findProductParent_)){
                        
                        $findProductParent_ ->nameAttribute = $request->cProduct_;
                        $findProductParent_ ->amount_per_sale = $request->nAmount_per_sale_;
                        $findProductParent_ ->idSales_unit = $request->nidSales_unit_;
                        $findProductParent_ ->cntbyUnit = $request->cCntbyunit_;
                        //$findProductParent_ ->solo_publico = $request->onlyPublic_;
                        $findProductParent_ ->solo_publico = 1;
                        $findProductParent_ ->solo_comercio = $request->onlyComerce_;

                        $findProductParent_ ->priceProduct = $request->nPriceProduct_;
                        $findProductParent_ ->previous_price = $request->nPriceProductPrevious_;
                        $findProductParent_ ->pricecomerceProduct = $request->nPriceComerce_;
                        $findProductParent_ ->previous_price_comerce = $request->nPriceComercePrevious_;

                        $findProductParent_ ->price_list_3 = $request->nPricelist3_;
                        $findProductParent_ ->price_list_4 = $request->nPricelist4_;
                        $findProductParent_ ->price_list_5 = $request->nPricelist5_;
                        
                        /*
                         if($request->ninOffert_===1){
                            $isOffers_ =1;
                         }else{
                            $isOffers_ =0;
                         } 
                         return $isOffers_;
                         */
                        $findProductParent_ ->isOffers = $isOffers_;
                        if($findProductParent_->update()){
                            return "Datos Actualización Correctamente.";
                        }

                    }else{

                    }
                }
            }else{
                return "Producto no Encontrado";
            }
         }else{ }
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**@brief Funcion  Permite Agregar nuevo productos a la tienda.
    @param $request array de la informacion contenida desde el form del producto a agregar
    @return Mensaje de confirmacion y/o no proceso de guardaro del producto.
    @note  none
    **/
    public function store(Request $request){

       // return $request;

        $fechaAhora = date("YmdHis");
        $num_al = rand(1, 10);
        $images_file = $request->file('imagenProduct');
        $newNameImage_ = date("YmdHis"); 

        if (!empty($images_file)){
            $avatarProduct_ = $request->file('imagenProduct');
            $nameAvatar_ = $avatarProduct_->getClientOriginalName();
            Storage::disk('upload')->delete('store/'.$nameAvatar_);
            // $nameAvatar_ = 'item_'.$avatarProduct_->getClientOriginalName();
            $nameAvatar_ = 'item_'.$newNameImage_ . "." . $avatarProduct_->getClientOriginalExtension(); 

            Storage::disk('upload')->put('store/'.$nameAvatar_, \File::get($avatarProduct_),'public');
        }else{ $nameAvatar_='no-image-product.png';}

        $newProduct = new Store_product;
            $newProduct->imageProduct = $nameAvatar_;
            $newProduct->nameProduct = $request->nameProduct;
            $newProduct->description = $request->decriptionProduct;
            $newProduct->idCategorie = $request->Category_Product;
            $newProduct->idState = $request->stateProduct;
            
        if ($newProduct->save()) {
            $AddAttribute = new store_products_attribute;
            $newProduct->imageAttribute = $nameAvatar_;
            $AddAttribute->idProduct = $newProduct->id;
            $AddAttribute->nameAttribute = $request->nameProduct;
            
            $AddAttribute->priceProduct = $request->Price;
            $AddAttribute->previous_price = $request->previous;
            
            if(empty($request->Price_commerce)){
                $AddAttribute->pricecomerceProduct = $request->Price;
            }else{
                $AddAttribute->pricecomerceProduct = $request->Price_commerce;
            } 

            $AddAttribute->previous_price_comerce = $request->previous_commerce;

            $AddAttribute->idSales_unit = $request->UnidadVenta;
            $AddAttribute->cntbyUnit = $request->cntbyUnit;
            $AddAttribute->inventory  = $request->Inventary;
            $AddAttribute->stockAttribute = $request->Stock;
            $AddAttribute->amount_per_sale = $request->AmmountSale;
            $AddAttribute->isOffers = $request->offers;
            $AddAttribute->idState = 1;

            $AddAttribute->solo_publico = ($request->only_publico=='on') ? 1 : 0;
            $AddAttribute->solo_comercio = ($request->only_comercio=='on')? 1 : 0;
            

            if($AddAttribute->save()){
                Session::flash('success', 'Se ha creado correctamente el producto');
                return redirect()->route('admin.store.products');
            }else{}

        }else{
            Session::flash('success', 'Se ha creado correctamente el producto');
            return  back();
        }
    }


    /*--- Proceso para renovar las imagenes cargadas actualmente ----*/
    public function renewImages(){
        // $images_ = Store_product::where('id',1666)->get();
        ini_set('max_execution_time', 0);
        set_time_limit(8000);
        ini_set('memory_limit', '-1');

        $images_ = Store_product::get();
        $name_ = "";
        if(!empty($images_)){
            $cambios_ = ""; 
            $nocambiado_ = "";
            foreach ($images_ as $file){
                $newNameImage_ ="";
                $newNameImage_ = date("His").'_'.rand(100,999).'_'.date('smiH').rand(100,999); 
                //rand(100,999).'-'.rand(10,99).''.rand(100,999);
                $nameOld_ =  $file->imageProduct;
                $extesionfile_ = explode('.',$file->imageProduct);
                $extesion_ = count($extesionfile_)-1;
                $nameNew_ = 'item_'.$newNameImage_ . "." . $extesionfile_[$extesion_]; 
                /*----*/
               
                $url = Storage::url($nameOld_); 
                $exists = Storage::disk('upload')->exists('store/'.$nameOld_); 
                /*----*/ 
                if($exists){
                   //   return $nameOld_;
                    
                    if($file->update()){ 
                        Storage::disk('upload')->rename( 'store/'.$nameOld_, 'store/'.$nameNew_) ;
                        $cambios_ = $cambios_." Anterior : ".$nameOld_." => ".$nameNew_." <br />";   
                        $nameNew_=""; 
                    } 
                }else{
                    $nocambiado_ = $nocambiado_.$nameOld_." <br />";
                }
                /*----*/
                //$nameNew_ = date("YmdHis").'_'.date('smiH'); 
            }
             return " Proceso Finalizado ::: <br /> Actualizados <br />".$cambios_."<br />--------<br />No Actualizados <br />".$nocambiado_;
        }
       
    }
    /*-----end processs -----*/

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
    
    public function loadItemCar(){

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**@brief Funcion  Permite Actaulizar los datos de mis productos
    @param $request array de la informacion contenida desde el form del producto a agregar
    @param $id  hace referencia al id del producto que se desea actualizar.
    @return Mensaje de confirmacion y/o no proceso de actualizacion del producto.
    @note  none
    **/
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){ }

   
    public function medidas(){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $Unidades = Store_attributes_value::where('idAttribute',1)->get();
            $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
            return view('theme.components.administrator.comp_unidadmedida.list',compact('Unidades','permisos_'));
        }
    }
    
     public function editmedidas($id){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $Unidades = Store_attributes_value::where('idAttribute',1)->where('id',$id)->first();
            $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
            return view('theme.components.administrator.comp_unidadmedida.edit')
            ->with([
                "Unidades" => $Unidades,
                "permisos_" => $permisos_
            ]); 
        }
    }

    public function createunidades(){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
           
            return view('theme.components.administrator.comp_unidadmedida.create',compact('permisos_'));
        }
    }

    public function storeunidades(Request $request){
        if($request){
            $NewUnidad_ = new Store_attributes_value;
            $NewUnidad_->idAttribute =1;
            $NewUnidad_->nameValue = $request->name;
            $NewUnidad_->extra = $request->description;
            $NewUnidad_->idState = $request->state;
            if ($NewUnidad_->save()) {
                return back();
            }
        }
    }

   
    public function updatemedidas(Request $request, $id){
        $foundUnidad = Store_attributes_value::where('idAttribute',1)->where('id',$id)->first();
        if(!empty($foundUnidad)){
            $foundUnidad->extra = $request->decription;
            $foundUnidad->idState = $request->state;
            if($foundUnidad->update()){ 
                // return back(); 
                return redirect()->route('admin.unidad.medidas');
            }
        } 
    }

    
    public function horasEntregas(){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $Hours = store_ranges_hour::whereIn('idState',[1,2])->get();
            $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
            return view('theme.components.administrator.comp_horasentrega.list',compact('Hours','permisos_'));
        }
    }

    public function cupons(){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            // $Cupons = Store_cupon::whereIn('idState',[1,2])->get();
            $Cupons = store_cupons_order::get();
            // dd($Cupons);
            /*
                select('*','priceProduct', DB::raw('count(*) as cnt_attributes'))->groupBy('idProduct')->orderBy('priceProduct','ASC')->get();
            */
            $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
            return view('theme.components.administrator.comp_cupons.list',compact('Cupons','permisos_'));
        }
    }
    public function editCupon(Request $request, $idCupon){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            
            $Cupons = Store_cupon::where('id',$idCupon)->first();
            $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
                return view('theme.components.administrator.comp_cupons.edit',compact('Cupons','permisos_'));
        }
    }
    public function editHora(Request $request, $idHour){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $Hours = store_ranges_hour::where('id',$idHour)->first();
            $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
            return view('theme.components.administrator.comp_horasentrega.edit',compact('Hours','permisos_'));
        }
    }

    public function createcupons(){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
           
            return view('theme.components.administrator.comp_cupons.create',compact('permisos_'));
        }
    }

    public function createHoras(){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
           
            return view('theme.components.administrator.comp_horasentrega.create',compact('permisos_'));
        }
    }
    public function storeHoras(Request $request){
        if($request){
            $NewHours_ = new store_ranges_hour;
            $NewHours_->range_initial = $request->hora_inicial;
            $NewHours_->range_final = $request->hora_final;
            $NewHours_->idState = $request->state;
            if ($NewHours_->save()) {
                $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
                return redirect()->route('admin.horas.entrega','permisos_');
            }
        }
    }
    public function storecupons(Request $request){
        if($request){
            if($request->minimo_compra<$request->cupon_value){
                Session::flash('warning', 'Valor minimo de la compra no puede ser menor al cupon');
                return redirect()->route('admin.cupons.create');
            }else{
                $NewCupon_ = new Store_cupon;
                $NewCupon_->code_cupon = $request->code_cupon;
                $NewCupon_->cupon_value = $request->cupon_value;
                $NewCupon_->user_limit = $request->user_limit;
                $NewCupon_->minimo_compra = $request->minimo_compra;
                $NewCupon_->idState = $request->state;
                if ($NewCupon_->save()) {
                    return redirect()->route('admin.cupons');
                }
            }
            
        }
    }

    public function validateCupon(Request $request){
        if($request){
            $findCupon_ = Store_cupon::where('code_cupon',$request->NewCode_)->first();
            if(!empty($findCupon_)){
               return "Y";
            }else{
                return "N";
            }
        }else{
            return "N";
        }
    }

    public function updateCupon(Request $request){
        if($request){
            $findCupon_ = Store_cupon::where('id',$request->idCupon)->first();
            if(!empty($findCupon_)){
                if($request->minimo_compra<$request->cupon_value){
                    Session::flash('warning', 'Valor minimo de la compra no puede ser menor al cupon');
                    return back();
                }else{
                    $findCupon_ ->cupon_value = $request->cupon_value;
                    $findCupon_ ->user_limit = $request->user_limit;
                    $findCupon_ ->minimo_compra = $request->minimo_compra;
                    $findCupon_ ->idState = $request->state;
                    if ($findCupon_->update()) {
                       // return redirect()->route('admin.cupons');
                       Session::flash('success', 'Datos del cupon actualizados correctamente');
                       return redirect()->route('admin.cupons');
                    }
                }
               
            }
        }else{
            return "";
        }
    }

    public function updateHora(Request $request){
        if($request){
            $findHour_ = store_ranges_hour::where('id',$request->idHour)->first();
            if(!empty($findHour_)){
                $findHour_ ->range_initial = $request->hora_inicial;
                $findHour_ ->range_final = $request->hora_final;
                $findHour_ ->idState = $request->state;
                if ($findHour_->update()) {
                   return redirect()->route('admin.horas.entrega');
                }
            }
        }else{
            return " ";
        }
    }

    
    

}
