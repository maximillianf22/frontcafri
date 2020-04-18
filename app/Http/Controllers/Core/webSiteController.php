<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash, Auth, Mail, Session, Redirect;
use App\Config\Gestor_plantillas, App\Config\Configuracion_valor;

class webSiteController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* Busca el tema por defecto de la plantilla */
    public function DefaultTheme_ (){
        $ViewDefault_ = Gestor_plantillas::where('idState',1)->where('principal',1)->first();
        return $ViewDefault_;
    }

    private $referenceModule = "md-cms";
    public function index(){
        $typeAction = "index";
        if(view()->exists('themes.cmsBuilder.index')){
            $accessOk_ = $this->validate_access($this->referenceModule, $typeAction);
           // return $accessOk_ ;
            if ($accessOk_ == "true"){
                return view('themes.cmsBuilder.index')->with([
                    "Template_" => $this->DefaultTheme_()
                ]);
            }else{
                Session::flash('warning', 'No tiene Permisos para este modulo');
                return back();
            }
        }else{
            $Name_ ="Form CMS BUILDER "; $Msg_=" Para {".$this->DefaultTheme_()->name_theme."} No esta Definido  ";
            return view("errors.templatenotfound",compact('Name_','Msg_'));
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
