<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialEntities extends Model
{
    protected $fillable = ['title'];

    public function socials() {
        return $this->hasMany(SocialNetworks::class, 'title_id', 'id');
    }
}
