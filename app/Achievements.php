<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievements extends Model
{
    protected $table = 'achievements';
	protected $primarykey = 'ID';

	public $timestamps = false;
}
