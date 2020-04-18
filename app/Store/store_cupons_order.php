<?php

namespace App\Store;

use Illuminate\Database\Eloquent\Model;

class store_cupons_order extends Model{
    protected $table      = "store_cupons_orders";
    protected $primaryKey = "id";
    public $timestamps    = true;
}
