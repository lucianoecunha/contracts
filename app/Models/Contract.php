<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contracts';

     protected $fillable = [
        'year',
        'number',
        'parts',
        'object',
        'kindofservice',
        'source',
        'signature',
        'validity',
        'value'      

    ];

    public function managers()
    {
        return $this->belongsToMany(Manager::Class, 'contract_managers')->withTimestamps();
    }

    public function sectors()
    {
        return $this->belongsToMany(Sector::Class, 'contract_sectors')->withTimestamps();
    }

    

}

