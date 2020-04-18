<?php
namespace App\Core;
use Illuminate\Database\Eloquent\Model;

class pais_dpts_citys extends Model{
    protected $table      = "pais_dpts_citys";
    protected $primaryKey = "id";
    public $timestamps    = true;
}