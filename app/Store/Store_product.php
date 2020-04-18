<?php

namespace App\Store;

use Illuminate\Database\Eloquent\Model;

class Store_product extends Model{
    protected $table      = "store_products";
    protected $primaryKey = "id";
    public $timestamps    = true;
}
