<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoyalSponsors extends Model
{
    public function socialEntity() {
        return $this->hasOne(SocialEntities::class, 'id', 'social_entities_id');
    }
}
