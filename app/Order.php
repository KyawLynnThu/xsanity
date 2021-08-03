<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes; 
    protected $fillable = ['name','orderdate','voucherno','total','note','status','user_id'];

    public function items($value=''){
    	return $this->belongsToMany('App\Item')
    				->withPivot('qty')
    				->withTimestamps();
    }

    public function user(){
    	return $this->belongsTo('App\User');
    } 
}
