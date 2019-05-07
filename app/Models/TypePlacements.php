<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypePlacements extends Model
{
    protected $fillable = ['title'];

    public function placements() {
        return $this->hasMany(Placements::class, 'type_id', 'id');
//        return $this->belongsToMany(Placements::class, 'placements', 'id', 'type_id');
    }

    public  function placement() {
        return $this->belongsTo(Placements::class,  'type_id', 'id');
    }
}
