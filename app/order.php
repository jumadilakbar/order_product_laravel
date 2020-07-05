<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class order extends Model
{
    //
    use SoftDeletes;
    protected $table = "orders";
 
    protected $fillable = ['code','name','phone','alamat'];

    // protected $primaryKey = 'code';
    protected $dates = ['deleted_at']; 

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}
