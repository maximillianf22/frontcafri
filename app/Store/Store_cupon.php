<?php
namespace App\Store;
use Illuminate\Database\Eloquent\Model;
class Store_cupon extends Model{
    protected $table      = "store_cupons";
    protected $primaryKey = "id";
    public $timestamps    = true;
}
