<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $fillable = [
      'prefix', 'roles_id'
    ];

    public function role () {
        return $this->hasOne(Roles::class,'id', 'roles_id');
    }
}
