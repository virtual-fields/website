<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribers extends Model
{
    protected $table = 'subscribers';
	protected $primarykey = 'ID';

	public $timestamps = false;
}
