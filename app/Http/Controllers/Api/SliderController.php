<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\Slider;
class SliderController extends Controller{
    
    public function getSlider(Request $request){
        $dataSliderFnc= Slider::where('idState',1)->get();
        if(count($dataSliderFnc)>=1){
            $data = Array("code" => 200, "data" => $dataSliderFnc, "message" => "La solicitud ha tenido éxito");
        }else{
            $data = Array("code" => 404, "data" => $dataSliderFnc, "message" => "Resultado de la Busqueda vacia");
        }
        return json_encode($data);
    }
}
