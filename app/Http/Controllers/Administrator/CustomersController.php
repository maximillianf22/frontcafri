<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\profiles;
use App\roles;
use Auth;
use App\User;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response_ = json_decode($this->configuration());
        if ($response_->codeState == 200) {
            $dataCustomer = User::select(
                '*',
                'users.id as id',
                'profiles.name as perfilUser'
            )
                ->join('roles', 'roles.id', 'idRole')
                ->join('profiles', 'profiles.id', 'roles.idProfile')
                ->where('idRole', '<>', 2)
                ->paginate(100);
            $permisos_ = User::where('id', Auth::user()->id)->first(['modulos_permisos']);
            return view('theme.components.administrator.comp_customer.list', compact('dataCustomer', 'permisos_'));
        }
    }

    /*---Editar Clientes---*/
    public function editCustomer($idCliente)
    {
        $response_ = json_decode($this->configuration());
        if ($response_->codeState == 200) {
            $dataCustomer = User::select(
                '*',
                'users.id as id',
                'roles.idProfile as perfilUser'
            )
                ->join('roles', 'roles.id', 'idRole')
                ->where('users.id', $idCliente)
                ->first();
            $permisos_ = User::where('id', Auth::user()->id)->first(['modulos_permisos']);
            $perfiles = profiles::get();
            return view('theme.components.administrator.comp_customer.edit', compact('dataCustomer', 'permisos_', 'perfiles'));
        }
    }

    public function saveeditCustomer(Request $request)
    {
        $response_ = json_decode($this->configuration());
        if ($response_->codeState == 200) {
            $dataCustomer = User::where('id', $request->idCliente)->first();
            if (!empty($dataCustomer)) {
                $rol = roles::where('idProfile', $request->perfilUser)->first();
                $dataCustomer->idRole = $rol->id;
                $dataCustomer->idState = $request->state;
                $dataCustomer->update();
                return redirect()->route('admin.customers');
            }
        }
    }




    public function searchfilterAll(Request $request)
    {
        $response_ = json_decode($this->configuration());
        if ($response_->codeState == 200) {
            //return $request->dataType_;

            if ($request->dataType_ == 99 && $request->dataState_ == 0) {
                /*-- Cuando no estableci filtros en el estado o tipo de cliente ---*/
                $dataCustomer = User::where('idRole', '<>', 2)->where('nameUser', 'like', '%' . $request->DataSearch . '%')
                    ->orWhere('lastnameUser', 'like', '%' . $request->DataSearch . '%')
                    ->orWhere('nameBusiness', 'like', '%' . $request->DataSearch . '%')
                    ->orWhere('celularUser', 'like', '%' . $request->DataSearch . '%')
                    ->orWhere('email', 'like', '%' . $request->DataSearch . '%')
                    ->orderBy('nameUser', 'Asc')->get();
            } else {
                // return $request->dataType_."-".$request->dataState_;
                if ($request->dataType_ == 99) {
                    if ($request->dataState_ == 1) {

                        $dataCustomer = User::where('idRole', '<>', 2)->where('nameUser', 'like', '%' . $request->DataSearch . '%')
                            ->Where('idState', 1)
                            ->orderBy('nameUser', 'Asc')->get();
                    } else {

                        $dataCustomer = User::where('idRole', '<>', 2)->where('nameUser', 'like', '%' . $request->DataSearch . '%')
                            ->Where('idState', 2)
                            ->orderBy('nameUser', 'Asc')->get();
                    }
                } else {

                    if ($request->dataType_ <> 99 && $request->dataState_ == 0) {
                        $dataCustomer = User::where('idRole', '<>', 2)->where('nameUser', 'like', '%' . $request->DataSearch . '%')
                            ->Where('isCommerce', $request->dataType_)
                            ->orderBy('nameUser', 'Asc')->get();
                    } else {
                        $dataCustomer = User::where('idRole', '<>', 2)->where('nameUser', 'like', '%' . $request->DataSearch . '%')
                            ->Where('isCommerce', $request->dataType_)
                            ->Where('idState', $request->dataState_)
                            ->orderBy('nameUser', 'Asc')->get();
                    }
                }
            }
            return view('theme.components.administrator.comp_customer.listfilter', compact('dataCustomer'));

            /*
            $Store_categorie_ =  Store_products_selection::groupBy('nameCategorie')->orderBy('nameCategorie','Asc')->get(['nameCategorie','idCategorie','imageCategorie','slug_category']);
            if(!empty($request->DataSearch)){
                $Products = Store_products_selection::select('*',DB::raw('count(*) as cnt_attributes'))->where('nameProduct','like','%'.$request->DataSearch.'%')->groupBy('nameProduct')->orderBy('nameProduct','Asc')->get()->take(20);
            }else{
                $Products = Store_products_selection::select('*',DB::raw('count(*) as cnt_attributes'))->where('nameProduct','like','%'.$request->DataSearch.'%')->groupBy('nameProduct')->orderBy('nameProduct','Asc')->get()->take(20);
            }
             return view('theme.components.administrator.comp_store.filterAdminProduct')
            ->with([
                "Products" => $Products,
                "Store_categorie_" => $Store_categorie_,
            ]); 
            */
        }
    }
}
