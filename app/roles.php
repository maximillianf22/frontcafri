<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
  protected $table = 'roles';

  public function fun_profiles(){
    return $this->belongsTo(profiles::class, 'idProfile');
  }
}
