<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    use SoftDeletes;
    protected $fillable = ['rating_count','review','user_id','item_id'];

    public function item(){
    	return $this->belongsTo('App\Item');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
