<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //
    protected $table = 'modules';

    protected $fillable = [
        'name',
        'description',
        'module_url',
        'state'
    ];

    public function appmodules()
    {
        return $this->belongsTo(AppModules::class);
    }

    public function modulepermissions()
    {
        return $this->belongsTo(ModulePermission::class);
    }

}
