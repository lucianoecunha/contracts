<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use softDeletes;

class Secretary extends Model
{
       
    protected $fillable = ['name'];


public function sectors()
	{
		return $this->hasMany(Sector::Class);
	}

}
