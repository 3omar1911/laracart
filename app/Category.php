<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    
    protected $fillable = [
    	'name'
    ];

    public function items() {

    	return $this->belongsToMany('App\Item', 'categroy_item', 'category_id', 'item_id');
    	// category was misspelled at the migration
    }
}
