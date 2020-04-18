<?php
namespace App\Store;
use Illuminate\Database\Eloquent\Model;
class store_subcategories extends Model{
	protected $table      = "store_subcategories";
	protected $primaryKey = "id";
	public $timestamps    = true;
}
