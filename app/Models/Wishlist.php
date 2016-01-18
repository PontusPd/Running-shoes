<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlist';

    public function getWishlist()
    {
    	return 'This is a test';
    }
}
