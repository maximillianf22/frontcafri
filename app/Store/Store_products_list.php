<?php

namespace App\Store;

use Illuminate\Database\Eloquent\Model;
/* Borrar no va este modelo */
class Store_products_list extends Model{
    protected $table      = "store_products_lists";
    protected $primaryKey = "id";
    public $timestamps    = true;
}
