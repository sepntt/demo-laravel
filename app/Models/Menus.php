<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Menus extends Model
{
    protected $table = 'admin_menu';
    //
    /**
     * A Menu belongs to many roles.
     *
     * @return BelongsToMany
     */
    public function roles() : BelongsToMany
    {
        return $this->belongsToMany(Roles::class, 'admin_role_menu', 'menu_id', 'role_id');
    }
}
