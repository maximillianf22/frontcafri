<?php

namespace App\Store;

use Illuminate\Database\Eloquent\Model;

class Api_products_list extends Model
{
    protected $table      = "api_products_list";
    protected $primaryKey = "id";
    public $timestamps    = true;
}
