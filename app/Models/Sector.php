<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use softDeletes;

class Sector extends Model
{
 
    
    
    protected $fillable = [
        'name',
        'secretary_id'
    ];

    //return Sector::belongsto('Secretary');


    public function secretary()
	{
		return $this->belongsTo(Secretary::Class);
	}

    public function contracts()
    {
        return $this->belongsToMany(Contract::Class, 'contract_sectors')->withTimestamps();
    }

	public function scopeSelectIdAndName($query) {
        return $query->select('sectors.id', 'sectors.name');
    }

    public function scopeOrderByName($query) {
        return $query->orderBy('sectors.name', 'ASC');
    }

    public function scopeById($query, $SectorID) {
        return $query->where('sectors.id', '=', $SectorID);
    }

    public function scopeByIdSecretary($query, $secretaryID) {
        return $query->where('sectors.secretary_id', '=', $secretaryID);
    }
}
