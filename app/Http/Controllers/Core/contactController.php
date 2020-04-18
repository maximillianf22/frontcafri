<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash, Auth, Mail, Session, Redirect;
use App\Config\Gestor_plantillas, App\Config\Configuracion_valor;

class contactController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $theme_ = Gestor_plantillas::where('idState',1)->where('principal',1)->first();
        $nameTheme = $theme_->name_theme;
        $themeDefault_ = $theme_->name_theme;

        if(view()->exists('themes.'.$themeDefault_.'.web.contactPage')){
            return view('themes.'.$themeDefault_.'.web.contactPage',compact('themeDefault_','theme_','nameTheme'));

        }else{
            $Name_ ="Form Contact "; $Msg_=" Para {".$themeDefault_."} No esta Definido  ";
            return view("errors.templatenotfound",compact('Name_','Msg_'));
        }
    }

    public function sendContactForm(Request $request){
        $theme_ = Gestor_plantillas::where('idState',1)->where('principal',1)->first();
        $nameTheme = $theme_->name_theme;
        $themeDefault_ = $theme_->name_theme;

        $data['name'] =  $request->username_frm;
        $data['email'] = $request->email;
        $data['email_destine'] = $request->email;
        $data['detail'] = $request->detail_frm;

        if(view()->exists('email_templates.confirmMailContact')){
            /*--- Email para el receptor ---*/
            Mail::send('email_templates.mailContacPage', ['data' => $data], function($mail) use($data){
                $mail->subject('Nueva Solicitud Web');
                $mail->to($data['email_destine'], $data['name'], $data['detail']);
            });
            /*--- Copia de envio para el usuario remitente ---*/
            Mail::send('email_templates.confirmMailContact', ['data' => $data], function($mail) use($data){
                $mail->subject('Confirmacion de envio');
                $mail->to($data['email'], $data['name'], $data['detail']);
            });
            Session::flash('success', 'Su Solicitud ha sido enviada');
            return redirect()->route('web.contact');
        }else{
            $Name_ ="Form Mail ConfirmMailContact "; $Msg_=" Para {".$themeDefault_."} No esta Definido  ";
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
