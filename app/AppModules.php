<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppModules extends Model
{
    //
    protected $table = 'app_modules';

    protected $fillable = [
        'id_app',
        'id_module',
    ];

    public function apps()
    {
        return $this->hasMany(Application::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

}
