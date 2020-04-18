<?php

namespace App\Store;

use Illuminate\Database\Eloquent\Model;

class store_products_attribute extends Model{
    protected $table      = "store_products_attributes";
    protected $primaryKey = "id";
    public $timestamps    = true;
}
