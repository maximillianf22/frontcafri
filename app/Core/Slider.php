<?php

namespace App\Core;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model{
    protected $table      = "sliders";
    protected $primaryKey = "id";
    public $timestamps    = true;
}