<?php

namespace App\Store;

use Illuminate\Database\Eloquent\Model;

class store_categorie extends Model{
    protected $table      = "store_categories";
    protected $primaryKey = "id";
    public $timestamps    = true;
}
