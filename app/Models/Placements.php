<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Placements extends Model
{
    public function typePlacement() {
        return $this->hasOne(TypePlacements::class,'id', 'type_id');
    }

    public function socialEntity() {
        return $this->hasOne(SocialEntities::class, 'id', 'social_entities_id');
    }
}
