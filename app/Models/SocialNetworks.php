<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialNetworks extends Model
{
    protected $fillable = ['title_id', 'type', 'url'];

    public function entity() {
        return $this->hasOne(SocialEntities::class,  'id','title_id');
    }
}
