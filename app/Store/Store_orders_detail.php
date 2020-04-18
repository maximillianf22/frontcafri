<?php

namespace App\Store;

use Illuminate\Database\Eloquent\Model;

class Store_orders_detail extends Model{
    protected $table      = "store_orders_details";
    protected $primaryKey = "id";
    public $timestamps    = true;
}
