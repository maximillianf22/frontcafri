<?php
namespace App\Store;
use Illuminate\Database\Eloquent\Model;
class Api_products_offer extends Model{
    protected $table      = "api_products_offers";
    protected $primaryKey = "id";
    public $timestamps    = true;
}
