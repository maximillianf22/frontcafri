<?php
namespace App\Store;
use Illuminate\Database\Eloquent\Model;
class Api_products_available extends Model{

    protected $table      = "api_products_availables";
    protected $primaryKey = "id";
    public $timestamps    = true;
}