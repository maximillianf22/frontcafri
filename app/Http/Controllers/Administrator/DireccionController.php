<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\UserAddress;

class DireccionController extends Controller
{
  private $referenceModule = "md-direcciones";

  public function index()
  {
    $typeAction = "index";
    $validate_access = $this->validate_access($this->referenceModule, $typeAction);
    if ($validate_access == "true") {

      $idAuth = Auth::user()->id;
      $direcciones = UserAddress::where('idUser', $idAuth)->paginate(10);
      return view('themes.administrator.direcciones.index', compact('direcciones'));

    }else{
      return back();
    }
  }

  public function create()
  {
    $typeAction = "create";
    $validate_access = $this->validate_access($this->referenceModule, $typeAction);
    if ($validate_access == "true") {

      return view('themes.administrator.direcciones.create');

    }else{
      return back();
    }
  }

  public function store(Request $request)
  {
    $typeAction = "create";
    $validate_access = $this->validate_access($this->referenceModule, $typeAction);
    if ($validate_access == "true") {

      $cod_ciudad = explode("-", $request->cod_ciudad);
      $cod_dpto = explode("-", $request->cod_dpto);
      $cod_pais = explode("-", $request->cod_pais);
      $selectType = explode("-", $request->selectType);

      $newAddress = new UserAddress;
      $newAddress->idUser = Auth::user()->id;
      $newAddress->addrees = $request->address;
      $newAddress->idStreetType = $selectType[0];
      $newAddress->nameNumberStreet = $request->numOne;
      $newAddress->streetGenerate = $request->numTwo;
      $newAddress->streetPlate = $request->numThree;
      $newAddress->idCountry = $cod_pais[0];
      $newAddress->idDpto = $cod_dpto[0];
      $newAddress->idCity = $cod_ciudad[0];
      $newAddress->reference = $request->nombre;
      $newAddress->description = "";
      $newAddress->latitude = $request->lalitud;
      $newAddress->altitude = $request->longitud;
      $newAddress->idState = 1;
      if ($newAddress->save()) {
        $response_ = array('state' => 1, 'message' => 'Direccion agregada correctamente');
        return json_encode($response_);
      }else{
        $response_ = array('state' => 2, 'message' => 'Hemos tenido problemas, intenta nuevamente');
        return json_encode($response_);
      }

    }else{
      return back();
    }
  }

  public function show($idDireccion)
  {
    $idAuth = Auth::user()->id;
    $dataAddress = UserAddress::where('id', $idDireccion)->where('idUser', $idAuth)->first();
    if (!empty($dataAddress)) {

      $idCountry = "169-COLOMBIA";
      $idDpto = "8-ATLANTICO";
      $idCity = "001-BARRANQUILLA";
      $selectType = "2-CARRERA";

      return view('themes.administrator.direcciones.show', compact('dataAddress', 'idCountry', 'idDpto', 'idCity', 'selectType'));
    }else{
      return back();
    }
  }

  public function update(Request $request)
  {
    $idAuth = Auth::user()->id;
    $idAddress = $request->idAddress;
    $dataAddress = UserAddress::where('id', $idAddress)->where('idUser', $idAuth)->first();
    if (!empty($dataAddress)) {

      $cod_ciudad = explode("-", $request->cod_ciudad);
      $cod_dpto = explode("-", $request->cod_dpto);
      $cod_pais = explode("-", $request->cod_pais);
      $selectType = explode("-", $request->selectType);

      $dataAddress->addrees = $request->address;
      $dataAddress->idStreetType = $selectType[0];
      $dataAddress->nameNumberStreet = $request->numOne;
      $dataAddress->streetGenerate = $request->numTwo;
      $dataAddress->streetPlate = $request->numThree;
      $dataAddress->idCountry = $cod_pais[0];
      $dataAddress->idDpto = $cod_dpto[0];
      $dataAddress->idCity = $cod_ciudad[0];
      $dataAddress->reference = $request->nombre;
      $dataAddress->description = "";
      $dataAddress->latitude = $request->lalitud;
      $dataAddress->altitude = $request->longitud;
      $dataAddress->idState = $request->idState;
      if ($dataAddress->update()) {
        $response_ = array('state' => 1, 'message' => 'Direccion actualizada correctamente');
        return json_encode($response_);
      }else{
        $response_ = array('state' => 2, 'message' => 'Hemos tenido problemas, intenta nuevamente');
        return json_encode($response_);
      }

    }else{
      return back();
    }
  }

}
