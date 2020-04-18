<?php
namespace App\Store;
use Illuminate\Database\Eloquent\Model;

class Store_products_selection extends Model{
    protected $table      = "store_products_selection";
    protected $primaryKey = "id";
    public $timestamps    = true;
}
