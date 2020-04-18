<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Store\store_categorie,App\Store\store_subcategories,App\Config\Gestor_plantillas,App\Store\Store_products_list;
use Illuminate\Contracts\Cookie\Factory,  Cookie;
use Hash, Auth, Mail, Session, Redirect;
use App\User,App\Store\Store_order,App\Store\Store_orders_detail;
use Illuminate\Support\Str; 

class CategoriesController extends Controller{ 

    /**@brief Funcion  Permite mostrar el listado de todas las categorias de productos en la tienda
    @param ninguno
    @return Listado de las Categorias
    @note  none
    **/

    
    
    public function index(){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $dataCategory = store_categorie::orderBy('idOrdercategory','Asc')->get();
            $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
            return view('theme.components.administrator.comp_categories.list',compact('dataCategory','permisos_'));
        }
    }

    /*----*/
    public function subcategories(){
         $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $dataSubCategory = store_subcategories::orderBy('id','Asc')->get(); 
            //return $dataSubCategory;
            foreach ($dataSubCategory as  $value) {
                $fcn_ = store_categorie::where('id',$value->idCategoriemain)->first();
                if(!empty($fcn_)){
                    $value["nombre_categoria"] = $fcn_->nameCategorie;
                }else{
                    $value["nombre_categoria"] = "";
                } 
            }
             
            $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
            return view('theme.components.administrator.comp_categories.subcategories',compact('dataSubCategory','permisos_'));
            
        }
    }

   /**@brief Funcion create , permite realizar la creacion de las nuevas categorias de la tienda.
    @param $request : contiene toda la informacion de los datos de la categoria que se va ha crear en la tienda. 
    @return Formulario con los campos relacionados de la categoria que se va ha crear.
    @note  none
    **/
    public function create(){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $dataCategory = store_categorie::paginate(15);
            $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
           
            return view('theme.components.administrator.comp_categories.create',compact('dataCategory','permisos_'));
        }
        
    }

    public function subcategoriecreate(){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){

            $dataSubCategory = store_subcategories::paginate(15);
            $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
            $dataCategory = store_categorie::orderBy('idOrdercategory','Asc')->get();
           
            return view('theme.components.administrator.comp_categories.subcategoriecreate',compact('dataSubCategory','dataCategory','permisos_'));
        }
        
    }

  
    /**@brief Funcion store , permite realizar la creacion de las nuevas categorias de la tienda.
    @param $request : contiene toda la informacion de los datos de la categoria que se va ha crear en la tienda. 
    @return Formulario con los campos relacionados de la categoria que se va ha crear.
    @note  none
    **/
    public function store(Request $request){ 
        $images_file = $request->file('imagenCategorie');
        if (!empty($images_file)){
            $fechaAhora = date("YmdHis");
            $num_al = rand(1, 10);
            $avatarProduct_ = $request->file('imagenCategorie');
            $nameAvatar_ = $avatarProduct_->getClientOriginalName();
            Storage::disk('upload')->delete('store/'.$nameAvatar_);
            $nameAvatar_ = 'item_'.$avatarProduct_->getClientOriginalName();
            Storage::disk('upload')->put('store/'.$nameAvatar_, \File::get($avatarProduct_),'public');
        }else{ $nameAvatar_='no-image-product.png'; } 
        
        $findCategorie_ = new store_categorie;

        if(!empty($nameAvatar_)){
            $findCategorie_->imageCategorie = $nameAvatar_;
        }
        
        /*------*/
        $slug = $request->name;
        $replace = array(" ", ",", ".", "\"", "á", "é", "í", "ó", "ú", "/",")","(");
        $newCaracteres = array("-", "", "", "", "a", "e", "i", "o", "u", "","-","-");
        $slug = str_replace($replace, $newCaracteres, $slug);
        /*------*/

        $findCategorie_->nameCategorie = $request->name;
        $findCategorie_->slug = Str::lower($slug);
        $findCategorie_->description = $request->decription;
        $findCategorie_->idState = $request->state;
        if($findCategorie_->save()){
            Session::flash('success', 'Se ha creado correctamente la categoria');
            return redirect()->route('admin.category');
        }else{ return back(); }
    }


    /*-----------------------------------------------------*/
    public function subcategoriestore(Request $request){ 
        $images_file = $request->file('imagenCategorie');
        if (!empty($images_file)){
            $fechaAhora = date("YmdHis");
            $num_al = rand(1, 10);
            $avatarProduct_ = $request->file('imagenCategorie');
            $nameAvatar_ = $avatarProduct_->getClientOriginalName();
            Storage::disk('upload')->delete('store/'.$nameAvatar_);
            $nameAvatar_ = 'item_'.$avatarProduct_->getClientOriginalName();
            Storage::disk('upload')->put('store/'.$nameAvatar_, \File::get($avatarProduct_),'public');
        }else{ $nameAvatar_='no-image-product.png'; } 
        
        $findCategorie_ = new store_subcategories;

        if(!empty($nameAvatar_)){
            $findCategorie_->imageCategorie = $nameAvatar_;
        }
        
        /*------*/
        $slug = $request->name;
        $replace = array(" ", ",", ".", "\"", "á", "é", "í", "ó", "ú", "/",")","(");
        $newCaracteres = array("-", "", "", "", "a", "e", "i", "o", "u", "","-","-");
        $slug = str_replace($replace, $newCaracteres, $slug);
        /*------*/

        $findCategorie_->nameCategorie = $request->name;
        $findCategorie_->slug = Str::lower($slug);
        $findCategorie_->idCategoriemain = $request->categoriemain;
        $findCategorie_->description = $request->decription;
        $findCategorie_->idState = $request->state;
        if($findCategorie_->save()){
            Session::flash('success', 'Se ha creado correctamente la Subcategoria');
            return redirect()->route('admin.subcategory');
        }else{ return back(); }
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

    /**@brief Funcion Edit permite editar el detalle de ua categoria seleccionada
    @param $id : hace referencia del id de la categoria que se desea modificar/actualizar la información
    @return formulario de actualizacion de los datos.
    @note  
    **/
    public function edit($id){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $Category_ = store_categorie::where('id',$id)->first();
            $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
            return view('theme.components.administrator.comp_categories.edit')
            ->with([
                "Category_" => $Category_,
                "permisos_" =>$permisos_
            ]);
        }
    }

    /*-----------------------------------------------------------------------------------*/
    public function subcategorieedit($id){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $Category_ = store_subcategories::where('id',$id)->first();
            $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
            $dataCategory = store_categorie::orderBy('idOrdercategory','Asc')->get();
            // return $dataCategory;
            return view('theme.components.administrator.comp_categories.subcategorieedit')
            ->with([
                "Category_" => $Category_,
                "permisos_" =>$permisos_,
                "dataCategory" => $dataCategory
            ]);
        }
    }
    
    /*-------------------------------------------------------------------------------------*/
    public function editOrder(Request $request,$idCategorie){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){

            if($request->tipo=="D"){
                $findCategory_ = store_categorie::where('id',$idCategorie)->first();
                if(!empty($findCategory_)){

                        $OrderActua_ = $findCategory_->idOrdercategory;
                        $nextCategory_ = store_categorie::where('idOrdercategory',($OrderActua_+1))->first();
                        $nextId_= $nextCategory_->id;
                        $nextvalueId_= $nextCategory_->idOrdercategory;

                        $findCategory_->idOrdercategory = $OrderActua_+1;
                        
                        if($findCategory_->update()){
                            
                            DB::table('store_categories')
                                ->where('id',$nextId_)
                                ->update(array('idOrdercategory' => ($nextvalueId_-1) ));
                                
                            return $findCategory_->idOrdercategory;
                            
                        }else{
                        }
                        
                }else{
                }
            }

            if($request->tipo=="T"){

                $findCategory_ = store_categorie::where('id',$idCategorie)->first();
                if(!empty($findCategory_)){

                        $OrderActua_ = $findCategory_->idOrdercategory;
                        $nextCategory_ =store_categorie::where('idOrdercategory',($OrderActua_-1))->first();
                        // return $nextCategory_;
                        $nextId_= $nextCategory_->id;
                        $nextvalueId_= $nextCategory_->idOrdercategory;

                        $findCategory_->idOrdercategory = $OrderActua_-1;
                        
                        if($findCategory_->update()){
                            
                            DB::table('store_categories')
                                ->where('id',$nextId_)
                                ->update(array('idOrdercategory' => ($nextvalueId_+1) ));
                                
                            return $findCategory_->idOrdercategory;
                            
                        }else{
                        }
                        
                }else{
                }

            }
           
        }
    }

  
    /**@brief Funcion Update permite actualizar el detalle de ua categoria seleccionada
    @param $request : detalla de todos los campos del formulario de categorias que se van ha actualizar
    @param $id : hace referencia del id de la categoria que se desea modificar/actualizar la información
    @return formulario de actualizacion de los datos.
    @note  
    **/
    public function update(Request $request, $id){
        $findCategorie_ = store_categorie::where('id',$id)->first();
        if(!empty($findCategorie_)){
            $images_file = $request->file('imagenCategorie');
            if (!empty($images_file)){
                $fechaAhora = date("YmdHis");
                $num_al = rand(1, 10);
                $avatarProduct_ = $request->file('imagenCategorie');
                $nameAvatar_ = $avatarProduct_->getClientOriginalName();
                Storage::disk('upload')->delete('store/'.$nameAvatar_);
                $nameAvatar_ = 'item_'.$avatarProduct_->getClientOriginalName();
                Storage::disk('upload')->put('store/'.$nameAvatar_, \File::get($avatarProduct_),'public');
            }else{ $nameAvatar_='';}

            if(!empty($nameAvatar_)){
                $findCategorie_->imageCategorie = $nameAvatar_;
            }
            
            $findCategorie_->nameCategorie = $request->name;
            $findCategorie_->description = $request->decription;
            $findCategorie_->idState = $request->state;
            if($findCategorie_->update()){
                Session::flash('success', 'Se ha actualizado correctamente la categoria');
                return redirect()->route('admin.category');
            }else{ return "Error al actualizar la Subcategoria"; }
        }else{ }
    }

    /*----Actualiza la subcategoria ---*/
    public function subcategorieupdate(Request $request, $id){
        $findCategorie_ = store_subcategories::where('id',$id)->first();
        if(!empty($findCategorie_)){
            
            $images_file = $request->file('imagenCategorie');
            if (!empty($images_file)){
                $fechaAhora = date("YmdHis");
                $num_al = rand(1, 10);
                $avatarProduct_ = $request->file('imagenCategorie');
                $nameAvatar_ = $avatarProduct_->getClientOriginalName();
                Storage::disk('upload')->delete('store/'.$nameAvatar_);
                $nameAvatar_ = 'item_'.$avatarProduct_->getClientOriginalName();
                Storage::disk('upload')->put('store/'.$nameAvatar_, \File::get($avatarProduct_),'public');
            }else{ $nameAvatar_='';}

            if(!empty($nameAvatar_)){
                $findCategorie_->imageCategorie = $nameAvatar_;
            }
            
           /*------*/
            $slug = $request->name;
            $replace = array(" ", ",", ".", "\"", "á", "é", "í", "ó", "ú", "/",")","(");
            $newCaracteres = array("-", "", "", "", "a", "e", "i", "o", "u", "","-","-");
            $slug = str_replace($replace, $newCaracteres, $slug);

            $findCategorie_->nameCategorie = $request->name;
            $findCategorie_->idCategoriemain = $request->categoriemain;
            $findCategorie_->description = $request->decription;
            $findCategorie_->idState = $request->state;
            $findCategorie_->slug = Str::lower($slug); 

            if($findCategorie_->update()){
                Session::flash('success', 'Se ha actualizado correctamente la Subcategoria');
                return redirect()->route('admin.subcategory');
            }else{ return "Error al actualizar la subcategoria"; }
        }else{ }
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
