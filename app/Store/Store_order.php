<?php

namespace App\Store;

use Illuminate\Database\Eloquent\Model;

class Store_order extends Model{
    protected $table      = "store_orders";
    protected $primaryKey = "id";
    public $timestamps    = true;
}
