<?php

namespace App\Store;

use Illuminate\Database\Eloquent\Model;

class Store_attributes_value extends Model{
    protected $table      = "store_attributes_values";
    protected $primaryKey = "id";
    public $timestamps    = true;
}
