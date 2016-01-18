<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    public function scopeRandomize($query, $limit = 3, $exclude = [])
	{
	    $query = $query->whereRaw('RAND()<(SELECT ((?/COUNT(*))*10) FROM `products`)', [$limit])->orderByRaw('RAND()')->limit($limit);
	    if (!empty($exclude)) {
	        $query = $query->whereNotIn('id', $exclude);
	    }
	    return $query;
	}
}
