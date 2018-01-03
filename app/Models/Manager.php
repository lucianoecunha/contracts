<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = [
        'name',
        'email',
        'sector_id'
    ];


    public function sector()
	{
		return $this->belongsTo(Sector::Class);
	}

    public function contracts()
    {
        return $this->belongsToMany(Contract::Class, 'contract_managers')->withTimestamps();
    }
}
