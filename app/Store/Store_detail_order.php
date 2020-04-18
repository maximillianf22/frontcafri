<?php

namespace App\Store;

use Illuminate\Database\Eloquent\Model;

class Store_detail_order extends Model{
    protected $table      = "store_detail_orders";
    protected $primaryKey = "id";
    public $timestamps    = true;
}
