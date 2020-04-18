<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Session;
use App\sliders;
use Auth, App\User; 

class SlidersController extends Controller{
  public function index(){
    $response_ = json_decode($this->configuration());
    if($response_->codeState==200){
        $dataSlider = sliders::paginate(10);
        $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
        return view('theme.components.administrator.comp_slider.list',compact('dataSlider','permisos_'));
    }
   
  }

  public function create(){
    $response_ = json_decode($this->configuration());
    if($response_->codeState==200){
      $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
           
      return view('theme.components.administrator.comp_slider.create',compact('permisos_'));
    }
  }

  public function store(Request $request)
  {
    //$typeSlider = $request->typeSlider;
    $typeSlider = 1;

    if ($typeSlider==1) {

      $images_file = $request->file('imagenSlider');
      if (!empty($images_file)){
          $fechaAhora = date("YmdHis");
          $num_al = rand(1, 10);
          $avatarProduct_ = $request->file('imagenSlider');
          $nameAvatar_ = $avatarProduct_->getClientOriginalName();
          Storage::disk('upload')->delete('store/'.$nameAvatar_);
          $nameAvatar_ = 'item_'.$avatarProduct_->getClientOriginalName();
          Storage::disk('upload')->put($nameAvatar_, \File::get($avatarProduct_),'public');
        }else{ $nameAvatar_='no-image-product.png';}
      
    }else{
      /*
      if (!empty($request->linkVideo)) {
        $linkSlider = $request->linkVideo;
      }else{
        return back();
      }
      */
      $linkSlider ="";
    }

    
    $newSlider = new sliders;

    if(!empty($nameAvatar_)){
      $newSlider->imageSlider = $nameAvatar_;
    }


    $newSlider->title = $request->nombre;
   // $newSlider->link_media = $linkSlider;
    $newSlider->typeSlider = $request->typeSlider;
    $newSlider->urlSlider = $request->urlSlider;
    $newSlider->idState = $request->idState;
    $newSlider->description = $request->descripcion;
    $newSlider->order = 0;
    if ($newSlider->save()) {
      Session::flash('success', 'Sliders agregado correctamente');
      return redirect()->route('admin.sliders');
    }else{
      Session::flash('danger', 'Hemos tenido problemas, intenta nuevamente');
      return back();
    }
  }

  public function show($idSlider){
    $response_ = json_decode($this->configuration());
    if($response_->codeState==200){
        $dataSlider = sliders::where('id', $idSlider)->first();
        if (!empty($dataSlider)) {
          $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
          return view('theme.components.administrator.comp_slider.show',compact('dataSlider','permisos_'));

        }else{
          return back();
        }
    }
    
  }

  public function update(Request $request, $id){

    $dataSlider = sliders::where('id', $id)->first();
    
    if (!empty($dataSlider)) {
      //return($dataSlider);

      //$typeSlider = $dataSlider->typeSlider;
      $typeSlider = 1;
      if ($typeSlider==1) {

        $images_file = $request->file('imagenSlider');
        //dd($images_file);
        if (!empty($images_file)){
            $fechaAhora = date("YmdHis");
            $num_al = rand(1, 10);
            $avatarProduct_ = $request->file('imagenSlider');
            $nameAvatar_ = $avatarProduct_->getClientOriginalName();
            Storage::disk('upload')->delete('store/'.$nameAvatar_);
            $nameAvatar_ = 'item_'.$avatarProduct_->getClientOriginalName();
            Storage::disk('upload')->put($nameAvatar_, \File::get($avatarProduct_),'public');
        }else{ $nameAvatar_='';}

        

        if(!empty($nameAvatar_)){
          $dataSlider->imageSlider = $nameAvatar_;
        }
      }else{
        /*
        if (!empty($request->linkVideo)) {
          $linkSlider = $request->linkVideo;
        }else{
          return back();
        }
        */
      }
 
      $dataSlider->title = $request->title;
      /*
      if ($typeSlider==1) {
        if (!empty($images_file)) {$dataSlider->link_media = $linkSlider;}
      }else{
        $dataSlider->link_media = $linkSlider;
      }
      */
      
      $dataSlider->idState = $request->state;
      $dataSlider->description = $request->decription;
      $dataSlider->urlSlider = $request->urlSlider;

      if ($dataSlider->update()) {
       
        Session::flash('success', 'Sliders actualizado correctamente');
        return back();
      }else{
        Session::flash('danger', 'Hemos tenido problemas, intenta nuevamente');
        return back();
      }

    }else{
      Session::flash('danger', 'Hemos tenido problemas, intenta nuevamente');
      return back();
    }
  }

}
