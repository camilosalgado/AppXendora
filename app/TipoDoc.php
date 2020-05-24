<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDoc extends Model
{
    //
    protected $table = 'tipo_docs';

    protected $fillable = [
        'initials',
        'description',
        'state'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
