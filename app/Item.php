<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','codeno','name','photo','rate','price','discount','details','description','release_year','subcategory_id'];

    public function subcategory(){
    	return $this->belongsTo('App\Subcategory');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }

    public function orders($value=''){
    	return $this->belongsToMany('App\Order')
    				->withPivot('qty')
    				->withTimestamps();
    }
}
