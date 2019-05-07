<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'users_id', 'name', 'description', 'is_edit', 'is_read', 'is_delete'
    ];

    public function isAdmin() {
        $role = $this->name;
        $pattern = '/admin/i';
        preg_match($pattern, $role, $matches);

        if (count($matches) > 0) {
            return true;
        }
        return false;
    }
}
