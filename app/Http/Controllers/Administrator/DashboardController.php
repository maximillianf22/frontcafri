<?php
namespace App\Http\Controllers\Administrator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;


class DashboardController extends Controller{
  public function index(){
      $response_ = json_decode($this->configuration());
      if($response_->codeState==200){
        $permisos_ = User::where('id',Auth::user()->id)->first(['modulos_permisos']);
        return view('theme.components.administrator.comp_dashboard.index',compact('permisos_'));
      }
  }
}