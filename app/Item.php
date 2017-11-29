<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {
    
    protected $fillable = [
    	'name', 'img', 'price'
    ];

    public function categories() {

    	return $this->belongsToMany('App\Category','categroy_item');
    }

    public function users() {

        return $this->belongsToMany('App\User', 'user_item');
    }
}
