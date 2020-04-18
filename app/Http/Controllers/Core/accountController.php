<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Config\Gestor_plantillas, App\Config\Configuracion_valor,App\Store\store_categorie;
use Hash, Auth, Mail, Session, Redirect;
use App\User, App\UserAddress;
use App\Core\core_template_manager, App\Store\Store_products_selection;

class accountController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* Busca el tema por defecto de la plantilla */
    public function DefaultTheme_ (){
        //$ViewDefault_ = Gestor_plantillas::where('idState',1)->where('principal',1)->first();
        $ViewDefault_ = core_template_manager::where('idState',1)->where('main',1)->first();
        return $ViewDefault_;
    }

    public function index(){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $UserAccount_ = User::where('id',Auth::user()->id)->first();
            if(!empty($UserAccount_)){
                
                if(!empty($_COOKIE['_gid'])){
                    $type_client_= $_COOKIE['_gid'];
                }else{  $type_client_= 'P';  }

                if(!empty($this->DefaultTheme_()->nameDirectory)){
                    if(view()->exists('theme.components.core.comp_profile.account')){
                        //$ConfigTheme_ = Gestor_plantillas::where('idState',1)->where('principal',1)->first();
                        $ConfigTheme_ = core_template_manager::where('idState',1)->where('main',1)->first();

                          $Store_categorie_menu =  Store_products_selection::where('visible_publico', $type_client_)
                ->where('idState',1)
                ->groupBy('categoria_main')
                ->orderBy('order_category','Asc')
                ->get(['categoria_main','nameCategorie','idCategorie','imagen_main','imageCategorie','slug_main','slug_category','idState']);


                        $Store_categorie_ =  Store_products_selection::groupBy('nameCategorie')->orderBy('nameCategorie','Asc')->get(['nameCategorie','idCategorie','imageCategorie','slug_category']);
                        return view('theme.components.core.comp_profile.account')
                        ->with([
                            "Config_" => $ConfigTheme_,
                            "UserAccount_"=>User::where('id',Auth::user()->id)->first(),
                            "Store_categorie_" =>$Store_categorie_,
                            "Store_categorie_menu" => $Store_categorie_menu
                        ]);
                    }else{
                        $Name_ ="Account Directory or File Index  "; $Msg_=" does not exist  ";
                        return view("errors.templatenotfound",compact('Name_','Msg_'));
                    }
                }else{
                    $Name_ =" Theme  "; $Msg_=" does not exist  ";
                    return view("errors.templatenotfound",compact('Name_','Msg_'));
                }    
            }else{
                $Name_ ="Form Account "; $Msg_=" : Error En la consulta del usuario  ";
                return view("errors.templatenotfound",compact('Name_','Msg_'));
            }
        }else{

        }
    }
    public function addresses(){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){

                if(!empty($_COOKIE['_gid'])){
                    $type_client_= $_COOKIE['_gid'];
                }else{  $type_client_= 'P';  }

            $addresses = UserAddress::where('idUser',Auth::User()->id)->where('idState',1)->get();
            if(!empty($addresses)){
                  $Store_categorie_menu =  Store_products_selection::where('visible_publico', $type_client_)
                ->where('idState',1)
                ->groupBy('categoria_main')
                ->orderBy('order_category','Asc')
                ->get(['categoria_main','nameCategorie','idCategorie','imagen_main','imageCategorie','slug_main','slug_category','idState']);



                $ConfigTheme_ = core_template_manager::where('idState',1)->where('main',1)->first();
                $Store_categorie_ =  Store_products_selection::groupBy('nameCategorie')->orderBy('nameCategorie','Asc')->get(['nameCategorie','idCategorie','imageCategorie','slug_category']);
                return view('theme.components.core.comp_profile.addresses')
                ->with([
                    "Config_" => $ConfigTheme_,
                    "addresses_" => $addresses,
                    "Store_categorie_" =>$Store_categorie_,
                    "Store_categorie_menu" => $Store_categorie_menu
                ]);

            }else{
                $data = Array("code" =>404, "data" => $idAccount_, "message" => "Usuario no posee direcciones creadas");
                return json_encode($data);
            }
        }
    }

    public function deladdresses($id){
        if(!empty($id)){
            $addresses = UserAddress::where('id',$id)->first();
            if(!empty($addresses)){
                $addresses->idState= 2;
                if( $addresses->update()){
                    Session::flash('success', 'Direccion Eliminada correctamente');
                    return back();
                }
            }

            /*
            $DataDelete_ = UserAddress::where('id',$id)->delete();
           
            */
        }else{

        }
    }
    
    public function editSaveaddresses(Request $request){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $addresses = UserAddress::where('id',$request->id)->first();
            if(!empty($request->id)){
                $addresses->addrees = ($request->tipo_calle." ".$request->add_1. " # ".$request->add_2." - ".$request->add_3);
                $addresses->tipo_calle = $request->tipo_calle;
                $addresses->dir_1 = $request->add_1;
                $addresses->dir_2 = $request->add_2;
                $addresses->dir_3 = $request->add_3;
                $addresses->comments = $request->comments;
    
                if($addresses->update()){
                    Session::flash('success', 'Direccion Actualizada correctamente');
                    return redirect()->route('account.addresses');
                }
            }else{
                $data = Array("code" =>404, "data" => $request->id, "message" => "Usuario no posee direcciones creadas");
                return json_encode($data);
            }
        }
    }

    public function newaddresses(){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){


                if(!empty($_COOKIE['_gid'])){
                    $type_client_= $_COOKIE['_gid'];
                }else{  $type_client_= 'P';  }

            $Store_categorie_menu =  Store_products_selection::where('visible_publico', $type_client_)
                ->where('idState',1)
                ->groupBy('categoria_main')
                ->orderBy('order_category','Asc')
                ->get(['categoria_main','nameCategorie','idCategorie','imagen_main','imageCategorie','slug_main','slug_category','idState']);



            $ConfigTheme_ = core_template_manager::where('idState',1)->where('main',1)->first();
            $Store_categorie_ =  Store_products_selection::groupBy('nameCategorie')->orderBy('nameCategorie','Asc')->get(['nameCategorie','idCategorie','imageCategorie','slug_category']);
            return view('theme.components.core.comp_profile.create_addresses')
            ->with([
                "Config_" => $ConfigTheme_,
                "Store_categorie_" =>$Store_categorie_,
                "Store_categorie_menu" => $Store_categorie_menu
            ]);
        }
    }

    
    public function newSaveaddresses(Request $request){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            // return $request->tipo_calle;

            $addresses = new UserAddress;
            $addresses->idUser = Auth::User()->id;
            $addresses->addrees = ($request->tipo_calle." ".$request->add_1. " # ".$request->add_2." - ".$request->add_3);
            $addresses->tipo_calle = $request->tipo_calle;
            $addresses->dir_1 = $request->add_1;
            $addresses->dir_2 = $request->add_2;
            $addresses->dir_3 = $request->add_3;
            $addresses->comments = $request->comments;
            $addresses->idState = 1;

            if($addresses->save()){
                Session::flash('success', 'Dirección Creada correctamente');
                return redirect()->route('account.addresses');
            }

        }
    }


    public function editaddresses($id){
        $response_ = json_decode($this->configuration());
        if($response_->codeState==200){
            $addresses = UserAddress::where('id',$id)->first();
            if(!empty($id)){
                $ConfigTheme_ = core_template_manager::where('idState',1)->where('main',1)->first();
                $Store_categorie_ =  Store_products_selection::groupBy('nameCategorie')->orderBy('nameCategorie','Asc')->get(['nameCategorie','idCategorie','imageCategorie','slug_category']);
                return view('theme.components.core.comp_profile.edit_addresses')
                ->with([
                    "Config_" => $ConfigTheme_,
                    "addresses_" => $addresses,
                    "Store_categorie_" =>$Store_categorie_
                ]);

            }else{
                $data = Array("code" =>404, "data" => $idAccount_, "message" => "Usuario no posee direcciones creadas");
                return json_encode($data);
            }
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
    public function edit($id){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id){
        // return $request->all();
        $UpdateAccount_ = User::where('id',$id)
        ->where('idState',1)
        ->first();
        if (!empty($UpdateAccount_)) {
            
            $UpdateAccount_->celularUser  = intval(preg_replace('/[^0-9]+/','', $request->celular), 10);
            $UpdateAccount_->nameUser     = $request->first_name;
            $UpdateAccount_->lastnameUser = $request->last_name;

            if(!empty($request->email)){
                $UpdateAccount_->email = $request->email;
            }

            if(!empty( $request->password)){
                $UpdateAccount_->password = bcrypt($request->password);
            }
            


            $avatarProfile_ = $request->file('profilePicture');
            
            if (!empty($avatarProfile_)){
                
                $nameAvatar_ = $avatarProfile_->getClientOriginalName();
                Storage::disk('upload')->delete('avatars/'.$UpdateAccount_->imageProfile);

                $nameAvatar_ = 'avatar_'.$avatarProfile_->getClientOriginalName();
                Storage::disk('upload')->put('avatars/'.$nameAvatar_, \File::get($avatarProfile_),'public');
                $UpdateAccount_->imageProfile = $nameAvatar_;
                //Storage::disk('upload')->delete('avatars/'.$UpdateAccount_->imageProfile);
            }
            if($UpdateAccount_->update()){
                Session::flash('success',"Datos de tu perfil han sido actualizados.");
                return redirect()->route('account.index');
            }else{
                Session::flash('warning',"Los datos no ha podido ser actualizado, intentelo de nuevo");
                return redirect()->route('account.index');
            }
        }else{
            Session::flash('danger',"Error, no se pudo encontrar el usuario que se intenta actualizar");
            return redirect()->route('account.index');
        }

    }

    public function updateState($id){
        $UpdateStateAccount_ = User::where('id',$id)->where('idState',1)->first();
        if(!empty($UpdateStateAccount_)){
            $UpdateStateAccount_->idState = 3;
            $UpdateStateAccount_->emailVerified = 10;
            if($UpdateStateAccount_->update()){
                Session::flash('success',"Su cuenta ha sido eliminada de forma satisfactoria");
                return redirect()->route('getLogout'); 
            }else{
                Session::flash('warning',"Error no se pudo realizar el proceso solicitado, intentelo mas tarde");
                return redirect()->route('account.index');
            }
        }else{
            Session::flash('warning',"Error no se pudo realizar el proceso solicitado, intentelo mas tarde");
            return redirect()->route('account.index'); 
        }
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
