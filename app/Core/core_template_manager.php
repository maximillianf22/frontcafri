<?php

namespace App\Core;

use Illuminate\Database\Eloquent\Model;

class core_template_manager extends Model{
    protected $table      = "core_template_manager";
    protected $primaryKey = "id";
    public $timestamps    = true;
}
