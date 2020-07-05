<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;
    protected $table = "products";
 
    protected $fillable = ['name_product','price','stok'];

    protected $primaryKey = 'code';
    protected $dates = ['deleted_at']; 

    public function order()
    {
    	return $this->hasOne('App\order');
    }
}
