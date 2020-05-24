<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //
    protected $table = 'applications';

    protected $fillable = [
        'name',
        'description',
        'icon_path',
        'app_url',
        'state'
    ];

    public function roleapp()
    {
        return $this->belongsTo(RoleApp::class);
    }

    public function appmodule()
    {
        return $this->belongsTo(AppModules::class);
    }

}
