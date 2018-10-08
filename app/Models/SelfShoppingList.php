<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SelfShoppingList extends Model
{
    use SoftDeletes;
    
    protected $table = 'self_shopping_list';

    public function setPicturesAttribute($pictures)
	{
	    if (is_array($pictures)) {
	        $this->attributes['pictures'] = json_encode($pictures);
	    }
	}

	public function getPicturesAttribute($pictures)
	{
	    return json_decode($pictures, true);
	}
}
