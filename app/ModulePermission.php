<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Middlewares\PermissionMiddleware;

class ModulePermission extends Model
{
    //
    protected $table = 'module_permissions';

    protected $fillable = [
        'id_module',
        'id_permission'
    ];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function permissions()
    {
        return $this->hasMany(PermissionMiddleware::class);
    }

}
