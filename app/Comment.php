<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','user_id','item_id','status'];

    public function item(){
    	return $this->belongsTo('App\Item');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }


}
