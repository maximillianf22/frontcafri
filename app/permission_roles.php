<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permission_roles extends Model
{
  protected $table = 'permission_roles';

  public function fun_actions(){
    return $this->belongsTo(actions_roles::class, 'idAction');
  }

  public function scopeModule($query, $idModule)
  {
    $query->whereHas('fun_actions', function($q) use($idModule){
      $q->where('idModule', $idModule);
    });
  }

}
