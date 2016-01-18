<?php namespace App\Models;

use Jenssegers\Mongodb\Model as Eloquent;
use Illuminate\Database\Eloquent\Model;

class testMongodb extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'restaurant';
}