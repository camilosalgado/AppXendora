<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class RoleApp extends Model
{
    //
    protected $table = 'role_apps';

    protected $fillable = [
        'id_role',
        'id_app',
    ];

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function apps()
    {
        return $this->hasMany(Application::class);
    }

}
